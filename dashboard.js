window.onload = function() {
    console.log(2);
    let titles= document.getElementsByClassName('title');
    for(let i = 0; i< titles.length; i++){
        titles[i].addEventListener("click", function(event){
            event.preventDefault();
        });
    }
    document.getElementById("post").addEventListener("click",function(){
        window.location.replace("newjob.html");
    });
    
};