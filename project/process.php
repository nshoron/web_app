<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['confirm'])) {
        $conn = mysqli_connect("localhost","root","","user_info");
        $fullname = $_SESSION['fullname'];
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
        $dob = $_SESSION['dob'];
        $city = $_SESSION['city'];
        $gender = $_SESSION['gender'];
        $zipcode = $_SESSION['zipcode'];
        $terms = $_SESSION['terms'];

        $sql = "INSERT INTO user_info (fullname, email, password, dob, city, gender, zipcode, terms) 
                VALUES ('$fullname', '$email', '$password', '$dob', '$city', '$gender', '$zipcode', '$terms')";

       if (mysqli_query($conn, $sql)) {
    header("refresh:2; url=BOX_WT2_update.html");
    echo "<h3 style='color: green;'>Registration Successful!</h3>";
    exit();
     }  
     else 
     {
            echo "<h3 style='color: red;'>Error: " . mysqli_error($conn) . "</h3>";
        }

        mysqli_close($conn);
        session_destroy();
      
        exit();
    }

    if (isset($_POST['cancel'])) {
        session_destroy();
        header("Location: BOX_WT2_update.html"); 
        exit();
    }

   
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];
    $dob = $_POST["dob"];
    $city = $_POST["city"];
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : 'Not specified';
    $zipcode = $_POST["zipcode"];
    $terms = isset($_POST["terms"]) ? "Agreed" : "Not Agreed";

    $_SESSION['fullname'] = $fullname;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['dob'] = $dob;
    $_SESSION['city'] = $city;
    $_SESSION['gender'] = $gender;
    $_SESSION['zipcode'] = $zipcode;
    $_SESSION['terms'] = $terms;

    echo "<div style='margin-top: 20px; padding: 15px; border: 1px solid #000; background-color:rgb(68, 156, 68);'>";
    echo "<h3>Submitted Registration Details</h3>";
    echo "<p><strong>Full Name:</strong> $fullname</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Date of Birth:</strong> $dob</p>";
    echo "<p><strong>City:</strong> $city</p>";
    echo "<p><strong>Gender:</strong> $gender</p>";
    echo "<p><strong>ZIP Code:</strong> $zipcode</p>";
    echo "<p><strong>Terms:</strong> $terms</p>";
    echo "</div>";
}

?>

<form method="post" style="margin-top: 20px;">
    <button type="submit" name="confirm">Confirm</button>
    <button type="submit" name="cancel">Cancel</button>
</form>
