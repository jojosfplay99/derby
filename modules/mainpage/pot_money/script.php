<script type="text/javascript">
	$(document).ready(function () {
		var cookie_id = Cookies.get("id");
		$.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';


	    var table = $('#example').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: {
				url:'pot_money/serverside_processing.php',
				data: function(d){
					d.date_filter = $('#search').val();
				}
			},
	        columnDefs: [ 
				/*
				{
                    "targets": [5,6,7],
                    "searchable": false,
                    "visible": false
                },
				*/				
                {
                    targets:8,
                    data: null,
                    defaultContent: '<button class="btn btn-success btn-sm mb-1 mx-1 form-control" style="width:80px;"><i class="fa-solid fa-qrcode"></i> QR</button><button class="btn btn-danger form-control btn-sm mb-1" style="width:90px;"><i class="fa-solid fa-eye"></i> DELETE</button>',
                },   
				{ 
                    targets: [5],
                    render: $.fn.dataTable.render.number( ',', '.', 2, '₱ ' )
                },          
            ],
			dom: 'Bfrtip',
			buttons: [
            	{
	                text: 'Add Pot Money',
	                className: 'btn btn-info text-white btn-sm btn-squared',
	                action: function ( e, dt, node, config ) {
						$('#pot_modal').modal('show')
						
						

	                }
	            },
				{
	                text: 'Report',
	                className: 'btn btn-primary text-white btn-sm btn-squared',
	                action: function ( e, dt, node, config ) {
						var search = $('#search').val();
						if(search == null || ''){
							Swal.fire({
								icon: 'error',
								title: 'Please Specify Search!',
								showConfirmButton: false,
								timer: 1500
							}); 
						}
						else{
							window.open('pot_money/print3.php?search='+search,'', 'width=800,height=900')
						}						
	                }
	            },				            
	        ]
	    });

		$('#search').on('change', function(){
			table.ajax.reload()
		})

		$('#example tbody').on('click', '.btn-success', function () {
            var data = table.row($(this).parents('tr')).data();  
            window.open('pot_money/print2.php?id='+data[0],'', 'width=800,height=900')	          
        });

	    
		$('#example tbody').on('click', '.btn-danger', function () {
            var data = table.row($(this).parents('tr')).data();  
            Swal.fire({
				title: 'Do you want to delete this ?: ',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Delete!'
			}).then((result) => {
				if (result.isConfirmed) {
				$.ajax({
                    method: "POST",
                    url: "pot_money/delete.php",
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


		$('#search').select2({                
            width: 'resolve',                        
            placeholder: "Search Farm Name or Owner Name",
            theme: "bootstrap-5",
            //dropdownParent: $('#participant .modal-content'),
            allowClear: true,
            ajax: {
                url: "pot_money/search_data.php",
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
        });

		$('#search2').select2({                
            width: 'resolve',                        
            placeholder: "Search Farm Name or Owner Name",
            theme: "bootstrap-5",
            dropdownParent: $('#pot_modal .modal-content'),
            allowClear: true,
            ajax: {
                url: "pot_money/search_data2.php",
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
			var id = additional.id; 
			var schedule_code = additional.schedule_code; 
            var farm_name = additional.farm_name;             
            var ownername = additional.ownername;                        
			$('#entry_id1').val(id);
            $('#farm_name1').val(farm_name);   
            $('#ownername1').val(ownername);                                                      
        }).on('select2:clear',function(event) {
			$('#entry_id1').val('');   
            $('#farm_name1').val('');   
            $('#ownername1').val('');
		});

		$('#search3').select2({                
            width: 'resolve',                        
            placeholder: "Search Farm Name or Owner Name",
            theme: "bootstrap-5",
            dropdownParent: $('#pot_modal .modal-content'),
            allowClear: true,
            ajax: {
                url: "pot_money/search_data3.php",
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
			var id = additional.id;
			$('#schedule_code1').val(id);  
		}).on('select2:clear',function(event) {
			$('#schedule_code1').val(''); 
		});

		$('#pot_money').maskMoney()

		$('#submit_form1').on('submit', function(){
			$.ajax({
				method: "POST",
		        url: "pot_money/add_pot_money.php",
		        data: $( this ).serialize(),
		        success: function(data) { 
					Swal.fire({
						icon: 'success',
						title: 'Pot Money Added!',
						showConfirmButton: false,
						timer: 1500
					}).then(function(){
						window.location.reload()
					}) ;                                                                      		                            
		        }
			}); 
			event.preventDefault();
		});

		$('#1').click(function(){
			var entry_id = $('#entry_id1').val();
			var schedule_code = $('#schedule_code1').val(); 
			var farm_name = $('#farm_name1').val();   
            var ownername = $('#ownername1').val();
            var stagcock = $('#stagcock1').val();
            var wingband = $('#wingband1').val();
			var legband = $('#legband1').val();
			var weight = $('#weight1').val();
			var payor = $('#payor1').val();
			var pot_money = $('#pot_money').val();

			alert(farm_name)
			$.ajax({
				method: "POST",
		        url: "pot_money/add_pot_money.php",
		        data: {"entry_id":entry_id, "schedule_code":schedule_code, "farm_name":farm_name, "ownername":ownername, "stagcock":stagcock, "wingband":wingband, "legband":legband, "weight":weight, "payor":payor, "pot_money":pot_money},
		        success: function(data) { 
					/*
					Swal.fire({
						icon: 'success',
						title: 'Entrance Added!',
						showConfirmButton: false,
						timer: 1500
					}).then(function(){
						window.location.reload()
					}) ;  
					*/                                                                      		                            
		        }
			}); 

		});


	    setInterval( function () {
		    table.ajax.reload();
		}, 5000 );


	});
</script>