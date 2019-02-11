window.onload= function(){
       //selezione dinamica dal db delle categorie
       var select = document.getElementById("categoria");
    
       var selectCategorie = function() {
           var xhr = new XMLHttpRequest();
           xhr.open("GET","http://localhost/2.0/php/categorie.php");
           xhr.onload=function(){
                var arrCategorie = JSON.parse(xhr.responseText);
                var i=0; 
                while(i<arrCategorie.length){
                    select.innerHTML+= `  <option value="${arrCategorie[i].descrizione}" > ${arrCategorie[i].descrizione} </option>  ` ; 
                    i++;
                }
            };
            xhr.send();
        };
      
      select.addEventListener("click",selectCategorie, {once: true});

//invio del problema
    submit = document.getElementById("form").addEventListener("submit", sendProb);
    function sendProb(e){
        if(!isNaN(id)){
            e.preventDefault()
            var problema = crtJson();
            problema = JSON.stringify(problema);
            console.log(problema);
            var post = new XMLHttpRequest();
            post.open("POST","http://localhost/2.0/php/modifica.php");
            post.setRequestHeader('Content-Type', 'application/json')
            post.onload= function(){
                alert(this.responseText);
            };
            post.send(problema);
        }
       }
};