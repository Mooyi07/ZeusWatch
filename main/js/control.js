$(document).ready(function(){
    let username = document.getElementById("username").innerHTML;
    let occupancy = "Not Occupied";
    username = (username == "Lanz Villanueva") ? "ADMIN002" : "ADMIN001";
    function roomId(txt){
        if (txt == "switch-0"){
            this.occupancy = document.getElementById("occupancy-0").innerHTML;
            return "R19";
        } else if (txt == "switch-1"){
            this.occupancy = document.getElementById("occupancy-1").innerHTML;
            return "ECL";
        } else {
            this.occupancy = document.getElementById("occupancy-2").innerHTML;
            return "MTB";
        }
    }
    $(".switchJS").on("click", function(){
        function occup(occupied){
            return (occupied == "Room Occupied") ? 1 : 0;
        }
        const value = $(this).is(":checked");
        const id = $(this).attr("data-id");
        let state = 0;
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