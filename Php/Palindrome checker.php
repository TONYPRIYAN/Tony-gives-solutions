<!DOCTYPE html>
<html>
<head>
    <title>Palindrome Checker</title>
</head>
<body>
    <h1>Palindrome Checker</h1>
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
            $reversedNumber = 0;

            while ($number > 0) {
                $digit = $number % 10;
                $reversedNumber = $reversedNumber * 10 + $digit;
                $number = (int)($number / 10);
            }

            if ($originalNumber === $reversedNumber) {
                echo "<p>$originalNumber is a palindrome.</p>";
            } else {
                echo "<p>$originalNumber is not a palindrome.</p>";
            }
        } else {
            echo "<p>Invalid input. Please enter a valid number.</p>";
        }
    }
    ?>
</body>
</html>
