<script type="text/javascript">
	$(document).ready(function () {
		$.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';
		var cookie_id = Cookies.get("id");

	    var table = $('#example').DataTable({
			
	        processing: true,
	        serverSide: true,			
	        order: [[ 0, 'asc' ]],
	        ajax: 'match/serverside_processing.php',
	        columnDefs: [ 			       		               	
          		{
			      "targets": [0,1,2,4,7,8,10,14,15,16,17],
			      "searchable": false,
			      "visible": false
			    },		
				{
		            targets: [6,12,18,19,20,21,22],
		            //data: null,
		            render: $.fn.dataTable.render.number(',','.', 2, '₱')
		        },
				{
					targets: [3,5,6],
					createdCell: function (td, cellData, rowData, row, col) {
							$(td).css('background-color', '#FF7F7F')
							$(td).css('color', 'white')
					}	
				},
				{
					targets: [9,11,12],
					createdCell: function (td, cellData, rowData, row, col) {
							$(td).css('background-color', '#89CFF0')
							$(td).css('color', 'white')
					}	
				},					    			   
                {
                    targets: -1,
                    data: null,
                    defaultContent: '<div class="dropdown">'
					+'<button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">•••</button>'										
					+'<ul class="dropdown-menu">'
						+'<li><a class="btn btn-info dropdown-item"><i class="fa-solid fa-list"></i> Fight No.</a></li>'
						+'<li><a class="btn btn-primary dropdown-item"><i class="fa-solid fa-coins"></i> Bet</a></li>'
						+'<li><a class="btn btn-success dropdown-item"><i class="fa-solid fa-trash"></i> Edit Owners Bet</a></li>'
						+'<li><a class="btn btn-warning dropdown-item"><i class="fa-solid fa-check"></i> Set Masyada</a></li>'
						+'<li><a class="btn btn-danger dropdown-item"><i class="fa-solid fa-trash"></i> Delete</a></li>'
					+'</ul>'
					+'</div>'
                },            
            ],            
			dom: 'Bfrtip',					    
	        buttons: [
				{
					extend: 'collection',
					text: 'Export',
					buttons: [ 'print', 'excel', 'pdf' ]
				},	                             	                    
	        ]                    	       
	    });

		
	
		
		$('#example tbody').on('click', '.btn-info', function () {
            var data = table.row($(this).parents('tr')).data();
			$('#set_fight').modal('show');
			
			$('#submit_fight').on('click', function(){
				var set_fight_no = $('#set_fight_no').val();
				Swal.fire({
					title: 'Are you sure you want to Set Fight No?',
					text: "You won't be able to revert this!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#d33',
					cancelButtonColor: '#3085d6',
					confirmButtonText: 'Set!'
				}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({
							method: "POST",
							url: "match/set_manual.php",
							data: {id:data[0],fight_no:set_fight_no,match_a:data[1],match_b:data[7]},
							success: function(data) {                                                                          
								Swal.fire({
									icon: 'success',
									title: 'Set Fight No. Successfully!',					  
								}).then(function(){
									window.location.reload(true);
								})                                   
							}
						}); 
					}
				}) 
			})        	     	           
        });

		$('#example tbody').on('click', '.btn-warning', function () {
            var data1 = table.row($(this).parents('tr')).data();
			$.ajax({
		        method: "POST",
		        url: "match/check_masyada.php",
		        data: {id:data1[0]},
		        success: function(data) {                                                                          
					var results = JSON.parse(data)
					var pareha = Math.min(results.total_a,results.total_b);
					if(results.total_a > results.total_b){
						var deperensya = results.total_a - results.total_b;
					}
					else{
						var deperensya = results.total_b - results.total_a;
					}
					var total_bet_a = results.total_a
					var total_bet_b = results.total_b							
					$('#set_masyada').modal('show');
					$('#set_matching_id_data').val(data1[0])
					$('#set_total_bet_a').val(total_bet_a)
					$('#set_total_bet_b').val(total_bet_b)
					$('#set_pareha_data').val(pareha)
					$('#set_deperensya_data').val(deperensya)
					$('#set_masyada_data').val(deperensya)
		        }
		    });
			
			$('#submit_set_masyada').on('submit', function () {	            
	        	$.ajax({
			       	method: "POST",
			       	url: "match/set_masyada.php",
			       	data: $( this ).serialize(),
			        success: function(data) {                                                                          
			            Swal.fire({
							icon: 'success',
							title: 'Update Successfully!',					  
						}).then(function(){
							window.location.reload(true)
						})                                   
				    }
			   	});  
				event.preventDefault();    	           
	        });
			       	     	           
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
		                url: "match/delete.php",
		                data: {id:data[0],match_a:data[1],match_b:data[7]},
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

	    var table2 = $('#example2').DataTable({	
		    initComplete: function () {
		        this.api()
		            .columns()
		            .every(function () {
		                let column = this;
		                let title = column.footer().textContent;
		 
		                // Create input element
		                let input = document.createElement('input');
		                input.classList = ('form-control')
		                input.placeholder = title;
		                column.footer().replaceChildren(input);
		 
		                // Event listener for user input
		                input.addEventListener('keyup', () => {
		                    if (column.search() !== this.value) {
		                        column.search(input.value).draw();
		                    }
		                });
		            });
		    },    	
	        bDestroy: true,
			processing: true,
			serverSide: false,
			paging: false,
			info: false,			
			order: [[ 4, 'asc' ]],
			ajax: 'match/serverside_processing2.php',				   
			columnDefs: [ 	        	
		       	{
					targets: [0,3,4,5,6,11,12],
					visible: false
				},	
				{
	                targets: 10,
	                render: $.fn.dataTable.render.number(',','.', 2, '₱')
	            },	
	            {
	                targets: 13,
	                data: null,
	                defaultContent: '<button class="btn btn-primary btn-square btn-sm mb-1 form-control"><i class="fa-solid fa-magnifying-glass"></i> Match</button>',
	            },            		   		                      
		    ],				      
		    dom: 'Blfrtip',		    
	        buttons: [	        	
	            {
	            	extend:'collection',
	                text: 'FILTER BY WEIGHT',
	                className:'btn btn-primary btn-sm btn-square',
	                buttons: [
	                	{
	                        text: 'Clear Filter',
	                        action: function ( e, dt, node, config ) {	                            
							    var colIdx = 9; // 4th column (first col has index of 0)
							    $.fn.dataTable.ext.search.pop()							    
							    table2.column( colIdx ).order( 'asc' ).draw();
	                        }
	                    },                    
	                    {
	                        text: 'Below 1700',
	                        action: function ( e, dt, node, config ) {
	                            var threshold = 1699; // or whatever you want
							    var colIdx = 9; // 4th column (first col has index of 0)

							    $.fn.dataTable.ext.search.pop()
							    $.fn.dataTable.ext.search.push(
							      function( settings, data, dataIndex ) {
							        return (data[colIdx] < threshold);
							      }
							    );
							    
							    table2.column( colIdx ).order( 'asc' ).draw();
	                        }
	                    },
	                    {
	                        text: '1700 - 1750',
	                        action: function ( e, dt, node, config ) {
	                            var threshold = 1749; // or whatever you want
	                            var threshold2 = 1699; // or whatever you want
							    var colIdx = 9; // 4th column (first col has index of 0)

							    $.fn.dataTable.ext.search.pop()
							    $.fn.dataTable.ext.search.push(
							      function( settings, data, dataIndex ) {
							        return (data[colIdx] < threshold && data[colIdx] > threshold2);
							      }
							    );							    
							    table2.column( colIdx ).order( 'asc' ).draw();
	                        }
	                    }
	                ]
	            }	            
	        ],		              	      
		});	

		$('#example2 tbody').on('click', '.btn-primary',function(){
			var data = table2.row($(this).parents('tr')).data();			
			$('#match_modal').modal('show');
			$('#match_a').val(data[0])
			$('#farmname_a').val(data[1])
			$('#ownername_a').val(data[2])
			$('#fightschedule_a').val(data[4])
			$('#fightcode_a').val(data[5])
			$('#regno_a').val(data[3])
			$('#weight_a').val(data[9])
			$('#bet_a').maskMoney();
			$('#bet_a').val(data[10]).trigger('mask.maskMoney')
			//$("#bet_a").maskMoney('mask','1234');
			
			var table3 = $('#example3').DataTable({        	
		        bDestroy: true,
				processing: true,
				serverSide: true,
				paging: false,
				info: false,
				searching: false,
				order: [[ 4, 'asc' ]],
				ajax: {
				    url: "match/serverside_processing3.php",
				    data: function ( d ) {
				        d.extra_search = data[3];
				    }
				},											  
				columnDefs: [ 	        	
			       	{
						"targets": [0,3,4,5,6,11,12],
						"visible": false
					},	
					{
		                targets: 10,
		                //data: null,
		                render: $.fn.dataTable.render.number(',','.', 2, '₱')
		            }, 		   		                       
			    ],		              	      
			});

			$('#example3 tbody').on('click', 'tr', function () {
				var data3 = table3.row( this ).data() 
				$('#match_b').val(data3[0])
				$('#farmname_b').val(data3[1])
				$('#ownername_b').val(data3[2])
				$('#fightschedule_b').val(data3[4])
				$('#fightcode_b').val(data3[5])
				$('#regno_b').val(data3[3])
				$('#weight_b').val(data3[9])
				$('#bet_b').maskMoney();
				$('#bet_b').val(data3[10]).trigger('mask.maskMoney')				
		    } );			

		});

		
	    $('#match_fight').on('click', function () {	
			var id1 = $('#match_a').val()
			var id2 = $('#match_b').val()			
			var farmname_a = $('#farmname_a').val()
			var farmname_b = $('#farmname_b').val()
			var ownername_a = $('#ownername_a').val()
			var ownername_b = $('#ownername_b').val()
			var fightschedule_a = $('#fightschedule_a').val()
			var fightschedule_b = $('#fightschedule_b').val()
			var fightcode_a = $('#fightcode_a').val()
			var fightcode_b = $('#fightcode_b').val()
			var regno_a = $('#regno_a').val()
			var regno_b = $('#regno_b').val()
			var weight_a = $('#weight_a').val()
			var weight_b = $('#weight_b').val()
			var bet_a = $('#bet_a').val()
			var bet_b = $('#bet_b').val()
            Swal.fire({
				title: 'Are you sure you want to <br> match this pair?',
				text: 'Stagcock Number: '+id1+' and '+ id2,
				icon: 'warning',
				showCancelButton: true,
				cancelButtonColor: '#d33',
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Match!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
			            method: "POST",
			            url: "match/match_pair.php",
			            data: {match_a:id1,farmname_a:farmname_a,ownername_a:ownername_a,regno_a:regno_a,weight_a:weight_a,match_b:id2,farmname_b:farmname_b,ownername_b:ownername_b,fightschedule_a:fightschedule_a,fightschedule_b:fightschedule_b,fightcode_a:fightcode_a,fightcode_b:fightcode_b,regno_b:regno_b,weight_b:weight_b,bet_a:bet_a,bet_b:bet_b},
			            success: function(data) {  
							Swal.fire({
								icon: 'success',
								title: 'Success',
								text: 'Matched Successfully!',					  
							}).then(function(){
								window.location.reload(true);
							})                                                                                        	    
			            }
			        });
				}
			})			
            event.preventDefault();        
        });

		$('#example tbody').on('click', '.btn-success', function () {
			var data = table.row($(this).parents('tr')).data();
			$('#edit_bet_modal').modal('show')
			$('#edit_matching_id').val(data[0])
			$('#edit_match_id_a').val(data[1])
			$('#edit_farmname_a').val(data[3])
			$('#edit_bet_owner_a').val(data[6])
			$('#edit_match_id_b').val(data[7])
			$('#edit_farmname_b').val(data[9])
			$('#edit_bet_owner_b').val(data[12])

			$('#submit_edit_bet').on('submit', function () {	            
	        	$.ajax({
			       	method: "POST",
			       	url: "match/edit_bets.php",
			       	data: $( this ).serialize(),
			        success: function(data) {                                                                          
			            Swal.fire({
							icon: 'success',
							title: 'Deleted Successfully!',					  
						}).then(function(){
							window.location.reload(true)
						})                                   
				    }
			   	});  
				event.preventDefault();    	           
	        });

		})

    
	    $('#example tbody').on('click', '.btn-primary', function () {
            var data = table.row($(this).parents('tr')).data();					
				
			$('#print_bet_slip').on('click', function(){	
				window.open('match/print2.php?id='+data[0],'', 'width=800,height=900')
				window.location.reload(true);			
			});
			
			
			$('#print_bet_result').on('click', function(){
				window.open('match/print.php?id='+data[0],'', 'width=800,height=900')
				window.location.reload(true);	
			})

        	$('#bet_modal').modal('show');
			$('#bet_fight_no').text(data[13]);	
			
			var match_id_value = data[0]
			$('#match_id').val(match_id_value);
			$('#additional_bet').maskMoney()
								

						
        	var table4 = $('#example4').DataTable({
		        bDestroy: true,
				processing: true,
				serverSide: true,
				paging: false,
				searching:false,
				info: false,
				order: [[ 4, 'asc' ]],
				ajax: {
					url: "match/serverside_processing4.php",
					data: function ( d ) {
						d.extra_search = match_id_value
					}
				},				
				columnDefs: [ 	        	
			       	{
						"targets": [0,1],
						"visible": false
					},	
					{
		                targets: 3,
		                //data: null,
		                render: $.fn.dataTable.render.number(',','.', 2, '₱')
		            },
		            {
	                    targets: 4,
	                    data: null,
	                    defaultContent: '<button class="btn btn-success btn-squared btn-sm mx-1"><i class="fa-solid fa-print"></i> </button><button class="btn btn-danger btn-squared btn-sm"><i class="fa-solid fa-trash"></i> </button>',
	                },  		   		                       
			    ],	
				footerCallback: function (row, data, start, end, display) {
					let api = this.api();
			
					// Remove the formatting to get integer data for summation
					let intVal = function (i) {
						return typeof i === 'string'
							? i.replace(/[\$,]/g, '') * 1
							: typeof i === 'number'
							? i
							: 0;
					};
			
					// Total over all pages
					total = api
						.column(3)
						.data()
						.reduce((a, b) => intVal(a) + intVal(b), 0);							
			
					// Update footer
					var total = $.fn.dataTable.render.number( ',', '.', 2, '₱' ).display( total )
					api.column(3).footer().innerHTML = total;
				}		                 	     
			});


			//$("#bet1").maskMoney();
			//$("#schedule_code1").val(data[6])
			//$("#schedule_fight1").val(data[7])

			function onScanSuccess(decodedText, decodedResult) {
				// Handle on success condition with the decoded text or result.				
				alert(decodedText)
				$('#data1').val(decodedText)
				// ...				
			}

			var html5QrcodeScanner = new Html5QrcodeScanner(
			"reader", { fps: 10, qrbox: 250 });
					
			html5QrcodeScanner.render(onScanSuccess);							

			var table5 = $('#example5').DataTable({
		        bDestroy: true,
				processing: true,
				serverSide: true,
				paging: false,
				searching:false,
				info: false,
				order: [[ 4, 'asc' ]],
				ajax: {
					url: "match/serverside_processing5.php",
					data: function ( d ) {
						d.extra_search = match_id_value
					}
				},
				columnDefs: [ 	        	
			       	{
						"targets": [0,1],
						"visible": false
					},	
					{
		                targets: 3,
		                //data: null,
		                render: $.fn.dataTable.render.number(',','.', 2, '₱')
		            },
		            {
	                    targets: 4,
	                    data: null,
	                    defaultContent: '<button class="btn btn-success btn-squared btn-sm mx-1"><i class="fa-solid fa-print"></i> </button><button class="btn btn-danger btn-squared btn-sm"><i class="fa-solid fa-trash"></i> </button>',
	                },  		   		                       
			    ],		
				footerCallback: function (row, data, start, end, display) {
					let api = this.api();
			
					// Remove the formatting to get integer data for summation
					let intVal = function (i) {
						return typeof i === 'string'
							? i.replace(/[\$,]/g, '') * 1
							: typeof i === 'number'
							? i
							: 0;
					};
			
					// Total over all pages
					total = api
						.column(3)
						.data()
						.reduce((a, b) => intVal(a) + intVal(b), 0);							
			
					// Update footer
					var total = $.fn.dataTable.render.number( ',', '.', 2, '₱' ).display( total )
					api.column(3).footer().innerHTML = total;
				}	                 	     
			});
			

	        $('#example4 tbody').on('click', '.btn-danger', function () {
	            var data = table4.row($(this).parents('tr')).data();  
	        	$.ajax({
			       	method: "POST",
			       	url: "match/delete2.php",
			       	data: {id:data[0]},
			        success: function(data) {                                                                          
			            Swal.fire({
							icon: 'success',
							title: 'Deleted Successfully!',					  
						}).then(function(){
							window.location.reload(true)
						})                                   
				    }
			   	});      	           
	        });

			$('#example4 tbody').on('click', '.btn-success', function () {
	            var data = table4.row($(this).parents('tr')).data();				
				window.open('match/print.php?id='+data[0],'', 'width=800,height=900')					        	
	        });

			$('#example5 tbody').on('click', '.btn-danger', function () {
	            var data = table5.row($(this).parents('tr')).data();  
	        	$.ajax({
			       	method: "POST",
			       	url: "match/delete2.php",
			       	data: {id:data[0]},
			          	success: function(data) {                                                                          
			              	Swal.fire({
							icon: 'success',
							title: 'Deleted Successfully!',					  
						}).then(function(){
							table5.ajax.reload()
						})                                   
				    }
			   	});      	           
	        });						

        });

		$('#submit_additional_bet').on('submit', function () {
			var data1 = $('#data1').val()
			if(data1 == ''){
					Swal.fire({
						title: 'Transaction Number / Entrance Number Empty!',
						text: "Do you want to generate?",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Yes, generate it!'
					}).then((result) => {
						if (result.isConfirmed) {
							$.ajax({
								method: "POST",
								url: "match/add_bet.php",
								data: $( this ).serialize(),
									success: function(data) {  
										Swal.fire({
										icon: 'success',
										title: 'Schedule Added',					  
										}).then(function(){
											window.location.reload(true)
										})                                                                                        	    
									}
							}); 
						}							
					})
				}
				else{
					$.ajax({
						method: "POST",
						url: "match/add_bet.php",
						data: $( this ).serialize(),
							success: function(data) {  
								Swal.fire({
								icon: 'success',
								title: 'Schedule Added',					  
								}).then(function(){
									window.location.reload(true)
								})                                                                                        	    
							}
					}); 
				}        	
	            event.preventDefault();        
	    });

        

	    

		        
		







	   

	    


	});
</script>