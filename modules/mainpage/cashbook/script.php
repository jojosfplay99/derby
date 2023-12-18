<script type="text/javascript">
	$(document).ready(function () {
		var cookie_id = Cookies.get("id");
		$.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';


	    var table = $('#example').DataTable({			
	        processing: true,
	        serverSide: true,
			info:true,
			length:true,
			ajax: 'cashbook/serverside_processing.php',	        
	        columnDefs: [ 
				{
					target: [0],
					visible: false,
					searchable: false
				},				
                {
                    targets: -1,
                    data: null,
                    defaultContent: '<button class="btn btn-success btn-sm mb-1 mx-1 form-control"><i class="fa-solid fa-pencil"></i> EDIT</button><button class="btn btn-danger btn-sm mb-1 mx-1 form-control"><i class="fa-solid fa-trash"></i> DELETE</button>',
                },            
            ],
            dom: 'Blfrtip',
			buttons: [
				{
					text: 'Add to Report',
					className:'btn btn-success btn-sm btn-squared mx-1',
					action: function ( e, dt, node, config ) {
						$('#cashbook_modals').modal('show')						 						
					}
				},
				{
					text: 'Export Report',
					className:'btn btn-primary btn-sm btn-squared',
					extend: 'collection',
					text: 'Export',
					autoClose: true,
					buttons: [ 'csv', 'excel', 'pdf' ,'print' ]					
				}
			]            
	    });

		$('#submit_new_ledger1').on("submit", function(){
			$.ajax({
			    method: "POST",
			    url: "cashbook/add_cashbook.php",
			    data: $( this ).serialize(),
			    success: function(data) {                                                                          
			        Swal.fire({
						icon: 'success',
						title: 'Added Successfully!',					  
					}).then(function(){
						window.location.reload(true)
					})                                   
				}
			});  
			event.preventDefault(); 
		})

		$('#example tbody').on("click", '.btn-danger', function(){
			var data = table.row($(this).parents('tr')).data();
			Swal.fire({
				title: 'Do you want to Delete?',
				html: "You will not be able to recover deleted files!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#3085d6',
				confirmButtonText: 'Delete!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						method: "POST",
						url: "cashbook/delete.php",
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
		})

		$('#example tbody').on("click", '.btn-success', function(){
			var data = table.row($(this).parents('tr')).data();			
			$('#edit_cashbook_modals').modal('show')
			$('#edit_id').val(data[0])
			$('#edit_payee').val(data[1])
			$('#edit_credit_transaction').text(data[2])
			$('#edit_credit_amount').val(data[3])
			$('#edit_debit_transaction').text(data[4])
			$('#edit_debit_amount').val(data[5])
			$('#edit_remarks').val(data[6])
			$('#edit_date_created').val(data[7])
		})

		$('#submit_edit_ledger1').on("submit", function(){
			$.ajax({
			    method: "POST",
			    url: "cashbook/edit_ledger.php",
			    data: $( this ).serialize(),
			    success: function(data) {                                                                          
			        Swal.fire({
						icon: 'success',
						title: 'Edited Successfully!',					  
					}).then(function(){
						//window.location.reload(true)
					})                                   
				}
			});  
			event.preventDefault(); 
		})



	});
</script>