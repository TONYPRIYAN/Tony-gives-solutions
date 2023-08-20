<!DOCTYPE html>
<html>
<head>
    <title>Arithmetic Calculator</title>
</head>
<body>
    <h1>Arithmetic Calculator</h1>
    <form method="post" action="">
        <label for="num1">Enter first number:</label>
        <input type="text" id="num1" name="num1" required><br>
        
        <label for="operator">Select an operator:</label>
        <select id="operator" name="operator">
            <option value="+">Addition (+)</option>
            <option value="-">Subtraction (-)</option>
            <option value="*">Multiplication (*)</option>
            <option value="/">Division (/)</option>
        </select><br>
        
        <label for="num2">Enter second number:</label>
        <input type="text" id="num2" name="num2" required><br>
        
        <button type="submit">Calculate</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $operator = $_POST["operator"];
        $result = 0;

        if (is_numeric($num1) && is_numeric($num2)) {
            switch ($operator) {
                case "+":
                    $result = $num1 + $num2;
                    break;
                case "-":
                    $result = $num1 - $num2;
                    break;
                case "*":
                    $result = $num1 * $num2;
                    break;
                case "/":
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        echo "<p>Cannot divide by zero.</p>";
                        break;
                    }
                    break;
                default:
                    echo "<p>Invalid operator selected.</p>";
                    break;
            }

            echo "<p>Result: $num1 $operator $num2 = $result</p>";
        } else {
            echo "<p>Invalid input. Please enter valid numbers.</p>";
        }
    }
    ?>
</body>
</html>
