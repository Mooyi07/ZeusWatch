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
        if (date.getHours() > 8 && date.getHours() < 19){
            progressBar = 60 * (date.getHours() - 8);
            progressBar = progressBar + date.getMinutes();
        }

        // Class Algorithm
        if (date.getHours() == 8){
            status = "Classes has not Started";
            if (date.getMinutes() > 14){
                status = "Classes in Session";
                progressBar = (date.getMinutes() - 15);
            }
        }
        else if (date.getHours() == 19){
            status = "Classes in Session";
            if (date.getMinutes() > 29){
                status = "Classes has Ended";
                progressBar = 660;
            }
        }
        else if (date.getHours() > 8 && date.getHours() < 12){
            status = "Classes in Session";
        }
        else if (date.getHours() > 12 && date.getHours() < 19){
            status = "Classes in Session";
        }
        else if (date.getHours() > 11 && date.getHours() < 13){
            status = "Lunch Break";
        }
        else if (date.getHours() > 19){
            status = "Classes has Ended";
            progressBar = 660;
        }
        else {
            status = "Class has not Started"
        }
        progressBar = (progressBar / 660) * 100;
        progressBar = parseInt(progressBar);

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

