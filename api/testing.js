var room = "ECL";
var humidity = 0;
var temp = 0;
var occupancy = 0;
var current = 0;
function testing(room, humidity, temp, occupancy, current) {
    $.ajax({
      url: 'recieveData.php',
      dataType: 'json',
      method: 'GET',
      success: function(nodeMcu) {
        document.getElementById("room").innerHTML = "ROOM: " + nodeMcu.room;
        document.getElementById("hum").innerHTML = "HUMIDITY: " + nodeMcu.humidity + "%";
        document.getElementById("temp").innerHTML = "TEMPERATURE: " + nodeMcu.temp + " °C";
        document.getElementById("pir").innerHTML = "OCCUPANCY: " + nodeMcu.occupancy;
        document.getElementById("curr").innerHTML = "CURRENT: " + nodeMcu.current + " kwh";
        console.log("ENTRY");
      }
    });
}

testing();
setInterval(testing, 1000); 