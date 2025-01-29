$(document).ready(function(){
    function temp(){
        let r19Humid = document.getElementById("r19Humidity");
        let r19Temper = document.getElementById("r19Temperature");
        let mtbHumid = document.getElementById("mtbHumidity");
        let mtbTemper = document.getElementById("mtbTemperature");
        let eclHumid = document.getElementById("eclHumidity");
        let eclTemper = document.getElementById("eclTemperature");
        $.ajax({
            url: "server/temp.php",
            dataType: 'json',
            method: "POST",
            success: function(tempHum){
                r19Humid.innerHTML = tempHum.r19Hum + "%";
                r19Temper.innerHTML = " " + tempHum.r19Temp + "&degC";
                mtbHumid.innerHTML = tempHum.mtbHum + "%";
                mtbTemper.innerHTML = " " + tempHum.mtbTemp + "&degC";
                eclHumid.innerHTML = tempHum.eclHum + "%";
                eclTemper.innerHTML = " " + tempHum.eclTemp + "&degC";
            }
        });
    }
    setTimeout(temp(), 500);
})