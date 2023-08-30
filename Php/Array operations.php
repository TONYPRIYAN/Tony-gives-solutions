<!DOCTYPE html>
<html>
<head>
    <title>Associative Array Operations</title>
</head>
<body>
    <h1>Associative Array Operations</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="array1">Enter values for Array 1 (comma-separated):</label>
        <input type="text" id="array1" name="array1">
        <br>
        <label for="array2">Enter values for Array 2 (comma-separated):</label>
        <input type="text" id="array2" name="array2">
        <br>
        <label for="operation">Select operation:</label>
        <select id="operation" name="operation">
            <option value="a">Sort the array by values</option>
            <option value="b">Sort the values in descending order</option>
            <option value="c">Find the intersection of two arrays</option>
            <option value="d">Find the union of two arrays</option>
            <option value="e">Find set difference of two arrays</option>
        </select>
        <br>
        <button type="submit">Perform Operation</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $array1Input = $_POST["array1"];
        $array2Input = $_POST["array2"];
        $operation = $_POST["operation"];

        $array1 = explode(",", $array1Input);
        $array2 = explode(",", $array2Input);

        function sortByValues($array) {
            asort($array);
            return $array;
        }

        function sortDescending($array) {
            arsort($array);
            return $array;
        }

        function findIntersection($array1, $array2) {
            return array_intersect($array1, $array2);
        }

        function findUnion($array1, $array2) {
            return array_unique(array_merge($array1, $array2));
        }

        function findDifference($array1, $array2) {
            return array_diff($array1, $array2);
        }

        switch ($operation) {
            case 'a':
                $resultArray = sortByValues($array1);
                break;
            case 'b':
                $resultArray = sortDescending($array1);
                break;
            case 'c':
                $resultArray = findIntersection($array1, $array2);
                break;
            case 'd':
                $resultArray = findUnion($array1, $array2);
                break;
            case 'e':
                $resultArray = findDifference($array1, $array2);
                break;
            default:
                echo "Invalid operation.\n";
                exit;
        }

        echo "<h2>Result</h2>";
        echo "<pre>";
        print_r($resultArray);
        echo "</pre>";
    }
    ?>
</body>
</html>
