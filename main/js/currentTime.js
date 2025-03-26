function timeDisplay() {
    const date = new Date();
    let hours = date.getHours();
    let minutes = date.getMinutes().toString().padStart(2, "0");
    let seconds = date.getSeconds().toString().padStart(2, "0");
    let notation = hours >= 12 ? "PM" : "AM";
    hours = hours % 12 || 12;

    let progressBar = 0, status = "No Class / Holiday";
    if (date.getDay() < 6) {
        let currentMinutes = date.getHours() * 60 + date.getMinutes();
        let startMinutes = 8 * 60, endMinutes = 19 * 60;

        if (currentMinutes < startMinutes) {
            status = "Classes have not Started";
        } else if (currentMinutes >= endMinutes + 30) {
            status = "Classes have Ended";
            progressBar = 100;
        } else if (currentMinutes >= 12 * 60 && currentMinutes < 13 * 60) {
            status = "Lunch Break";
        } else {
            status = "Classes in Session";
            progressBar = ((currentMinutes - startMinutes) / (endMinutes - startMinutes)) * 100;
        }
        progressBar = Math.min(100, Math.max(0, Math.floor(progressBar)));
    }

    let timeString = `${hours}:${minutes}:${seconds} ${notation}`;
    updateElement("timeSet", timeString);
    updateElement("classStatus", status);
    updateElement("progressText", `${progressBar}%`);
    updateProgressBar("progressBar", progressBar);
    updateElement("timeSetSi", timeString);
    updateElement("progressTextSi", `${progressBar}%`);
    updateProgressBar("progressBarSi", progressBar);
}

function updateElement(id, content) {
    let element = document.getElementById(id);
    if (element) element.innerHTML = content;
}

function updateProgressBar(id, value) {
    let element = document.getElementById(id);
    if (element) element.style.width = `${value}%`;
}

timeDisplay();
setInterval(timeDisplay, 1000);
