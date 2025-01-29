var i = 0;
var intro = 'Here are suggestions to improve energy efficiency: \n'
var first = "• Consider using natural light during daylight hours.\n• Switch to energy-efficient LED bulbs if not already in use.\n• Ensure aircon temperature is set optimally (e.g., 24-25°C) to avoid excessive energy use.\n• Close windows and doors to reduce cooling load.\n• Unplug chargers and AVRs when not in use to avoid phantom loads.\n• Optimize fan settings for the room size and reduce uneccesarry use."
var second ="• Regularly clean aircon filters to maintain efficient airflow and cooling performance.\n• Use smart power strips to cut off power to idle devices automatically.\n• Insulate doors and windows to prevent heat exchange and reduce energy loss.\n• Schedule regular maintenance for appliances to ensure optimal performance.\n• Utilize task lighting instead of lighting the entire room when focused illumination is sufficient.";
var third = "• Program thermostats to adjust temperatures based on occupancy or time of day.\n• Use motion sensors for lights in less frequently used areas like hallways and bathrooms.\n• The temperature and humidity next week would be 31°C and 65%, be sure to reduce AC load .\n• Cover windows with blinds or curtains to block excess heat from sunlight.\n• Invest in energy-efficient appliances with high Energy Star ratings.";
var fourth = "• Seal gaps or cracks in walls, doors, and windows to prevent air leakage.\n• Utilize renewable energy sources, such as solar panels, for powering small devices.\n• Use ceiling fans to circulate air instead of solely relying on air conditioning.\n• Close the doors and set Air Conditioning timers to a limit of 1-2 hour.\n• Invest in solar panels to reduce electrical loads.";
// MAY SALA SA fourth fifth and sixth prompts, please fix
var fifth = "• Replace old or inefficient appliances with newer, energy-saving models.\n• Adjust refrigerator and freezer temperatures to recommended levels for efficiency.\n• Install weather stripping around doors and windows to improve insulation.\n• Use laptops instead of desktops for reduced energy consumption.\n• Take advantage of natural ventilation during cooler evenings instead of air conditioning.";
var sixth = "• Group electronic devices into zones and turn off power to unused zones.\n• Set computers to sleep or hibernate mode when idle for extended periods.\n• Install low-flow showerheads to reduce hot water usage.\n• Use a microwave or toaster oven for small meals instead of a conventional oven.\n• Plant trees or shrubs around your home to provide shade and reduce cooling needs.";

var speed = 25;

var txt = "";

var ran = Math.floor(Math.random() * 6) + 1;

switch (ran){
    case 1:
        txt = intro + first;
        break;
    case 2:
        txt = intro + second;
        break;
    case 3:
        txt = intro + third;
        break;
    case 5:
        txt = intro + fourth;
        break;
    case 5:
        txt = intro + fifth;
        break;
    case 6:
        txt = intro + sixth;
        break;
}

function typeWriter() {

    if (i < txt.length) {

        var initial = document.getElementById("suggestions").innerHTML;
        document.getElementById("suggestions").innerHTML = initial.slice(0, initial.length-1) + txt.charAt(i) + '|';
        i++;
        setTimeout(typeWriter, speed);
        if (i == txt.length) {
            var initial = document.getElementById("suggestions").innerHTML;
            document.getElementById("suggestions").innerHTML = initial.slice(0, initial.length-1);
        }
    }
}