const intro = "Here are suggestions to improve energy efficiency:\n";
const prompts = [
    "• Consider using natural light during daylight hours.\n• Switch to energy-efficient LED bulbs if not already in use.\n• Ensure aircon temperature is set optimally (e.g., 24-25°C) to avoid excessive energy use.\n• Close windows and doors to reduce cooling load.\n• Unplug chargers and AVRs when not in use to avoid phantom loads.\n• Optimize fan settings for the room size and reduce unnecessary use.",
    "• Regularly clean aircon filters to maintain efficient airflow and cooling performance.\n• Use smart power strips to cut off power to idle devices automatically.\n• Insulate doors and windows to prevent heat exchange and reduce energy loss.\n• Schedule regular maintenance for appliances to ensure optimal performance.\n• Utilize task lighting instead of lighting the entire room when focused illumination is sufficient.",
    "• Program thermostats to adjust temperatures based on occupancy or time of day.\n• Use motion sensors for lights in less frequently used areas like hallways and bathrooms.\n• The temperature and humidity next week would be 31°C and 65%, be sure to reduce Air Conditioning load.\n• Cover windows with blinds or curtains to block excess heat from sunlight.\n• Invest in energy-efficient appliances with high Energy Star ratings.",
    "• Seal gaps or cracks in walls, doors, and windows to prevent air leakage.\n• Utilize renewable energy sources, such as solar panels, for powering small devices.\n• Use ceiling fans to circulate air instead of solely relying on air conditioning.\n• Close the doors and set Air Conditioning timers to a limit of 1-2 hours.\n• Invest in solar panels to reduce electrical loads.",
    "• Replace old or inefficient appliances with newer, energy-saving models.\n• Adjust Air Condition temperatures to recommended levels for efficiency.\n• Install weather stripping around doors and windows to improve insulation.\n• Use laptops instead of desktops for reduced energy consumption.\n• Take advantage of natural ventilation during cooler afternoons instead of air conditioning."
];

const txt = intro + prompts[Math.floor(Math.random() * prompts.length)];
const speed = 25;

function typeWriter(i = 0) {
    const suggestions = document.getElementById("suggestions");

    if (i < txt.length) {
        suggestions.innerHTML = txt.slice(0, i + 1) + "|";
        setTimeout(() => typeWriter(i + 1), speed);
    } else {
        suggestions.innerHTML = txt; // Remove the cursor at the end
    }
}
