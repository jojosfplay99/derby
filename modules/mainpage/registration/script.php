<script type="text/javascript">
	$(document).ready(function () {
		$.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';
		var cookie_id = Cookies.get("id");

	    var table = $('#example').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: 'registration/serverside_processing.php',	        
	        columnDefs: [ 	        		        	
          		{
			      "targets": [0],
			      "searchable": false,
			      "visible": false
			    },			    
                {
                    targets: 7,
                    data: null,
                    defaultContent: '<button class="btn btn-danger btn-sm form-control mb-1"><i class="fa-solid fa-trash"></i></button>',
                },            
            ],
            dom: 'Bfrtip',
            buttons: [            	
	            {
	                text: '<i class="fa-solid fa-user-plus"></i> Register',
	                className: 'btn btn-primary btn-sm btn-squared',
	                action: function ( e, dt, node, config ) {	                	
						$('#register').modal('show');
	                }
	            }
	        ]
	    });	  

	    $('#example tbody').on('click', '.btn-danger', function () {
            var data = table.row($(this).parents('tr')).data();  
            Swal.fire({
				 title: 'Are you sure? ',
				 text:'Delete Registration No.: '+data[6],
				 icon: 'warning',
				 showCancelButton: true,
				 confirmButtonColor: '#d33',
				 cancelButtonColor: '#3085d6',
				 confirmButtonText: 'Delete!'
			}).then((result) => {
				  if (result.isConfirmed) {
				    $.ajax({
	                    method: "POST",
	                    url: "registration/delete.php",
	                    data: {"id":data[0]},
                        success: function(data) {                                                                          
                            Swal.fire({
								icon: 'success',
								title: 'Deleted Successfully',					  
							}).then(function(){
								window.location.reload(true);
							})
                        }
                    }); 
				}
			})           
        });

        $('#submit_registration ').on('submit', function () {
        	$.ajax({
                method: "POST",
                url: "registration/add_registration.php",
                data: $(this).serialize(),
                    success: function(data) {                                                                          
                	    Swal.fire({
						  icon: 'success',
						  title: 'Farm Registration Added',					  
						}).then(function(){
							window.location.reload(true);
						})
            	    }
            }); 
              event.preventDefault();        
        });

	    setInterval( function () {
		    table.ajax.reload();
		}, 5000 );


	});
</script>