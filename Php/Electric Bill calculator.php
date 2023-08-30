<!DOCTYPE html>
<html>
<head>
    <title>Electricity Bill Calculator</title>
</head>
<body>
    <h2>Electricity Bill Calculator</h2>
    <form method="post" action="">
        Enter the number of units consumed: <input type="text" name="units"><br><br>
        <input type="submit" name="submit" value="Calculate">
    </form>

    <?php
    if(isset($_POST['submit'])){
        $units = intval($_POST['units']);
        $totalAmount = 0;

        if($units <= 50){
            $totalAmount = $units * 3.50;
        }
        elseif($units <= 150){
            $totalAmount = 50 * 3.50 + ($units - 50) * 4.80;
        }
        elseif($units <= 250){
            $totalAmount = 50 * 3.50 + 100 * 4.80 + ($units - 150) * 5.80;
        }
        else{
            $totalAmount = 50 * 3.50 + 100 * 4.80 + 100 * 5.80 + ($units - 250) * 6.50;
        }

        echo "<br><br>Your electricity bill for $units units is Rs. " . number_format($totalAmount, 2);
    }
    ?>
</body>
</html>
