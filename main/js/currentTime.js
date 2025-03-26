function updateElement(id, content) {
    let element = document.getElementById(id);
    if (element) element.innerHTML = content;
}

function updateProgressBar(id, value) {
    let element = document.getElementById(id);
    if (element) element.style.width = `${value}%`;
}

function timeDisplay() {
    const date = new Date();
    let hours = date.getHours();
    let notation = hours >= 12 ? "PM" : "AM";
    hours = hours % 12 || 12;

    let status = "";
    let progressBar= "0";

    if (date.getDay() < 6){
        // Progress Bar Algorithm
        let hours = date.getHours();
        let minutes = date.getMinutes();

        if (hours > 8 && minutes < 19){
            progressBar = 60 * (hours - 8);
            progressBar = progressBar + minutes;
        }

        // Class Algorithm
        if (hours === 8) {
            status = minutes > 14 ? "Classes in Session" : "Classes has not Started";
            progressBar = minutes > 14 ? minutes - 15 : 0;
        } else if (hours === 19) {
            status = minutes > 29 ? "Classes has Ended" : "Classes in Session";
            progressBar = minutes > 29 ? 660 : progressBar;
        } else if (hours >= 9 && hours < 12 || hours >= 13 && hours < 19) {
            status = "Classes in Session";
        } else if (hours === 12) {
            status = "Lunch Break";
        } else if (hours > 19) {
            status = "Classes has Ended";
            progressBar = 660;
        } else {
            status = "Class has not Started";
        }

        progressBar = parseInt((progressBar / 660) * 100);


    } else {
        status = "No Class / Holiday";
    }
    
    let timeString = `${hours}:${date.getMinutes().toString().padStart(2, "0")}:${date.getSeconds().toString().padStart(2, "0")} ${notation}`;

    if (document.getElementById("timeSet") != null){
        updateElement("timeSet", timeString);
        updateElement("classStatus", status);
        updateElement("progressText", `${progressBar}%`);
        updateProgressBar("progressBar", progressBar);
    }
    if (document.getElementById("timeSetSi") != null){
        updateElement("timeSetSi", timeString);
        updateElement("progressTextSi", `${progressBar}%`);
        updateProgressBar("progressBarSi", progressBar);
    }
}

timeDisplay();

setInterval(timeDisplay, 1000); 

