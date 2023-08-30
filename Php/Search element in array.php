<!DOCTYPE html>
<html>
<head>
    <title>Search Value</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="searchValue">Enter the value to search for:</label>
        <input type="text" id="searchValue" name="searchValue">
        <button type="submit">Search</button>
    </form>

    <?php
    
    $numbers = array(10, 20, 30, 40, 50);

    
    function searchArray($array, $value) {
        foreach ($array as $element) {
            if ($element == $value) {
                return $element;
            }
        }
        return null; 
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $searchValue = $_POST["searchValue"];

        
        $result = searchArray($numbers, $searchValue);

        if ($result !== null) {
            echo "Element $searchValue found in the array.";
        } else {
            echo "Element $searchValue not found in the array.";
        }
    }
    ?>
</body>
</html>
