<?php
function calculateCharge($kwh, $rate, $fixed = 0) {
    return round($kwh * $rate, 2) + $fixed;
}

function npc($kwh) {
    return calculateCharge($kwh, 0.2748) + calculateCharge($kwh, 0.4140) + 
           calculateCharge($kwh, 0.3460) + 5.00 + calculateCharge($kwh, 0.1518);
}

function src($kwh) {
    return calculateCharge($kwh, 7.3141) + calculateCharge($kwh, 1.3272) + 
           calculateCharge($kwh, 0.9543);
}

function lrc($kwh) {
    return calculateCharge($kwh, 0.0006, 0.05);
}

function vat($kwh) {
    return calculateCharge($kwh, 0.5129) + 
           calculateCharge(calculateCharge($kwh, 1.3272), 0.1200) + 
           calculateCharge($kwh, 0.0765) + 
           calculateCharge(npc($kwh) + lrc($kwh), 0.1200, 0.01);
}

function gov($kwh) {
    return calculateCharge($kwh, 0.0428) + calculateCharge($kwh, 0.1805) + 
           calculateCharge($kwh, 0.0017) + calculateCharge($kwh, 0.0838);
}

function bill($kwh) {
    return npc($kwh) + src($kwh) + lrc($kwh) + gov($kwh) + vat($kwh);
}
?>
