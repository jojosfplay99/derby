$(document).ready(function(){
    Cookies.remove('id',  {domain:'localhost', path: '/lmos'});
    $('#see_password').on('click', function(){
        if( $('#see_password').is(':checked') ){
            $('#password').attr('type','text')
        }
        else{
            $('#password').attr('type','password')
        } 
    })
     
    $('#login_form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "login.php",            
            data:$(this).serialize(),
            success: function(data) {  
                var response = JSON.parse(data)                                               
                var clerkid = response.clerkid;
                if(response.count == 0){
                    Swal.fire({
                        icon:'error',
                        title: 'Login Error!',
                        html: 'Please re-enter correct <i style="font-weight:bolder;">CREDENTIALS</i>!',
                        timer: 3000
                    })
                }
                else{
                    if(response.status == 'PENDING'){
                        Swal.fire({
                            icon:'warning',
                            title: 'Account Pending',
                            text: 'Please contact Head Officer to Activate',
                            showConfirmButton: false,
                            timer: 3000,
                            allowOutsideClick:false,
                        }).then(function(){
                           window.location.reload(true);
                        })
                    }else{
                        Swal.fire({
                            icon:'success',
                            title: 'Credential Accepted!',
                            text: 'Please wait while redirected',
                            showConfirmButton: false,
                            timer: 3000,
                            allowOutsideClick:false,
                        }).then(function(){
                            
                            if(response.heading == "assessor"){                            
                                Cookies.set('id',clerkid, {expires: .5, path: 'lmos/assessor'})                                                        
                                window.location.href='assessor/index.php';
                            }else if(response.heading == "head_assessor"){                            
                                Cookies.set('id',clerkid, {expires: .5, path: 'lmos/head_assessor'})                                                        
                                window.location.href='head_assessor/index.php';
                            }else if(response.heading == "treasurer"){                            
                                Cookies.set('id',clerkid, {expires: .5, path: 'lmos/treasurer'})                                                        
                                window.location.href='treasurer/index.php';
                            }
                            else if(response.heading == "head_treasurer"){                            
                                Cookies.set('id',clerkid, {expires: .5, path: 'lmos/head_treasurer'})                                                        
                                window.location.href='head_treasurer/index.php';
                            }
                            
                            
                            
                        })
                    }

                    
                    
                }
                                
            }
        }); 
    })
})