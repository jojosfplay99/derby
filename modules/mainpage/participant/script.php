<script type="text/javascript">
	$(document).ready(function () {
		$.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';

		var cookie_id = Cookies.get("id");
        var groupColumn = 4;
	    var table = $('#example').DataTable({
	        processing: true,
	        serverSide: true,
            searching: true,
            info:false,            
            order: [[2, 'asc'], [1, 'asc']], 
            rowGroup: {
                dataSrc: [ 4,1],
                startRender: function ( rows, group ) {
                    return group;
                },
                
            },
            ajax: 'participant/serverside_processing.php',          	        
	        columnDefs: [ 	        		        	
          		{
			      "targets": [0,1,2,3,4,5],
			      //"searchable": false,
			      "visible": false
			    },	
                {
                    targets: 10,
                    //data: null,
                    render: $.fn.dataTable.render.number(',','.', 2, '₱')
                },                	   
                {
                    targets: 11,
                    data: null,
                    defaultContent: '<button class="btn btn-success form-control btn-sm mb-1"><i class="fa-solid fa-edit"></i></button><button class="btn btn-danger form-control btn-sm mb-1"><i class="fa-solid fa-trash"></i></button>',
                },            
            ],
            dom: 'Bfrtip',
            buttons: [                
	            {
	                text: '<i class="fa-solid fa-user-plus"></i> Add Participants',
	                className: 'btn btn-primary btn-sm btn-squared',
	                action: function ( e, dt, node, config ) {	                	
						$('#participant').modal('show');
	                }
	            }
	        ],
            
	    });	 

        $('#date_filter1').on( 'change', function () {
            table.column(4).search( this.value ).draw();
        } );

	    $('#search').select2({                
            width: 'resolve',                        
            placeholder: "Search Farm Name or Owner Name",
            theme: "bootstrap-5",
            dropdownParent: $('#participant .modal-content'),
            allowClear: true,
            ajax: {
                url: "participant/select_data.php",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                return {
                        searchTerm: params.term, // search term                                
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },                        
            }                
        }).on('select2:select', function(event) {
            var additional = event.params.data;
            var farm_id = additional.id; 
            var text = additional.text;
            var regno = additional.regno;            
            var ownername = additional.ownername;  
            $('#farm_id_participant').val(farm_id);   
            $('#regno_participant').val(regno);
            $('#farm_name_participant').val(text);
            $('#ownername_participant').val(ownername);

            var table4 = $('#example3').DataTable({
                processing: true,
                serverSide: true,
                bDestroy: true, 
                searching: false,
                paging: false,
                info: false,
                //order: [[4, 'ASC'],[groupColumn, 'ASC']],
                ajax: {
                    url: "participant/serverside_processing2.php",               
                    data: function(d){
                        d.extra_search = regno;
                    }
                },          
                columnDefs: [               
                    {
                      "targets": [0,1,2,3,4,5],
                      "searchable": false,
                      "visible": false
                    },
                    /*
                    {
                        targets: 10,
                        data: null,
                        render: $.fn.dataTable.render.number(',','.', 2, '₱')
                    },
                    */ 
                    {
                        targets: 11,
                        data: null,
                        defaultContent: '<button class="btn btn-danger btn-sm mb-1"><i class="fa-solid fa-trash"></i> </button>',
                    },            
                ],                
            });       
                       
        });

        $('#search_schedule').select2({                
            width: 'resolve',                        
            placeholder: "Search Schedule",
            theme: "bootstrap-5",
            dropdownParent: $('#participant .modal-content'),
            allowClear: true,
            ajax: {
                url: "participant/schedule_data.php",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                return {
                        searchTerm: params.term, // search term                                
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },                        
            }                
        }).on('select2:select', function(event) {
            var additional = event.params.data;
            var schedule_id = additional.id; 
            var schedule_promoter = additional.promoter; 
            var schedule_code = additional.schedule_code; 
            var schedule_date = additional.schedule_date; 
            $('#schedule_date_participant').val(schedule_date);
            $('#schedule_code_participant').val(schedule_code);
        });

        $("#bet_currency").maskMoney({
        	prefix:'₱',
        	allowNegative: true,
        	thousands:',',
        	decimal:'.', 
        	affixesStay: false
        });

        $("#bet_edit").maskMoney({
            prefix:'₱',
            allowNegative: true,
            thousands:',',
            decimal:'.', 
            affixesStay: false
        });

	    $('#example tbody').on('click', '.btn-danger', function () {
            var data = table.row($(this).parents('tr')).data();  
            Swal.fire({
				 title: 'Are you sure? ',
				 text:"You won't be able to revert this!",
				 icon: 'warning',
				 showCancelButton: true,
				 confirmButtonColor: '#d33',
				 cancelButtonColor: '#3085d6',
				 confirmButtonText: 'Delete!'
			}).then((result) => {
				  if (result.isConfirmed) {
				    $.ajax({
	                    method: "POST",
	                    url: "participant/delete.php",
	                    data: {"id":data[0]},
                        success: function(data) {  
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Entry Deleted!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function(){
                                table.ajax.reload();
                            })                            
                        }
                    }); 
				}
			})           
        });

        $('#example tbody').on('click', '.btn-success', function () {
            var data = table.row($(this).parents('tr')).data();  
            $('#edit').modal('show');
            $('#id_edit').val(data[0])
            $('#stagcock_no_edit').val(data[6])
            $('#wingband_edit').val(data[7])
            $('#legband_edit').val(data[8])
            $('#weight_edit').val(data[9])
            $('#bet_edit').val(data[10])
        });

        $('#submit_participant ').on('submit', function () {
        	$.ajax({
                method: "POST",
                url: "participant/add_participant.php",
                data: $(this).serialize(),
                    success: function(data) {                                                                          
                	    Swal.fire({
						    icon: 'success',
						    title: 'Farm Registration Added',
                            showConfirmButton: false,
                            timer: 1500					  
						}).then(function(){
							$('#stagcock_no').val('');
							$('#wingband').val('');
							$('#legband').val('');
							$('#weight').val('');
							$('#bet_currency').val('');
                            table.ajax.reload();							
						})
            	    }
            }); 
              event.preventDefault();        
        });

        $('#submit_edit ').on('submit', function () {
            $.ajax({
                method: "POST",
                url: "participant/edit_participant.php",
                data: $(this).serialize(),
                    success: function(data) {                                                                          
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Entry Updated!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function(){
                            table.ajax.reload();
                        }) 
                    }
            }); 
              event.preventDefault();        
        });
	});
</script>