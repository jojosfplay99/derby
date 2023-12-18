<script type="text/javascript">
	$(document).ready(function () {
		$.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';
		var cookie_id = Cookies.get("id");

	    var table = $('#example').DataTable({
	        processing: true,
	        serverSide: true,
	        order: [[ 4, 'asc' ]],
	        ajax: 'schedule/serverside_processing.php',
	        columnDefs: [ 	        	
          		{
			      "targets": [0],
			      "searchable": false,
			      "visible": false
			    },	
				{
		            targets: [7],
		            //data: null,
		            render: $.fn.dataTable.render.number(',','.', 2, '₱')
		        },
				{
					targets: 4,
					render: DataTable.render.datetime('MM/DD/YYYY')
				},
				{
		            targets: [5],
		            //data: null,
		            render: $.fn.dataTable.render.number(',','.')
		        },		   
                {
                    targets: 9,
                    data: null,
					defaultContent: '<div class="dropdown">'
					+'<button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-bars"></i></button>'										
						+'<ul class="dropdown-menu">'
							+'<li><a class="btn-info dropdown-item"><i class="fa-solid fa-calendar-week"></i> Final List</a></li>'
							+'<li><a class="btn-primary dropdown-item"><i class="fa-solid fa-calendar-week"></i> Re-Schedule</a></li>'
							+'<li><a class="btn-secondary dropdown-item"><i class="fa-solid fa-check"></i> Winner</a></li>'
							+'<li><a class="btn-success dropdown-item"><i class="fa-solid fa-eye"></i> View Participants</a></li>'
							+'<li><a class="btn-danger dropdown-item"><i class="fa-solid fa-trash"></i> Delete Schedule</a></li>'
						+'</ul>'
					+'</div>'
                },            
            ],
            dom: 'Bfrtip',
            buttons: [            	
	            {
	                text: '<i class="fa-solid fa-calendar-plus"></i> Add Schedules',
	                className: 'btn btn-primary btn-sm btn-squared',
	                action: function ( e, dt, node, config ) {	                	
						$('#register').modal('show');
	                }
	            },
	            {
	                extend: 'colvis',
	                className: 'btn btn-success btn-sm btn-squared',	                
	            },
	        ],
	        'rowCallback': function(row, data, index){
	        	var dt1 = new Date(Date.now());
			    var dt2 = new Date(data[4]);
			 			    
			    var time_difference = dt2.getTime() - dt1.getTime();        	
			    var days = time_difference/1000/60/60/24;
			    var final_days = Math.floor(days) + 1;
			    //alert(final_days)

			    if (final_days > 10) {        
	         		$(row).find('td:eq(3)').css('color', 'blue');
	         	}
	         	else if (final_days == 0) {        
	         		$(row).find('td:eq(3)').css('color', 'green');
	         	}	  
	         	else{
	         		$(row).find('td:eq(3)').css('color', '#FD3412');
	         	} 			    
			},	        
	    });

	    $('#example tbody').on('click', '.btn-primary', function () {
            var data = table.row($(this).parents('tr')).data();  
        	Swal.fire({
				title: 'Are you sure you want to Re-Schedule?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#3085d6',
				confirmButtonText: 'Re-Schedule!'
			}).then((result) => {
				if (result.isConfirmed) {
					$('#reschedule').modal('show');
					$('#scheduled_id').val(data[0]);
					$('#set_reschedule').val(data[4]);
				}
			})      	           
        });

		$('#example tbody').on('click', '.btn-secondary', function () {
            var data = table.row($(this).parents('tr')).data();  
			window.open('schedule/print2.php?schedule_code='+data[8],'', 'width=800,height=900')	     	           
        });

	    $('#example tbody').on('click', '.btn-danger', function () {
            var data = table.row($(this).parents('tr')).data();  
        	Swal.fire({
				title: 'Are you sure you want to reset?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#3085d6',
				confirmButtonText: 'Reset!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
		                method: "POST",
		                url: "schedule/delete.php",
		                data: {id:data[0]},
		                  	success: function(data) {                                                                          
		                      	Swal.fire({
									icon: 'success',
									title: 'Deleted Successfully!',					  
							}).then(function(){
								window.location.reload(true);
							})                                   
		                }
		            }); 
				}
			})      	           
        });

		$('#example tbody').on('click', '.btn-info', function () {
            var data = table.row($(this).parents('tr')).data();  
        	window.open('schedule/print.php?id='+data[0],'', 'width=800,height=900')	     	           
        });

        $('#submit_schedule').on('submit', function () {
        	$.ajax({
                method: "POST",
                url: "schedule/add_schedule.php",
                data: $(this).serialize(),
                    success: function(data) {  
	                    Swal.fire({
						  icon: 'success',
						  title: 'Schedule Added',					  
						}).then(function(){
							window.location.reload(true);
						})                                                                                        	    
            	    }
            }); 
              event.preventDefault();        
        });

        $('#update_schedule').on('submit', function () {
        	$.ajax({
                method: "POST",
                url: "schedule/update_schedule.php",
                data: $(this).serialize(),
                    success: function(data) {  
	                    Swal.fire({
						  icon: 'success',
						  title: 'Schedule Added',					  
						}).then(function(){
							window.location.reload(true);
						})                                                                                        	    
            	    }
            }); 
              event.preventDefault();        
        });

	});
</script>