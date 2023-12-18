<script type="text/javascript">
$( document ).ready(function() {
	Cookies.remove('id',  {domain:'localhost', path: '/lmos_v4'});
	

	$("#register").submit(function(){

	var name = $('input[name=name]').val();
	var username = $('input[name=username]').val();
	var password = $('input[name=password]').val();
	var office = $('#office_select').val();
	Swal.fire({
	  title: 'Are you sure?',
	  text: "Credentials will be submitted.",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, Register!'
	}).then((result) => {
	  if (result.isConfirmed) {	   
	    $.ajax({
		  method: "POST",
		  url: "submit_registration.php",
		  data: { "name": name, "username": username, "password": password , "office": office },		  	
		  	success: function(data) {		  		
		  		if(data == 'exist'){
		  			Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: 'Sorry! Username already taken'					  
					})
		  		}
		  		else{
		  			let timerInterval
					Swal.fire({
					  icon: 'success',
					  title: 'Success! Redirecting....',					  
					  html: 'Please wait for the Admin to activate account<br><br>Autoclose in <b></b> milliseconds.',
					  timer: 5000,
					  timerProgressBar: true,
					  didOpen: () => {
					    Swal.showLoading()
					    const b = Swal.getHtmlContainer().querySelector('b')
					    timerInterval = setInterval(() => {
					      b.textContent = Swal.getTimerLeft()
					    }, 100)
					  },
					  willClose: () => {
					    clearInterval(timerInterval)
					  }
					}).then((result) => {
					  /* Read more about handling dismissals below 
					  if (result.dismiss === Swal.DismissReason.timer) {
					    console.log('I was closed by the timer')
					  }
					  */
						window.location='index.php';
					})
		  		}
		      	
		    }
		})
	 	
	  }
	})
	
	 	event.preventDefault();
	});	


	$('#office_select').select2({                
        width: 'resolve',                        
        placeholder: "Choose Office",
        theme: "bootstrap-5",        
        allowClear: true,
        ajax: {
            url: "select_office.php",
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
            cache: true
        }                
   	})



});
</script>