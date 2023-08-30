<!DOCTYPE html>
<html>
<head>
    <title>Armstrong Number Checker</title>
</head>
<body>
    <h1>Armstrong Number Checker</h1>
    <form method="post" action="">
        <label for="number">Enter a number:</label>
        <input type="text" id="number" name="number" required>
        <button type="submit">Check</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $userInput = $_POST["number"];

        if (is_numeric($userInput)) {
            $number = (int)$userInput;
            $originalNumber = $number;
            $sum = 0;

            do {
                $digit = $number % 10;
                $sum += $digit ** 3;
                $number = (int)($number / 10);
            } while ($number > 0);

            if ($originalNumber === $sum) {
                echo "<p>$originalNumber is an Armstrong number.</p>";
            } else {
                echo "<p>$originalNumber is not an Armstrong number.</p>";
            }
        } else {
            echo "<p>Invalid input. Please enter a valid number.</p>";
        }
    }
    ?>
</body>
</html>
