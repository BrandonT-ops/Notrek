function showPublishJourney(){
    console.log("clicked on show publish Journey");
    document.getElementById("publishJourneyForm").style.display = "block";
  
    document.getElementById("requestJourneyForm").style.display = "none";
    document.getElementById("availableJourneyList").style.display = "none";
    document.getElementById("myJourneysList").style.display = "none";
    document.getElementById("searchJourneysList").style.display = "none";
}
function publishJourney(){
    let isLogin = sessionStorage.getItem("isLogin");
    isLogin = "true";
    if(isLogin == "true"){
        let userId = "4"//sessionStorage.getItem("uid");
        let departure = document.getElementById("publishDeparture").value;
        let departtime = document.getElementById("departureTime").value;
        let departDate = document.getElementById("departureDate").value;
        let destination = document.getElementById("publishDestination").value;
        let price = document.getElementById("priceAccept").value;
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
           
          if (this.readyState == 4 && this.status == 200) { 
            console.log("received sth");
            console.log(this.responseText);
            let loginStatus = this.responseText;
            if(loginStatus == "false"){
                //show login error
                console.log("login failed");
            }else{
              //
              alert("publish succeeded");
               document.getElementById("publishDeparture").value="";
               document.getElementById("departureTime").value="";
              document.getElementById("departureDate").value="";
              document.getElementById("publishDestination").value="";
              document.getElementById("priceAccept").value="";
            }
          }
        };
        xmlhttp.open("GET","../php/publish_journey.php?departure="+departure+"&time="+departtime+"&date="+departDate+"&destination="+destination+"&price="+price+"&sender=passenger&id="+userId,true);
        xmlhttp.send();
    }
   
}