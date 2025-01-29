
function timeDisplay() {
    const date = new Date();
    let hours = date.getHours();
    let notation = "";
    if (hours > 12){
        hours = hours - 12;
        notation = "PM";
    } else if (hours === 12){
        notation = "PM";
    } 
    else if (hours === 0){
        hours = 12;
        notation = "AM";
    } 
    else {
        notation = "AM";
    }

    let status = "";
    let progressBar= "0";
    if (date.getDay() < 6){
        // Progress Bar Algorithm
        if (date.getHours() > 8 && date.getHours() < 17){
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
        else if (date.getHours() == 16){
            status = "Classes in Session";
            if (date.getMinutes() > 29){
                status = "Classes has Ended";
                progressBar = 495;
            }
        }
        else if (date.getHours() > 8 && date.getHours() < 12){
            status = "Classes in Session";
        }
        else if (date.getHours() > 13 && date.getHours() < 16){
            status = "Classes in Session";
        }
        else if (date.getHours() > 11 && date.getHours() < 13){
            status = "Lunch Break";
        }
        else if (date.getHours() > 16){
            status = "Classes has Ended";
            progressBar = 495;
        }
        else {
            status = "Class has not Started"
        }
        progressBar = (progressBar / 495) * 100;
        progressBar = parseInt(progressBar);

    } else {
        status = "No Class / Holiday";
    }
    document.getElementById("progressText").innerHTML = progressBar + "%";
    document.getElementById("progressBar").style.width = progressBar + "%";
    if (document.getElementById("timeSet") != null){
        document.getElementById("timeSet").innerHTML = hours + ":" + date.getMinutes().toString().padStart(2, "0") + ":" + date.getSeconds().toString().padStart(2, "0") + " " + notation;
        document.getElementById("classStatus").innerHTML = status;
    }
}

timeDisplay();

setInterval(timeDisplay, 1000); 

