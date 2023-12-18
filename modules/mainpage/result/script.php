<script type="text/javascript">
	$(document).ready(function () {
		var cookie_id = Cookies.get("id");
		$.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';


	    var table = $('#example').DataTable({			
	        processing: true,
	        serverSide: true,
			info:true,
			length:true,
			ajax: 'result/serverside_processing.php',	        
	        columnDefs: [ 
				{
					target: [0,1,2,5,7,8,11,14,17],
					visible: false,
					searchable: false
				},
				{
					targets: 15,
					render: DataTable.render.datetime('MM/DD/YYYY')
				},
				{
		            targets: [6,12],
		            render: $.fn.dataTable.render.number(',','.', 2, '₱')
		        },				
                {
                    targets: -1,
                    data: null,
                    defaultContent: '<button class="btn btn-success btn-sm mb-1 mx-1 form-control"><i class="fa-solid fa-square-check"></i> WINNER</button><button class="btn btn-secondary btn-sm mb-1 mx-1 form-control"><i class="fa-solid fa-print"></i> BET SLIP</button>',
                },            
            ],
            dom: 'Blfrtip',
			buttons: [
				{
					text: 'Export Report',
					className:'btn btn-primary btn-sm btn-squared',
					action: function ( e, dt, node, config ) {
						$('#export_data').modal('show')						 
						var table2 = $('#example2').DataTable({
							initComplete: function () {
								this.api()
									.columns()
									.every(function () {
										let column = this;
										let title = column.footer().textContent;
						
										// Create input element
										let input = document.createElement('input');
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
							bDestroy:true,
							processing: true,
							serverSide: true,
							scrollX: true,
							info:true,
							length:true,							
							ajax: 'result/serverside_processing2.php',	        
							columnDefs: [ 
								{
									target: [0,1,2],
									visible: false,
									searchable: false
								},												           
							],
							dom: 'Blfrtip',							        
						});
						
						table2.columns.adjust().draw();
					}
				}
			]            
	    });

		
	    $('#example tbody').on("click", ".btn-success", function(){
			var data = table.row($(this).parents('tr')).data();						
			if(data[18] == null || data[19] ==  null || data[20] == null || data[21] == null || data[22] == null){
				Swal.fire({										
					icon: 'error',
					title: 'Error!',		
					text:'Please Set Masyada before declaring winner!',			  
				}).then(function(){
					window.location.reload(true);
				}) 
			}else{
				var id_data = data[0];
				$('#declare_winner').modal('show');
				$('#match_a').html(data[1]);
				$('#regno_a').html(data[2]);
				$('#farmname_a').html(data[3]);
				$('#ownername_a').html(data[4]);
				$('#weight_a').html(data[5]);
				$('#bet_a').html(data[6]);
				$('#match_b').html(data[7]);
				$('#regno_b').html(data[8]);
				$('#farmname_b').html(data[9]);
				$('#ownername_b').html(data[10]);
				$('#weight_b').html(data[11]);
				$('#bet_b').html(data[12]);
				$('#fight_no').val(data[13]);
				$('#schedule_code').val(data[14]);
				$('#schedule_fight').val(data[15]);
				$('#winner').html(data[16]);
				$('#winner_id').html(data[17]);
				$('#declare_winner_a').on("click", function(){
					var declare_winner_val = $('#declare_winner_a').val();				
					Swal.fire({
						title: 'Match A',
						text: "Declare Match A as Winner?",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Yes, Declare it!'
					}).then((result) => {
						if (result.isConfirmed) {
							$.ajax({
								method: "POST",
								url: "result/declared_winner.php",
								data: {id:data[0],winner:"MATCH A",winner_name:data[3],winner_id:data[1]},
								success: function(data) {                                                                          
									generate_slip(id_data)                              
								}                                   							
							}); 				
						}
					})			
				})

				//WIN B

				$('#declare_winner_b').on("click", function(){
					var declare_winner_val = $('#declare_winner_b').val();
					Swal.fire({
						title: 'Match B',
						text: "Declare Match B as Winner?",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Yes, Declare it!'
					}).then((result) => {
						if (result.isConfirmed) {
							$.ajax({
								method: "POST",
								url: "result/declared_winner.php",
								data: {id:data[0],winner:"MATCH B",winner_name:data[9],winner_id:data[7]},
								success: function(data) {                                                                          
									generate_slip(id_data)                              
								}
							}); 				
						}
					})			
				})

				$('#declare_winner_draw').on("click", function(){
					var declare_winner_val = $('#declare_winner_draw').val();
					Swal.fire({
						title: 'DRAW',
						text: "Declare Match as Draw?",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Yes, Declare it!'
					}).then((result) => {
						if (result.isConfirmed) {
							$.ajax({
								method: "POST",
								url: "result/declared_winner.php",
								data: {id:data[0],winner:"DRAW",winner_name:data[3]+','+data[9],winner_id:data[1]+','+data[7]},
								success: function(data) {                                                                          
									Swal.fire({										
										icon: 'success',
										title: 'Success!',		
										text:'Winner Declared Successfully!',			  
									}).then(function(){
										window.location.reload(true);
									})                                 
								}
							}); 				
						}
					})			
				})

				$('#declare_winner_nf').on("click", function(){
					var declare_winner_val = $('#declare_winner_nf').val();
					Swal.fire({
						title: 'DRAW',
						text: "Declare Match as Draw?",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Yes, Declare it!'
					}).then((result) => {
						if (result.isConfirmed) {
							$.ajax({
								method: "POST",
								url: "result/declared_winner.php",
								data: {id:data[0],winner:"NF",winner_farmname:"NO FIGHT",winner_ownername:'NO FIGHT',winner_id:data[1]+','+data[7]},
									success: function(data) {                                                                          
										Swal.fire({										
											icon: 'success',
											title: 'Success!',		
											text:'Winner Declared Successfully!',			  
										}).then(function(){
											window.location.reload(true);
										})                                 
								}
							}); 				
						}
					})			
				})
			}

			//WIN A			

		})

		$('#example tbody').on("click", ".btn-secondary", function(){
			var data = table.row($(this).parents('tr')).data();
			if(data[16] == 'DRAW' || data[16] == 'NO FIGHT'){
				Swal.fire({										
					icon: 'warning',
					title: 'Warning!',		
					text:'Result: '+data[16],			  
				}).then(function(){
					window.location.reload(true);
				}) 
			}else{
				window.open('result/print.php?data1='+data[0],'', 'width=800,height=900')
			}

		})

		
		function generate_slip(id_data){
			$.ajax({
				method: "POST",
				url: "result/check_generate.php",
				data: {id:id_data},									
					success: function(data1) { 			
						if(data1 == 0){
							$.ajax({
								method: "POST",
								url: "result/load_bet.php",
								data: {id:id_data},
									beforeSend: function(){										
										Swal.fire({
											title: 'Please Wait!',
											html: 'Generating Betting Data',
											timerProgressBar: true,
											didOpen: () => {
												Swal.showLoading()								
											},							
										})
									},					
									success: function(data) {                                                                          
										Swal.fire({										
											icon: 'success',
											title: 'Success!',		
											text:'Winner Declared Successfully!',			  
										}).then(function(){
											window.location.reload(true);
										}) 				                               
									}
									
							});
						}
						else{
							Swal.fire({
								title: 'Regenerate?',
								text: "Winner has been declared already!?",
								icon: 'warning',
								showCancelButton: true,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								confirmButtonText: 'Yes, Declare it!'
							}).then((result) => {
								if (result.isConfirmed) {
									$.ajax({
										method: "POST",
										url: "result/load_update.php",
										data: {id:id_data},
											beforeSend: function(){
												Swal.fire({
													title: 'Please Wait!',
													html: 'Regenerating Betting Data',
													timerProgressBar: true,
													didOpen: () => {
														Swal.showLoading()								
													},							
												})
											},					
											success: function(data) {                                                                          
												Swal.fire({										
													icon: 'success',
													title: 'Success!',		
													text:'Winner Declared Successfully!',			  
												}).then(function(){
													window.location.reload(true);
												})					                               
											}
											
									});				
								}
							})
						}											                               
					}					
			}).then(function(){
				window.location.reload(true);
			});	
		}
		


	});
</script>