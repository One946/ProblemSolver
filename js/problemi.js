
		//invio la richiesta per richiedere i problemi
		var xhr = new XMLHttpRequest();
		xhr.open('GET','http://localhost/2.0/php/problemi.php');
		xhr.onload=function(){
			var arrProb =JSON.parse(this.responseText);
			spawnProb(arrProb);
		};
        xhr.send();

		// funzione di visualizzazione problemi
		function spawnProb(data){
		// visualizzo i problemi
			for(i=0; i< data.length; i++){
                var div;
                var h1;
                var p;
                var button;
                
                div=document.createElement("div");
                div.setAttribute("id", "probContainer");
                h1=document.createElement("h1");
                h1.setAttribute("id","titolo");
                p=document.createElement("p");
                p.setAttribute("id","descrizione");
                button=document.createElement("button");

                button.setAttribute("id","b"+data[i].idProblema);
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
                button.innerHTML="Persaperne di più"
                button.addEventListener("click",singoloProblema);

                div.appendChild(h1);
                div.appendChild(p);
                div.appendChild(button);
			}

		}

        //funzione visualizzazione singolo problema
        function singoloProblema(e){
            idProblema=parseInt(e.target.id.substring(1));
			document.getElementById("problemi").remove();
            var xhr1 = new XMLHttpRequest();
			xhr1.open('POST','http://localhost/2.0/php/problema.php');//uttente problema e tag nella stessa query
			xhr1.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
                    payload1=(JSON.parse(this.responseText)); //payload contenente il problema

                            formattazione(payload1,showCommenti,inserisciCommento)
                            showCommenti(idProblema)   
                }
            }
            xhr1.send(idProblema);
           
            //funzione che da la struttura al singolo problema
            function formattazione(payload1,showCommenti,inserisciCommento){
                scroll(0,0);//torno in cima alla pagina per visualizzare il problema
                //selezione il div che conterrà il problema
                var divProblema = document.getElementById("problema");
                divProblema.className="stripe";
                divProblema.style.visibility="visibile";
                //ID Problema
				var idP=document.createElement("small");
				idP.setAttribute("id","idp");
				idP.style.marginLeft="260px";
				divProblema.appendChild(idP);
				idP.innerHTML= payload1.problema.idProblema;

				//Pulsanti Modifica/Elimina/Risolvi
				//Modifica
				var bModifica = document.createElement("button");
				bModifica.style.cssFloat="right";
				bModifica.style.marginRight="5px";
				bModifica.innerHTML="Modifica";
				bModifica.setAttribute("id","bModifica")
				divProblema.appendChild(bModifica);
				//Elimina
				var bElimina = document.createElement("button");
				bElimina.style.cssFloat="right";
				bElimina.style.marginRight="5px";

				bElimina.innerHTML="Elimina";
				bElimina.setAttribute("id","bElimina");
				divProblema.appendChild(bElimina);
				//Risolvi
				var bRisolvi = document.createElement("button");
				bRisolvi.style.cssFloat="right";
				bRisolvi.style.marginRight="5px";
				bRisolvi.innerHTML="Risolvi";
				bRisolvi.setAttribute("id","bRisolvi")
				divProblema.appendChild(bRisolvi);

				//Titolo problema
                var titolo = document.createElement("h1");
                titolo.setAttribute("id", "titolo");
                divProblema.appendChild(titolo);
                titolo.innerHTML=payload1.problema.titolo;
               //descrizione del problema 
                var descrizione = document.createElement("p");
                descrizione.setAttribute("id", "descrizione");
                divProblema.appendChild(descrizione);
                
				if(payload1.problema.anonimo){
					k="<br><i>l'utete ha deciso di effettuare la segnalazione in maniera anonima</i>"
				}
				else{
					k="<br><br><small><i>segnalazione effettuata dall'utente numero: "+payload1.problema.secretID+".  Che corrisconde all'utente: "+payload1.utenti.Nome +" "+ payload1.utenti.Cognome+"</i></small><br>";
					if(payload1.problema.dataRisol!== null){
						k+="<p> risolto il :"+payload1.problema.dataRisol+"</p>"
					}
				}


                descrizione.innerHTML=payload1.problema.descrizione+k; //il valore di k cambio al cambiare della volontà dell'utente di rimanere anonimo o no

                //TAG
                var l = payload1.tag.length;
				var tag="";
				var i=0;
				while(l>i){
					tag+= " "+payload1.tag[i];
					i++;
                }
                descrizione.innerHTML+="<br><br><b> TAG : </b> "+ tag;
                
                //creo la textarea per l'inserimento del commento
                txt=document.createElement("TEXTAREA");
                txt.setAttribute("id", "txt");
                txt.maxLength = "3000";
                txt.cols = "80";
                txt.rows = "10";
                divProblema.appendChild(txt);
                //creo il bottone per inviare il commento
                var commenta =document.createElement("button");
				commenta.setAttribute("id", "commenta");
				commenta.innerHTML="commenta!";
				commenta.style.backgroundColor="#3b5998";
				commenta.style.color="white";
				commenta.style.margin="none";
                commenta.style.marginTop="15px";
                divProblema.appendChild(commenta);


                commenta.addEventListener("click",inserisciCommento);

				bElimina.onclick=eliminaProblema;
				bRisolvi.onclick=risolviProblema;
				bModifica.onclick= modificaProblema;
				

			function eliminaProblema(){
				var idProblema= document.getElementById("idp").innerHTML;
				var xhr = new XMLHttpRequest();
				xhr.open("POST","http://localhost/2.0/php/eliminaProblema.php");
				xhr.onload=function(){
					alert(this.responseText);
				}
				xhr.send(idProblema);

			}
			function risolviProblema(){
				var idProblema= document.getElementById("idp").innerHTML;
				var xhr = new XMLHttpRequest();
				xhr.open("POST","http://localhost/2.0/php/risolviProblema.php");
				xhr.onload=function(){
					alert(this.responseText);
				}
				xhr.send(idProblema);
			}

			function modificaProblema(){
				var idProblema= document.getElementById("idp").innerHTML;
				document.location.href ="http://localhost/2.0/modifica.php?idProb="+idProblema;
			}	

        }

            //funzione che mostra i commenti
            function showCommenti(idProblema){
				 console.log(1);
				var divCommenti = document.getElementById("divCommenti");
				divCommenti.style.marginTop="15px";
				divCommenti.className="stripe";
				divCommenti.innerHTML="<h1> COMMENTI </h1>";

				var xhr = new XMLHttpRequest();
				xhr.open("POST","http://localhost/2.0/php/commenti.php");
				xhr.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							aCommenti=(JSON.parse(this.responseText));

							for(i=0;i<aCommenti.commenti.length;i++){
								var divCom = document.createElement("div");
								divCom.setAttribute("id","divCom");
								divCommenti.appendChild(divCom);
								divCom.style.opacity="0.95";
								divCom.style.background="#f4f4f4";
								divCom.style.margin="auto";
								divCom.style.width="1000px"
								divCom.style.borderRadius="25px";
								divCom.style.textAlign="center";
								divCom.style.color="#3b5998";

								var intCommento=document.createElement("h3");//INTESTAZIONE COMMENTO
								intCommento.style.color="#3b5998";
								intCommento.innerHTML="Commeto numero: "+aCommenti.commenti[i].idCommento
								var autore = document.createElement("p");

								for(j=0;j<aCommenti.utenti.length; j++){
									if(aCommenti.commenti[i].secretID=aCommenti.utenti[j].secretID){
									autore.innerHTML=aCommenti.utenti[j].Nome+" "+aCommenti.utenti[j].Cognome +" :";
									}
								}
								
								divCommenti.appendChild(intCommento);
								divCommenti.appendChild(autore);
								var descrizione=document.createElement("p");
								descrizione.setAttribute("id","descrizioneCommento");
								descrizione.innerHTML=aCommenti.commenti[i].descrizione;
								divCommenti.appendChild(descrizione);
							};
						}
				};
				xhr.send(idProblema)
            }


            function inserisciCommento(){
				//Se l'utente è autenticato inserisce il commento nella base di dati
				if(!isNaN(id)){
                    var commento={
						descrizione: document.getElementById("txt").value,
						secretID: id,
						idProblema:parseInt(document.getElementById("idp").innerHTML) 
					};
					if(commento.descrizione===""||commento.descrizione===" "){
						alert("non puoi lasciare un commento vuoto!");
					}
					else{
						var xhr = new XMLHttpRequest();
						xhr.open("POST","http://localhost/2.0/php/comment.php");
						xhr.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
								alert(this.responseText);
								showCommenti(commento.idProblema);
							}
						};
						xhr.send(JSON.stringify(commento));
						
					}
				}
			}   
        };
