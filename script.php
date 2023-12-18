<script type="text/javascript">
$( document ).ready(function() {
	Cookies.remove('id',  {domain:'localhost', path: '/lmos_v4'});

	$("#login").submit(function(){

	 var username = $('input[name=username]').val();
	 var password = $('input[name=password]').val();
	 	$.ajax({
		  method: "POST",
		  url: "login.php",
		  data: { username: username, password: password },
		  	success: function(data) {
		  		var inputdata = JSON.parse(data);
			  		if(inputdata.status == 'PENDING'){
			  			Swal.fire({
						  	title: 'Pending Account!',
						  	text: 'Please Contact Administrator or Head',
						  	icon: 'warning',
						  	showConfirmButton: false,
	  						timer: 1500
						});
			  		}
			  		else{
			  			if(inputdata.code == '0'){
			      		Swal.fire({
						  	title: 'Error!',
						  	text: 'No Registered User',
						  	icon: 'error',
						  	showConfirmButton: false,
	  						timer: 1500
						});
			      	}
			      	else{			      		
			      		if(inputdata.designation == 'admin'){
			      			Swal.fire({
							  	title: 'Success!',
							  	text: 'Welcome to Admin Page!',
							  	icon: 'success',
							  	showConfirmButton: false,
		  						timer: 1500
							}).then(function() {
								Cookies.remove('id');
								Cookies.set('id',inputdata.id, { expires: .5, path: 'lmos_ver4/modules/mainpage' })
							    window.location = "modules/mainpage/index.php";
							});
			      		}		      		
			      	}
		  		}
		      	
		    }
		})
	 event.preventDefault();
	});	

});
</script>