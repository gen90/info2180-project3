window.onload = function(){
    document.querySelector("#submit").addEventListener("click",function(){
        var user = document.querySelector("#user");
        var pword = document.querySelector("#password");
        var result = document.querySelector("#results");

        if(user.value=="" || pword.value==""){
            user.classList.add("missing");
            pword.classList.add("missing");
            result.innerHTML = "Please enter a username and password";
            return false;
        }
        
        else{
            var request = new XMLHttpRequest();
            request.onreadystatechange = validateUser;
            request.open("POST","schema.php");
            request.send();
        }
        
        function validateUser(e){
            e.preventDefault();
            if (request.readyState === XMLHttpRequest.DONE) {
                if (request.status === 200) {
                    console.log(request.responseText);
                    result.innerHTML = request.responseText;
                } 
             }
        }
    });
};