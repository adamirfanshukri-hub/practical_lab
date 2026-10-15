<?php

include 'process.php';
// if (isset($_POST['calculate'])) {
//     echo "The input for the first kwh is " . $_POST['first'] . "<br>";
// }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House Electricity Bill</title>
</head>

<body>

    <h1> CALCULATE ELECTRICITY BILL </h1>

    <table border="50" style=" margin-bottom: 10px;">
        <tr>
            <th>BLOCK TARIFF (per month) </th>
            <th>UNIT</th>
            <th>RATE</th>
        </tr>

        <tr>
            <td>For the first 200 kWh (1-200 kWh) per month</td>
            <td>sen/kWh</td>
            <td>0.218</td>
        </tr>

        <tr>
            <td>For the next 100 kWh (201 – 300 kWh) per month</td>
            <td>sen/kWh</td>
            <td>0.344</td>
        </tr>

        <tr>
            <td>For the next 300 kWh (301 – 600 kWh) per month</td>
            <td>sen/kWh</td>
            <td>0.516</td>
        </tr>

        <tr>
            <td>For the next 300 kWh (601 – 900 kWh) per month</td>
            <td>sen/kWh</td>
            <td>0.546</td>
        </tr>

        <tr>
            <td>For the next kWh (901 kWh onwards) per month</td>
            <td>sen/kWh</td>
            <td>0.571</td>
        </tr>

        <tr>
            <td colspan="3">The minimum monthly chafe is RM300</td>
        </tr>

    </table><br>

    <?php
    if ($error != "") {
        echo "<p style='color:red;'>" . $error . "</p>";
    }
    ?>

    <form method="post">

        <label>Enter your first 200 kWh (1-200 kWh) per month :</label>
        <input type="number" name="first" value="" placeholder="200kwh"><br>

        <label>Enter next 100 kWh (201 – 300 kWh) per month :</label>
        <input type="number" name="second" value="" placeholder="100kwh"><br>

        <label>Enter next 300 kWh (301 – 600 kWh) per month :</label>
        <input type="number" name="third" value="" placeholder="300kwh"><br>

        <label>Enter next 300 kWh (601 - 900 kWh) per month :</label>
        <input type="number" name="fourth" value="" placeholder="180kwh"><br>

        <label>Enter next 300 kWh (901 - onwards kWh) per month :</label>
        <input type="number" name="fifth" value="" placeholder="0kwh"><br>

        <!-- <label>Estimated Bill :</label> -->
        <!-- <input type="number" name="total" placeholder="TOTAL"><br>  -->

        <input type="submit" name="calculate" value="Calculate">
        <input type="submit" name="reset" value="Reset">


    </form>

    <style>
        input {
            width: 200px;

        }
    </style>

</body>



<?php

if ($showBill) {

    echo "<h2>Electricity Bill</h2>";

    echo "<br> Total charge for the first kWh is " . $charge1 . "<br>";
    echo "<br> Total charge for the second kWh is " . $charge2 . "<br>";
    echo "<br> Total charge for the third kWh is " . $charge3 . "<br>";
    echo "<br> Total charge for the fourth kWh is " . $charge4 . "<br>";
    echo "<br> Total charge for the fifth kWh is " . $charge5 . "<br>";

    echo "<p>Total kwh used: " . $totalKwh . "</p>";
    echo "<p>Total charge used: RM " . number_format($totalCharge, 2) . "</p";

}
?>

</html>