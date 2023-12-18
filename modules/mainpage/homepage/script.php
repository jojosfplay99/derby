<script type="text/javascript">
	$(document).ready(function () {
		var cookie_id = Cookies.get("id");
		$.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';


	    var table = $('#example').DataTable({
	        processing: true,
	        serverSide: true,
			info:true,
			length:true,
	        ajax: {
				url:'homepage/serverside_processing.php',
				data: function(d){
					d.date_filter = $('#date_filter').val();
				}
			},
	        columnDefs: [ 				
                {
                    targets: 5,
                    data: null,
                    defaultContent: '<button class="btn btn-success btn-sm mb-1 mx-1" style="width:100px;"><i class="fa-solid fa-qrcode"></i> QR</button><button class="btn btn-danger btn-sm mb-1" style="width:100px;"><i class="fa-solid fa-eye"></i> DELETE</button>',
                },            
            ],
            dom: 'Blfrtip',
            buttons: [
            	{
	                text: 'Entrance',
	                className: 'btn btn-info text-white btn-sm btn-squared',
	                action: function ( e, dt, node, config ) {
						$('#entrance_modal').modal('show')
						var entrance_num = $('#entrance_num').val();						
						$('#qrcode').qrcode(entrance_num);

						$('#submit_entrance').on('click', function(){
							var date_today = $('#date_today').val();
							var status_entry = $('#status_entry').val();
							alert(status_entry)
							$.ajax({
								method: "POST",
		                        url: "homepage/add_entrance.php",
		                        data: {entrance_num:entrance_num,date_today:date_today,status:status_entry},
		                        success: function(data) { 
									Swal.fire({
										icon: 'success',
										title: 'Entrance Added!',
										showConfirmButton: false,
										timer: 1500
									}).then(function(){
										window.location.reload()
									}) ;                                                                        		                            
		                        }
							}); 
						})
						

	                }
	            },
				{
	                text: 'Raffle',
	                className: 'btn btn-primary text-white btn-sm btn-squared',
	                action: function ( e, dt, node, config ) {
						var dated = $('#date_filter').val();
						
						Swal.fire({
							title: 'Start Raffle?',
							text:'Entries will be generated',
							icon: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Proceed!'
						}).then((result) => {
						if (result.isConfirmed) {
							$.ajax({
								method: "POST",
								url: "homepage/import_entrance.php",
								data: {date:dated},
									success: function(data) {
										var result = JSON.parse(data);										
										var randomizer = result[Math.floor(Math.random()*result.length)]
										Swal.fire({
											title: 'Congratulations! ' +randomizer,
											text:'Save Winner?',
											icon: 'warning',
											showCancelButton: true,
											confirmButtonColor: '#3085d6',
											cancelButtonColor: '#d33',
											confirmButtonText: 'Proceed!'
										}).then((result) => {
										if (result.isConfirmed) {
											$.ajax({
												method: "POST",
												url: "homepage/select_winner.php",
												data: {id:randomizer,dated:dated},
													success: function(data) {														
														window.location.reload();																										
													}
												}); 
										}
										})                                                                                                        
									}
								}); 
						}
						})  

	                }
	            },
				{
	                text: 'Reset Raffle',
	                className: 'btn btn-danger text-white btn-sm btn-squared',
	                action: function ( e, dt, node, config ) {
						var dated = $('#date_filter').val();						
						Swal.fire({
							title: 'Reset Raffle?',
							text:'Raffle Entries will be deleted',
							icon: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Reset!'
						}).then((result) => {
						if (result.isConfirmed) {
							$.ajax({
								method: "POST",
								url: "homepage/reset_raffle.php",
								data: {date:dated},
									success: function(data) {
										Swal.fire({
											icon: 'success',
											title: 'Raffles Successfully Deleted!',
											showConfirmButton: false,
											timer: 1500
										}).then(function(){
											window.location.reload()
										}) ; 									                                                                                                      
									}
								}); 
						}
						})  

	                }
	            },
				{
					extend:'collection',
	                text: 'Export Options',
	                className: 'btn btn-success text-white btn-sm btn-squared',
					buttons: [
						{
							extend:'print',
							exportOptions: {
								columns: [ 1,2,3]
							}
						},
						{
							extend:'excel',
							exportOptions: {
								columns: [ 1,2,3]
							}
						},
						{
							extend:'pdf',
							exportOptions: {
								columns: [ 1,2,3]
							}
						},						
					]
	            },				
	        ]
	    });

	    $('#example tbody').on('click', '.btn-success', function () {
            var data = table.row($(this).parents('tr')).data(); 
			$('#qr_modal').modal('show')
			$('#entrance_num2').val(data[1]);
			$('#date_today2').val(data[2]);
			$('#qrcode2').qrcode(data[1]);

			$('#print_qr').on('click', function(){
				window.open('homepage/print.php?entrance_num='+data[1],'', 'width=800,height=900')	
			});
        });

		$("#qr_modal").on("hidden.bs.modal", function () {
			window.location.reload(true);
		});

		$('#date_filter').on('change', function(){
			table.ajax.reload()
		})

		$('#example tbody').on('click', '.btn-danger', function () {
              var data = table.row($(this).parents('tr')).data();  
              	Swal.fire({
				  title: 'Do you want to delete this Entrance Number?: '+data[1],
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Delete!'
				}).then((result) => {
				  if (result.isConfirmed) {
				    $.ajax({
                        method: "POST",
                        url: "homepage/delete.php",
                        data: {"id":data[0]},
                            success: function(data) {
								Swal.fire({
									icon: 'success',
									title: 'Deleted!',
									showConfirmButton: false,
									timer: 1500
								}).then(function(){
									table.ajax.reload();                                    
								}) ;                                                                                                              
                            }
                        }); 
				  }
				})           
        });

	    setInterval( function () {
		    table.ajax.reload();
		}, 5000 );


	});
</script>