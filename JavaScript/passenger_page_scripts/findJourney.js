function findJourneys(){
    document.getElementById("requestJourneyForm").style.display = "block";
    document.getElementById("availableJourneyList").style.display = "none";
    document.getElementById("myJourneysList").style.display = "none";    
    document.getElementById("searchJourneysList").style.display = "none";
    document.getElementById("publishJourneyForm").style.display = "none";
}
function requestJourney(){
  console.log("request journey called");
  document.getElementById("searchJourneysList").innerHTML = "";
 // if (sessionStorage.getItem("isLogin")) {
  document.getElementById("requestJourneyForm").style.display = "none";
  document.getElementById("searchJourneysList").style.display = "block"; 
  let departure = document.getElementById("searchDeparture").value;
  let destination  = document.getElementById("searchDestination").value;
             
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
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
                            <div class="departure" style="color:#0074FF;">${departure}</div>
                    </div>
                    <div style="flex-grow:1;"></div>
                    <div class="rightBoxInfo">
                        <div class="destinationLabel">Destination</div>
                        <div class="destination" style="color:#0074FF;">${destination}</div>
                    </div>  
                </div>
                <div class="row3" style="display:flex;flex-flow:row-nowrap;padding:10px;gap:5px;align-items:center;justify-content:center;"><div class="availableBtn ">available</div> </div>
                <div class="row4" style="display:flex;flex-flow:row-nowrap;padding:10px;gap:10px;align-items:center;justify-content:center;">
                    <div class="arrows">
                            <div class="uparrow">a-up</div>
                            <div class="downarrow">a-dwn</div>
                    </div>
                    <div class="startPrice">${myJourneys[i].offer} CFA</div>
                    <div class="btnNegotiate">negotiate</div>
                </div>
              </div>
              `;
              let div = document.createElement('div');
              div.id = i+"";
              div.innerHTML = template;
              document.getElementById("searchJourneysList").appendChild(div);

              
            }
        }else{
          alert("nothing added yet");
        }
      }else{
        alert("an error occurred");
      }
    };
    xmlhttp.open("GET","../php/request_journey.php?departure="+departure+"&destination="+destination+"&sender=passenger",true);
    xmlhttp.send();
      //  } else {
         
       // }
}