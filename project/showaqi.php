<!DOCTYPE html>
<html>
<head>
    <title>Selected AQI Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: #4682B4;
            color: white;
        }
        .header h2 {
            margin: 0;
        }
        .logout-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
        .table-container {
            margin: 30px auto;
            width: fit-content;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            min-width: 300px;
        }
        th, td {
            border: 1px solid #888;
            padding: 10px 20px;
        }
        th {
            background-color: #4682B4;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>AQI for Selected Cities</h2>
        <a href="BOX_WT2_update.php" class="logout-btn">Logout</a>
    </div>

    <div class="table-container">
        <?php
        if (isset($_POST['Cities'])) {
            $conn = mysqli_connect('localhost', 'root', '', 'aqi');

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $cities = $_POST['Cities'];
            $in = implode("','", array_map('mysqli_real_escape_string', array_fill(0, count($cities), $conn), $cities));
            $query = "SELECT City, AQI FROM info WHERE City IN ('$in')";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                echo "<table><tr><th>City</th><th>AQI</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>{$row['City']}</td><td>{$row['AQI']}</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No AQI data found for the selected cities.</p>";
            }

            mysqli_close($conn);
        } else {
            echo "<p>No cities selected.</p>";
        }
        ?>
    </div>
</body>
</html>
