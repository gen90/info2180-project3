window.onload = function() {
    
    let titles= document.getElementsByClassName('title');
    for(let i = 0; i< titles.length; i++){
        titles[i].addEventListener("click", function(event){
            event.preventDefault();
        });
    }
    
};