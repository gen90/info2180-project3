
$(document).ready(function(){

    $("#submit").click(function(){

        var username = $("#user").val().trim();
        var password = $("#password").val().trim();
        console.log(username);
        console.log(password);
        
        if(username=="" || password==""){
            $("#results").html("Please complete All Fields.")
        }
        if( username != "" && password != "" ){
            $.ajax({
                url:'signin.php',
                type:'post',
                data:{username:username,password:password},
                success:function(response){
                    
                    if(response == 1){
                        // $("#main-content").load("dashboard.php");
                        window.location.href = "dashboard.php";
                    }else{
                       $("#results").html("Invalid Username or Password")
                    }

                }
            });
        }
    });
});