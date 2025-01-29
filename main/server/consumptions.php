<?php 

    function npc($kwh) {
        $distribution_Charge = round($kwh * 0.2748, 2);
        $suppply_Charge = round($kwh * 0.4140, 2);
        $metering_Charge = round($kwh * 0.3460, 2);
        $retail_metering_charge = 5.00;
        $rfsc = round($kwh * 0.1518, 2);
        $npc_SubTotal = $distribution_Charge + $suppply_Charge + $metering_Charge + $retail_metering_charge + $rfsc;
        return $npc_SubTotal;
    }
    function src($kwh) {
        $generation_Charge = round($kwh * 7.3141, 2);
        $transmission_Charge = round($kwh * 1.3272, 2);
        $system_loss_charge = round($kwh * 0.9543, 2);
        $src_SubTotal = $generation_Charge + $transmission_Charge + $system_loss_charge;
        return $src_SubTotal;
    }
    function lrc($kwh){
        return round($kwh * 0.0006, 2) + 0.05;
    }
    function vat($kwh){
        $vat_gen = round($kwh * 0.5129, 2);
        $vat_trans = round(round($kwh * 1.3272, 2) * 0.1200, 2);
        $vat_system_loss = round($kwh * 0.0765, 2);
        $vat_other_charges = round(((npc($kwh) + lrc($kwh)) * 0.1200)+0.01, 2);
        $vat_amount = $vat_gen + $vat_trans + $vat_other_charges + $vat_system_loss;
        return $vat_amount;
    }
    function gov($kwh){
        $npc_debts = round($kwh * 0.0428, 2); 
        $missionary_electrification = round($kwh * 0.1805, 2); 
        $environmental_charge = round($kwh * 0.0017, 2); 
        $fit_allowance = round($kwh * 0.0838, 2); 
        $gov_SubTotal = $npc_debts + $missionary_electrification + $environmental_charge + $fit_allowance;

        return $gov_SubTotal;
    }
    function bill($kwh){
        $total = npc($kwh) + src($kwh) + lrc($kwh) + gov($kwh) + vat($kwh);
        return $total;
    }
?>