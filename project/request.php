<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Cities</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            background: #fff;
            max-width: 400px;
            margin: 40px auto;
            padding: 24px 20px 20px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        }
        h3 {
            margin-top: 0;
            text-align: center;
            color: #333;
        }
        #City-checkboxes {
            margin: 18px 0;
            max-height: 250px;
            overflow-y: auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #222;
        }
        input[type="submit"] {
            width: 100%;
            background: #1976d2;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 0;
            font-size: 1em;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background: #1565c0;
        }
        .no-cities {
            color: #b71c1c;
            text-align: center;
        }
    </style>
    <script>
        function limitCheckboxes(clicked) {
            const checkboxes = document.querySelectorAll('input[name="Cities[]"]');
            const checkedCount = Array.from(checkboxes).filter(cb => cb.checked).length;
            if (checkedCount > 10) {
                clicked.checked = false;
                alert("You can select up to 10 cities only.");
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'aqi');

        if (!$conn) {
            die("<div class='no-cities'>Connection failed: " . mysqli_connect_error() . "</div>");
        }

        $sql = "SELECT City FROM info";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("<div class='no-cities'>Query failed: " . mysqli_error($conn) . "</div>");
        }

        if (mysqli_num_rows($result) > 0) {
            echo "<h3>Select up to 10 Cities</h3>";
            echo "<form method='POST' action='showaqi.php'>";
            echo "<div id='City-checkboxes'>";

            while ($row = mysqli_fetch_assoc($result)) {
                $city = htmlspecialchars($row['City']);
                echo "<label><input type='checkbox' name='Cities[]' value='$city' onclick='limitCheckboxes(this)'> $city</label>";
            }

            echo "</div>";
            echo "<input type='submit' value='Submit'>";
            echo "</form>";
        } else {
            echo "<div class='no-cities'>No cities found in the database.</div>";
        }

        mysqli_close($conn);
        ?>
    </div>
</body>
</html> 
