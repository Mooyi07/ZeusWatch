$(document).ready(function(){
    let username = document.getElementById("username").innerHTML;
    username = (username == "Lanz Villanueva") ? "ADMIN002" : "ADMIN001";
    $(".switchJS").on("click", function(){
        var occupancy = 0;
        function occup(occupied){
            return (occupied == "Room Occupied") ? 1 : 0;
        }
        function roomId(txt){
            if (txt == "switch-0"){
                occupancy = document.getElementById("occupancy-0").innerHTML;
                return "R19";
            } else if (txt == "switch-1"){
                occupancy = document.getElementById("occupancy-1").innerHTML;
                return "ECL";
            } else {
                occupancy = document.getElementById("occupancy-2").innerHTML;
                return "MTB";
            }
        }
        const value = $(this).is(":checked");
        const id = $(this).attr("data-id");
        let state = 0;
        console.log(id);
        if (value){
            $("#"+id).html("ON").css({
                color: "green"
            });
            state = 1;
        } else {
            $("#"+id).html("OFF").css({
                color: "red"
            });
            state = 0;
        }
        $.ajax({
            url: "server/switch.php",
            type: "POST",
            data: {'state': state, 'room': roomId(id), 'occupancy': occup(occupancy), 'username': username},
            success: function(){
               
            }
        });
    })

})