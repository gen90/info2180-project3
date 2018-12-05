
$(document).ready(function(){

    $("#submit").click(function(){

        var username = $("#username").val().trim();
        var password = $("#password").val().trim();
        var fname = $("#fname").val().trim();
        var lname = $("#lname").val().trim();
        var tel = $("#telephone").val().trim();

        
        if(username=="" || password=="" ||fname=="" ||lname=="" || tel==""){
            $("#results").html("Please complete All Fields.");
        }
        else{
            if(password.length<8){
                $("#results").html("Password must be of length 8 or more");
            }
            
        
        else{
            $.ajax({
                url:'register.php',
                type:'post',
                data:{email:username,password:password,fname:fname,lname:lname,telephone:tel},
                success:function(response){
                    
                    if(response == 0){
                        window.location.href = "dashboard.php";
                    }else{
                       $("#results").html("User Already Exists")
                    }

                }
            
        
            });
        }
        }
    });
        
    });
