window.onload=function(){
            //popolo la select delle categorie dinamicamente
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
            //funzione di ricerca per tag
            function cercaTag(spawnProb){
                var stringTag = document.getElementById("cercaTag").value
                var xhr= new XMLHttpRequest;
                xhr.open("POST","http://localhost/2.0/php/cercaTag.php");
                xhr.onload=function(){
                    var problemi =JSON.parse(this.responseText);
                    for(i=0;i<problemi.length;i++){
                        spawnProb(problemi[i]);
                    }
                };
                xhr.send(stringTag);
                
            }
    
            //funzione di ricerca per creatore
            function cercaCreatore(spawnProb){
                var utente={
                    Nome: document.getElementById("Nome").value,
                    Cognome: document.getElementById("Cognome").value
                };
                var xhr= new XMLHttpRequest;  
                xhr.open("POST","http://localhost/2.0/php/cercaCreatore.php");
                xhr.onload=function(){
                    var problemi =JSON.parse(this.responseText);
                    //console.log(JSON.parse(this.responseText));
                    spawnProb(problemi);
                };
                xhr.send(JSON.stringify(utente));
                        // funzione di visualizzazione problemi
            }
    
            //funzione di ricerca per categoria
            function cercaCategoria(spawnProb){
                var categoria = document.getElementById("categoria").value
                var xhr= new XMLHttpRequest;
                console.log(categoria)
                xhr.open("POST","http://localhost/2.0/php/cercaCategoria.php");
                xhr.onload=function(){
                    var problemi =JSON.parse(this.responseText);
                    console.log(problemi);
                    spawnProb(problemi);
                };
                xhr.send(categoria);  
            }
    
    // funzione di ricerca dell'utente più attivo
                function cercaAttivo(){
                    var xhr= new XMLHttpRequest;
                    xhr.open("GET","http://localhost/2.0/php/cercaAttivo.php");
                    xhr.onload=function(){
                        var utente = JSON.parse(this.responseText);
                        var xhr2 = new XMLHttpRequest;
                        xhr2.open("POST","http://localhost/2.0/php/probCount.php");
                        xhr2.onload=function(){
                            var count = (JSON.parse(this.responseText)["COUNT(*)"]); 
                            var divAttivo= document.createElement("div");
                            divAttivo.classList.add("stripe");
                            document.getElementById("body").appendChild(divAttivo);
                            document.getElementById("ricerca").remove();
                            var titoloAttivo = document.createElement("h1");
                            titoloAttivo.innerHTML="L'utente più attivo è :"+utente[0].Nome+" "+utente[0].Cognome;
                            var pAttivo= document.createElement("p");
                            pAttivo.innerHTML="Questo utente ha effettuato "+count+" post!";
    
                            divAttivo.appendChild(titoloAttivo);
                            divAttivo.appendChild(pAttivo);
    
                        };
    
    
                        xhr2.send(utente[0].secretID);
                    };
                    xhr.send();   
                }
    
    //funzione per visualizzare i problemi
            function spawnProb(data){
                document.getElementById("ricerca").remove();    
            // visualizzo i problemi
                for(i=0; i< data.length; i++){
                    var div;
                    var h1;
                    var p;
                    var button;
                    var testo;
                    
                    div=document.createElement("div");
                    div.setAttribute("id", "probContainer");
                    h1=document.createElement("h1");
                    h1.setAttribute("id","titolo");
                    p=document.createElement("p");
                    p.setAttribute("id","descrizione");
    
                    div.style.background="#f4f4f4";
                    div.style.opacity="0.95";
                    div.style.width="1000px"
                    div.style.borderRadius="20px";
                    div.style.color="#3b5998";
                    div.style.margin="auto";
                    div.style.textAlign="center";
    
                    document.getElementById("problemi").appendChild(div);
                    h1.innerHTML=data[i].titolo;
                    p.innerHTML=data[i].descrizione;
    
                    div.appendChild(h1);
                    div.appendChild(p);
                }
    
            }
}