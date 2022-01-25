function showMyJourneys() {
    console.log("my journeys clicked");
  
    document.getElementById("myJourneysList").innerHTML = "";
     document.getElementById("requestJourneyForm").style.display = "none";
     document.getElementById("availableJourneyList").style.display = "none";
     document.getElementById("myJourneysList").style.display = "block";
     document.getElementById("searchJourneysList").style.display = "none";
     document.getElementById("publishJourneyForm").style.display = "none";
      //if (sessionStorage.getItem("isLogin")) {
          //let userId=seessionStorage.getItem("uid");
          let userId = "1";
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              let myJourneys = JSON.parse(this.responseText);
              if(myJourneys.length > 0){
                  for(let i=0;i<myJourneys.length;i++){
                    let template= `
                    <div class="myJournListCard">
                         <div class="row1" style="display:flex;flex-flow:row-nowrap;padding:10px;gap:5px;align-items:center;">
                             <div class="leftInfoBox">
                                 <div class="departureLabel">Departure</div>
                                 <div class="departure" style="color:#0074FF;">${myJourneys[i].departure}</div>
                             </div>
                             <div class="arrowIcon" style="flex-grow:1"></div>
                             <div class="rightInfoBox">
                                 <div class="destinationLabel">Destination</div>
                                 <div class="destination" style="color:#0074FF;">${myJourneys[i].destination}</div>
                             </div>
                         </div>
                         <div class="row2" style="display:flex;flex-flow:row-nowrap;padding:10px;gap:5px;align-items:center;justify-content:center;">
                             <div class="price">Price : <span class="priceValue">${myJourneys[i].offer}</span></div>                          
                             <div class="status"> status :<span class="statusValue" style="color:#0074FF;">${myJourneys[i].status}</span></div>
                             <div class="date">Date: <span class="dateValue">${myJourneys[i].date}</span></div>
                         </div>
                
                    </div>
                    `;
                    let div = document.createElement('div');
                    div.id = i+"";
                    div.innerHTML = template;
                    document.getElementById("myJourneysList").appendChild(div);
  
                    
                  }
              }
            }else{
              alert("nothing added yet");
            }
          };
          xmlhttp.open("GET","../php/get_passenger_journey_data.php?passengerId="+userId,true);
          xmlhttp.send();
     // } else {
       
      //}
      
    }