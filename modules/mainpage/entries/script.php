<script type="text/javascript">
	$(document).ready(function () {
		$.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';
		var groupColumn = 4;
		var cookie_id = Cookies.get("id");

	    var table = $('#example').DataTable({
	        processing: true,
	        serverSide: true,
	        //order: [[4, 'ASC'],[groupColumn, 'ASC']],
	        ajax: {
			    url: "entries/serverside_processing.php",			    
			    data: function(d){
			    	d.extra_search = $('#date_filter').val();
			    }
			},	        
	        columnDefs: [ 	        	
          		{
			      "targets": [0,6,7,8,9],
			      "searchable": false,
			      "visible": false
			    }, 
                {
                    targets: 11,
                    data: null,
                    defaultContent: '<button class="btn btn-success btn-sm form-control mb-1"><i class="fa-solid fa-eye"></i> PRIORITY</button>',
                },            
            ],
            drawCallback: function(settings){
            	var api = this.api();
            	var rows = api.rows({page:'current'}).nodes();
            	var last = null;

            	api
            		.column(groupColumn, {page: 'current'})
            		.data()
            		.each(function (group, i){
            			if(last !== group){
            				$(rows)
            					.eq(i)
            					.before('<tr class="group"><td class="text-center bg-primary text-white" colspan="7">'+group+'</td></tr>');

            				last = group;
            			}
            		})
            }
	    });

	    
	    $('#date_filter').on('change', function () {
	        table
	        	.columns(4)	        
	        	.search(this.value)
	        	.draw();
	    });
		

	    $('#example tbody').on('click', '.btn-success', function () {
              var data = table.row($(this).parents('tr')).data();  
              	Swal.fire({
				  title: 'Serve Number: '+data[1],
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Serve!'
				}).then((result) => {
				  if (result.isConfirmed) {
				    $.ajax({
                        method: "POST",
                        url: "homepage/serve.php",
                        data: {"id":data[0],"user":cookie_id},
                            success: function(data) {                                                                          
                                table.ajax.reload();                                    
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