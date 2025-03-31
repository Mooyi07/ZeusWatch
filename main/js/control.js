$(document).ready(function(){
    let username = $("#username").text().trim();
    let occupancy = "Not Occupied";
    username = (username === "Lanz Villanueva") ? "ADMIN002" : "ADMIN001";

    function roomId(txt){
        let occupancyText = "Not Occupied"; 
        let room = "";

        switch (txt) {
            case "switch-0":
                occupancyText = $("#occupancy-0").text().trim();
                room = "R19";
                break;
            case "switch-1":
                occupancyText = $("#occupancy-1").text().trim();
                room = "ECL";
                break;
            case "switch-2":
                occupancyText = $("#occupancy-2").text().trim();
                room = "MTB";
                break;
        }
        return { room, occupancyText };
    }

    $(".switchJS").on("click", function(){
        function occup(occupied){
            return (occupied === "Room Occupied") ? 1 : 0;
        }

        const value = $(this).is(":checked");
        const id = $(this).attr("data-id");

        let state = value ? 1 : 0;
        let adminStatus = value ? "ADMIN" : "AUTOMATIC";

        // Get correct room and occupancy details
        let { room, occupancyText } = roomId(id);
        
        // Update UI
        $("#" + id).html(value ? "ON" : "OFF").css({
            color: value ? "green" : "red"
        });

        // AJAX Request
        $.ajax({
            url: "server/switch.php",
            type: "POST",
            data: {
                'state': state,
                'room': room,
                'occupancy': occup(occupancyText),
                'username': username,
                'adminStatus': adminStatus
            },
            success: function(response){
                console.log("Server Response: ", response);
            },
            error: function(xhr, status, error){
                console.error("Error: ", error);
            }
        });
    });
});
