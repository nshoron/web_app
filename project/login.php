<?php
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $conn = mysqli_connect('localhost', 'root', '', 'user_info');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM user_info WHERE email = '$email' AND password = '$pass'";
    $result = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $pass;

        echo "Login Successful";
        header("refresh: 2; url=request.php");
        exit();
    } else {
        echo "Login Failed";
        header("refresh: 2; url=BOX_WT2_update.html");
        exit();
    }
} else {
    echo "Fill the username and password.<br>";
    header("refresh: 2; url=BOX_WT2_update.html");
    exit();
}
?>
