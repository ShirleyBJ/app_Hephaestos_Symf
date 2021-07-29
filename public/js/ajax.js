//Déclaration des élèments du DOM
var btnCall = document.getElementById('call');
//console.log(btnCall);
var blockDisplay = document.getElementsByClassName('block__display-data');
//console.log(blockDisplay);
const apiKey = "JfimTJFUlQZEt3VrGZSXBsNqY566b1Ao";
const bbox = "2.570812,49.291765,2.950359,49.488743";
const allFieldData = "{incidents{properties{events{description},startTime,endTime,from,to,roadNumbers}}}";

window.onload = getTraffic;

function getTraffic(){
    //console.log("Click is working");

    //Instanciation de l'objet
    var xhr = new XMLHttpRequest();
    //Démarrage de l'appel
    xhr.open("GET","https://api.tomtom.com/traffic/services/5/incidentDetails?key="+ apiKey +"&bbox="+bbox+"&fields="+allFieldData+"&language=fr-FR",true);
    xhr.send(null);

    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 &&(xhr.status == 200 || xhr.status == 0)){
            //console.log(xhr.responseText);
            //Désérialisation de la réponse xhr
            var dataTraffic = JSON.parse(xhr.responseText);
            //console.log(dataTraffic);
            //Avoir accés aux incidents
            console.log(dataTraffic.incidents[0]);
            /*console.log(dataTraffic.incidents[0].properties.startTime);
            console.log(dataTraffic.incidents[0].properties.endTime);
            console.log(dataTraffic.incidents[0].properties.from);
            console.log(dataTraffic.incidents[0].properties.to);
            console.log(dataTraffic.incidents[0].properties.events[0].description);
            console.log(dataTraffic.incidents[0].properties.roadNumbers[0]);*/

            for(var i = 0 ; i < dataTraffic.incidents.length; i++){
                //Afficher "en cours" au lieu de "null" si pas de date de fin défini
                if(dataTraffic.incidents[i].properties.endTime == null){
                    dataTraffic.incidents[i].properties.endTime = "En cours";
                }

                //Enlever le T et Z entre date et heure
                if(dataTraffic.incidents[i].properties.startTime.includes("Z") || dataTraffic.incidents[i].properties.startTime.includes("T")){
                    dataTraffic.incidents[i].properties.startTime = dataTraffic.incidents[i].properties.startTime.replace("Z"," ");
                    dataTraffic.incidents[i].properties.startTime = dataTraffic.incidents[i].properties.startTime.replace("T"," ");
                }
                
                if(dataTraffic.incidents[i].properties.endTime.includes("Z") || dataTraffic.incidents[i].properties.endTime.includes("T")){
                    dataTraffic.incidents[i].properties.endTime = dataTraffic.incidents[i].properties.endTime.replace("Z"," ");
                    dataTraffic.incidents[i].properties.endTime = dataTraffic.incidents[i].properties.endTime.replace("T"," ");
                }

                //Afficher "Non défini" à la place de undefined 
                if(dataTraffic.incidents[i].properties.roadNumbers[0] == undefined){
                    dataTraffic.incidents[i].properties.roadNumbers[0] = "Non défini";
                }

                //Console.log de mes différent élements
                //console.log("Description : " + dataTraffic.incidents[i].properties.events[0].description);
                //console.log("Route concernée : " + dataTraffic.incidents[i].properties.roadNumbers[0]); 
                //console.log("De : " + dataTraffic.incidents[i].properties.from);
                //console.log(" à : " + dataTraffic.incidents[i].properties.to); 
                //console.log("Date et heure du début de la pertubation : "+ dataTraffic.incidents[i].properties.startTime);
                //console.log("Date et heure de fin de la pertubation : "+ dataTraffic.incidents[i].properties.endTime);

                //Création d'un element div pour contenir tous les élements
                var blockData = document.createElement('ul');
                blockData.classList.add('block__data');
                var description = document.createElement('li');

                //affecter une icône différente aux évenement principaux
                var icon = "";
                if(dataTraffic.incidents[i].properties.events[0].description === "Travaux"){
                    icon = "<i class=\"fas fa-hard-hat\"></i>";
                } else if(dataTraffic.incidents[i].properties.events[0].description === "Route fermée" || dataTraffic.incidents[i].properties.events[0].description === "Une voie fermée" ){
                    icon = "<i class=\"fas fa-exclamation-triangle\"></i>";
                } else if(dataTraffic.incidents[i].properties.events[0].description === "Bouchon"){
                    icon = "<i class=\"fa fa-users\" aria-hidden=\"true\"></i>";
                }else if(dataTraffic.incidents[i].properties.events[0].description === "Trafic ralenti" ||dataTraffic.incidents[i].properties.events[0].description === "Trafic avec des à-coups" ){
                    icon = "<i class=\"fa fa-pause\" aria-hidden=\"true\"></i>";
                }

                description.innerHTML = "<strong>"+ icon +" Description :</strong> " + dataTraffic.incidents[i].properties.events[0].description
                
                //Création d'un element li pour contenir chacune des informations
                var road = document.createElement('li');
                road.innerHTML = "<strong><i class=\"fas fa-road\"></i> Route concernée </strong>: " + dataTraffic.incidents[i].properties.roadNumbers[0];

                var fromTo = document.createElement('li');
                fromTo.innerHTML = "<strong><i class=\"fas fa-map-marker-alt\"></i> De : </strong>" + dataTraffic.incidents[i].properties.from + "<strong class=\"txtDecoration\">  à  </strong> " + dataTraffic.incidents[i].properties.to;

                var startTime = document.createElement('li');
                startTime.innerHTML = "<strong><i class=\"fas fa-clock\"></i> Début de la pertubation</strong> : "+ dataTraffic.incidents[i].properties.startTime;
                
                var endTime = document.createElement('li');
                endTime.innerHTML = "<strong><i class=\"fas fa-calendar-check\"></i> Fin de la pertubation </strong>: "+ dataTraffic.incidents[i].properties.endTime;
                
                blockData.appendChild(description);
                blockData.appendChild(road);
                blockData.appendChild(fromTo);
                //blockData.appendChild(to);
                blockData.appendChild(startTime);
                blockData.appendChild(endTime);

                blockDisplay[0].appendChild(blockData);
            }
        }
    }
}