<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];
    $dob = $_POST["dob"];
    $city = $_POST["city"];
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : 'Not specified';
    $zipcode = $_POST["zipcode"];
    $terms = isset($_POST["terms"]) ? "Agreed" : "Not Agreed";

    echo "<div style='margin-top: 20px; padding: 15px; border: 1px solid #000; background-color:rgb(68, 156, 68);'>";
    echo "<h3>Submitted Registration Details</h3>";
    echo "<p><strong>Full Name:</strong> $fullname</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Date of Birth:</strong> $dob</p>";
    echo "<p><strong>City:</strong> $city</p>";
    echo "<p><strong>Gender:</strong> $gender</p>";
    echo "<p><strong>ZIP Code:</strong> $zipcode</p>";
    echo "</div>";
}
?>
