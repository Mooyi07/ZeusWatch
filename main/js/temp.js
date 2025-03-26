const elements = {
    r19Humidity: document.getElementById("r19Humidity"),
    r19Temperature: document.getElementById("r19Temperature"),
    mtbHumidity: document.getElementById("mtbHumidity"),
    mtbTemperature: document.getElementById("mtbTemperature"),
    eclHumidity: document.getElementById("eclHumidity"),
    eclTemperature: document.getElementById("eclTemperature")
};

function updateTemperature() {
    $.post("server/temp.php", function (data) {
        Object.keys(elements).forEach(key => {
            elements[key].innerHTML = data[key] + (key.includes("Temperature") ? "&degC" : "%");
        });
    }, "json");
}

updateTemperature();
setInterval(updateTemperature, 1000);
