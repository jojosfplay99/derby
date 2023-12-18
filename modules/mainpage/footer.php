</body>

<script type="text/javascript">
	$(document).ready(function(){		
		var cookie_id = Cookies.get("id");
		$.ajax({
        	method: "POST",
        	url: "check_data.php",
        	data: {"cookie_id":cookie_id},            	
	        success: function(data) { 
	        		var data1 = JSON.parse(data);
					if(data1.designation != 'admin'){					        			        			    			        		
	        			Swal.fire({
						  title: 'Error!',
						  text: 'Unauthorized Access!',
						  icon: 'error',
						  confirmButtonText: 'Cool'
						}).then(function(){
							Cookies.remove('id',  {domain:'localhost', path: '/lmos_v4'});			
							window.location.href='../../index.php';
						});
	        		}

	        		
	            }
	    });    

		$('#logout_button').on('click',function(){
			Cookies.remove('id',  {domain:'localhost', path: '/lmos_v4'});			
			window.location.href='../../index.php';
		});
	});	
</script>