<!DOCTYPE html>
<html>
<head>
    <title>Swapping Values</title>
</head>
<body>
    <h1>Swapping Values</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="value1">Enter value 1:</label>
        <input type="text" id="value1" name="value1">
        <br>
        <label for="value2">Enter value 2:</label>
        <input type="text" id="value2" name="value2">
        <br>
        <button type="submit">Swap Values</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $value1 = $_POST["value1"];
        $value2 = $_POST["value2"];

        function swapByValue($a, $b) {
            $temp = $a;
            $a = $b;
            $b = $temp;
            echo "Inside swapByValue function: a = $a, b = $b<br>";
        }

        function swapByReference(&$a, &$b) {
            $temp = $a;
            $a = $b;
            $b = $temp;
            echo "Inside swapByReference function: a = $a, b = $b<br>";
        }

        function swapWithDefaults($a, $b = 0) {
            $temp = $a;
            $a = $b;
            $b = $temp;
            echo "Inside swapWithDefaults function: a = $a, b = $b<br>";
        }

        echo "Before swapping: value1 = $value1, value2 = $value2<br>";

        swapByValue($value1, $value2);
        echo "After swapByValue: value1 = $value1, value2 = $value2<br>";

        swapByReference($value1, $value2);
        echo "After swapByReference: value1 = $value1, value2 = $value2<br>";

        swapWithDefaults($value1);
        echo "After swapWithDefaults: value1 = $value1, value2 = $value2<br>";
    }
    ?>
</body>
</html>
