<?php

$firstkwh = ""; //string
$secondkwh = "";
$thirdkwh = "";
$fourthkwh = "";
$fifthkwh = "";
$error = "";
$showBill = "";

//$_POST tarik data direct dari form
if (isset($_POST['calculate'])) {
    //.(titik atau dot) untuk gabungkan string dengan PHP dan HTML
    //echo (print output / paparkan data)
    //echo "<p> The input for the first kwh is" .  $_POST['first'] . "</p>";

    //virable declaration
    $firstkwh = $_POST['first'];
    $secondkwh = $_POST['second'];
    $thirdkwh = $_POST['third'];
    $fourthkwh = $_POST['fourth'];
    $fifthkwh = $_POST['fifth'];



    //first validation
    //will check if user did not enter any value for the first kwh, if yes, then the charge will be 0
    if ($firstkwh == "") {
        $firstkwh = 0;
    }
    if ($secondkwh == "") {
        $secondkwh = 0;
    }
    if ($thirdkwh == "") {
        $thirdkwh = 0;
    }
    if ($fourthkwh == "") {
        $fourthkwh = 0;
    }
    if ($fifthkwh == "") {
        $fifthkwh = 0;
    }


    if ($firstkwh < 0 || $secondkwh < 0 || $thirdkwh < 0 || $fourthkwh < 0 || $fifthkwh < 0) {
        $error = "Please enter a valid value (0 or more)";
    }

    //validaton3
    if ($firstkwh > 200) {
        $error = "Please enter a valid value (0 - 200) for the first kwh";
    }
    if ($secondkwh > 100) {
        $error = "Please enter a valid value (0 - 100) for the second kwh";
    }
    if ($thirdkwh > 300) {
        $error = "Please enter a valid value (0 - 300) for the third kwh";
    }
    if ($fourthkwh > 300) {
        $error = "Please enter a valid value (0 - 300) for the fourth kwh";
    }

    //validation4
    if ($firstkwh + $secondkwh + $thirdkwh + $fourthkwh + $fifthkwh == 0){
        $error = "Please enter a valid value (0 or more) for atleast on kwh";
    }
    

    //$charge1 = $_POST['first'] * 0.218;
    $charge1 = $firstkwh * 0.218;
    $charge2 = $secondkwh * 0.344;
    $charge3 = $thirdkwh * 0.516;
    $charge4 = $fourthkwh * 0.546;
    $charge5 = $fifthkwh * 0.571;

    //total kwh
    $totalKwh = $fifthkwh + $secondkwh + $thirdkwh + $fourthkwh + $fifthkwh;
    //total charge 
    $totalCharge = $charge1 + $charge2 + $charge3 + $charge4 + $charge5;


    if ($totalCharge < 3) {
        $totalCharge = 3;
    }

    if ($totalKwh > 600) {
        // ini cara lambat
        //% = 0.06
        $totalSst = $totalCharge * 0.06;
        $totalCharge = $totalCharge + $totalSst;

        //cara cepat nak kira, just darabkan terus dengan 1.06, akan terus dapat hasil
        $totalCharge = $totalCharge * 1.06;
    }


    $showBill = true;

    // $charge1 = $_POST['first'] * 0.218;

    
}
?>