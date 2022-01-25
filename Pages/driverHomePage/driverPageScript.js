
function showMyJourneys() {
    console.log("my journeys clicked");
      //if (sessionStorage.getItem("isLogin")) {
          //let userId=seessionStorage.getItem("uid");
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              console.log(this.responseText);
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
            }
          };
          xmlhttp.open("POST","../../PHP/get_passenger_journey_data.php",true);
          xmlhttp.send();
     // } else {
       
      //}
      
}

function showAvailableJourneys(){
    //if (sessionStorage.getItem("isLogin")) {
   
        var xmlhttpAvailable = new XMLHttpRequest();
        xmlhttpAvailable.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
           
            console.log(this.responseText);
            let myJourneys = JSON.parse(this.responseText);
            if(myJourneys.length > 0){
                for(let i=0;i<myJourneys.length;i++){
                  let template= `
                  <div class="availListCard" style="display:flex;flex-flow:column nowrap;padding:10px;gap:5px;border:2px solid #0074FF;border-radius:30px;">
                    <div class="row1" style="display:flex;flex-flow:row-nowrap;padding:10px;gap:5px;align-items:center;">
                        <div class="profileImage" style="border:5px solid #0074FF;border-radius:50%;width:40px;height:40px;"></div>
                        <div class="userName">${myJourneys[i].firstName}</div>
                        <div style="flex-grow:1;"></div>
                        <div class="price">Price : <span class="priceValue">${myJourneys[i].offer}</span></div>
                    </div>
                    <div class="row2" style="display:flex;flex-flow:row-nowrap;padding:10px;gap:5px;align-items:center;">
                        <div class="leftBoxInfo">
                                <div class="departureLabel">Departure</div>
                                <div class="departure" style="color:#0074FF;">${myJourneys[i].departure}</div>
                        </div>
                        <div style="flex-grow:1;"></div>
                        <div class="rightBoxInfo">
                            <div class="destinationLabel">Destination</div>
                            <div class="destination" style="color:#0074FF;">${myJourneys[i].destination}</div>
                        </div>  
                    </div>
                    <div class="row3" style="display:flex;flex-flow:row-nowrap;padding:10px;gap:5px;align-items:center;justify-content:center;"><div class="availableBtn ">available</div> </div>
                    <div class="row4" style="display:flex;flex-flow:row-nowrap;padding:10px;gap:10px;align-items:center;justify-content:center;">
                        <div class="arrows">
                                <div class="uparrow">a-up</div>
                                <div class="downarrow">a-dwn</div>
                        </div>
                        <div class="startPrice">${myJourneys[i].offer} <span> CFA</span></div>
                        <div class="btnNegotiate">negotiate</div>
                    </div>
                  </div>
                  `;
                  let div = document.createElement('div');
                  div.id = i+"";
                  div.innerHTML = template;
                  document.getElementById("availableJourneysList").appendChild(div);
  
                  
                }
            }
          }
        };
        xmlhttpAvailable.open("GET","../../PHP/get_available_journey.php",true);
        xmlhttpAvailable.send();
        
          //  } else {
             
           // }
    
}

function publishPassengerJourney(event){
    event.preventDefault();
   let departure = document.getElementById("departure_field").value;
   let destination = document.getElementById("destination_field").value;
   let travel_date = document.getElementById("dateField").value;
   let travel_time = document.getElementById("timeField").value;
   let price = document.getElementById("priceField").value;
   let formData = new FormData();
   formData.append("departure",departure);
   formData.append("destination",destination);
   formData.append("date",travel_date);
   formData.append("time",travel_time);
   formData.append("price",price);

   var snackbarContainer = document.getElementById('result-snackbar');

   console.log("sending dep = "+departure+" destination = "+destination);
   var xmlhttp = new XMLHttpRequest();
   xmlhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            if(this.responseText.localeCompare("Successfully")> -1){
                var data = {
                    message: 'Journey Published Successfully.',
                    timeout: 10000,
                    actionHandler: null,
                    actionText: ''
                  };
                  snackbarContainer.MaterialSnackbar.showSnackbar(data);
                  document.getElementById("departure_field").value = "";
                  document.getElementById("destination_field").value= "";
                  document.getElementById("dateField").value = "";
                  document.getElementById("timeField").value="";
                  document.getElementById("priceField").value = "";



            }else{
                var data = {
                    message: 'Error publishing.',
                    timeout: 10000,
                    actionHandler: null,
                    actionText: ''
                  };
                  snackbarContainer.MaterialSnackbar.showSnackbar(data);
            }
       }
   };
   xmlhttp.open("POST","publish_journey.php",true);
   xmlhttp.send(formData);


}
showMyJourneys();
showAvailableJourneys();