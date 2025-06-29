<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Air Quality Index</title>
  <link rel="stylesheet" href="table.css" />
  <style>
    body {
      margin: 0;
      padding: 0;
      text-align: center;
      font-family: Arial, sans-serif;
      background-color: #ffffff;
    }

    .logo {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: fill;
      margin: 20px auto 10px auto;
      display: flex;
      border: 2px solid #ffffff;
      background: #ffffff;
      line-height: 100px;
      font-weight: bold;
      
    }

    .title-box {
      background-color: #ece2e2;
      color: #e87979;
      padding: 15px 0;
      font-size: 1.5rem;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .container {
      display: flex;
      justify-content: center;
      gap: 0px;
    }

    .column {
      display: flex;
      flex-direction: column;
      width: 50%;
    }

    .box1, .box2, .box3, .box4 {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      border: 3px solid #000;
      box-sizing: border-box;
      flex-direction: column;
      overflow-y: auto;
    }

    .box1 
    {
       background-color: rgb(247, 239, 239);
       height:380px;
       width: 100%;
    }
    .box2
     {
      background-color: rgb(237, 239, 198);
    border: 2px solid #000;
    box-sizing: border-box;
    height: 450px;
    display: flex;
    padding: 10px;
     }
    .box3
     { 
      background-color: rgb(82, 190, 177);
      height:320px;
      width: 100%;
    
    }
    .box4 
    {
       background-color: rgba(222, 230, 220, 0.871);
       height:250px;
       width: 100%;
    }

    .form-wrapper {
    background: #d7ebe6;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 0 12px rgba(0,0,0,0.1);
    text-align: left;
    width: 50%;
    height: 100%;
    box-sizing: border-box;
    overflow-y: auto;
    }
     .form-wrapper2 {
    background: #10a37e;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 0 12px rgba(0,0,0,0.1);
    text-align: left;
    width: 50%;
    height: 100%;
    box-sizing: border-box;
    overflow-y: auto;
    }

    .form-wrapper h2 {
      text-align: center;
      margin-bottom: 20px;
      font-weight: bold;
   
    }

    label {
      font-weight: bold;
      display: block;
      margin-top: 10px;
    }

    input, select, textarea {
      background-color: #ccc;
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .gender-group {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-top: 5px;
    }

    .checkbox-group {
  display: flex;
  align-items: center;
  gap: 0px; 
  justify-content: left;
  margin-top: 15px;
}


    

    button {
      background-color: #9aab9e;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
      margin-top: 20px;
      font-size: 16px;
    }

    button:hover {
      background-color: #218838;
    }
  

    .user-display {
      margin-top: 20px;
      font-size: 1rem;
      color: #333;
      text-align: left;
      width: 100%;
      max-width: 400px;
    }

    .user-display p {
      margin: 5px 0;
    }

    .user-display hr {
      margin: 20px 0;
    }

    table {
     max-height: fit-content;
    
    }

    th, td {
      border: 1px solid black;
      padding: 8px;
      
    }

    th {
      background-color: #979c85;
    }
      .scrollable-box {
      height: 100%;
      width: 100%;
      overflow-y: auto;
      border: 1px solid #ccc;
      padding: 10px;
      background-color: #fff;
    }
  </style>
</head>
<body>
  <div class="logo">
    <img src="logo.jpg" width="100%" height="100%" >
  </div>

  <div class="title-box">AQI INDEX</div>

  <div class="container">
    <!-- Left Column -->
    <div class="column">
      <div class="box1">
        <table>
          echo "<div class='scrollable-box'>";
            
          <thead>
              <tr>
                  <th>NO</th>
                  <th>CITY</th>
                  <th>AQI</th>
              </tr>
          </thead>
          <tbody>
              <tr><td>1</td><td>DHAKA</td><td></td></tr>
              <tr><td>2</td><td>RANGPUR</td><td></td></tr>
              <tr><td>3</td><td>RAJSHAHI</td><td></td></tr>
              <tr><td>4</td><td>CHATTOGRAM</td><td></td></tr>
              <tr><td>5</td><td>GAZIPUR</td><td></td></tr>
              <tr><td>6</td><td>TANGAIL</td><td></td></tr>
              <tr><td>7</td><td>BAGURA</td><td></td></tr>
              <tr><td>8</td><td>DINAJPUR</td><td></td></tr>
              <tr><td>9</td><td>KHULNA</td><td></td></tr>
              <tr><td>10</td><td>BARISHAL</td><td></td></tr>
          </tbody>
        </table>
        
      </div>
      <div class="box3">

<?php
if (isset($_POST['Cities'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'aqi');

    if (!$conn) {
        die("Connection failed.");
    }

    $cities = $_POST['Cities'];
    $cityList = "'" . implode("','", $cities) . "'";
    $query = "SELECT City, AQI FROM info WHERE City IN ($cityList)";
    $result = mysqli_query($conn, $query);

    echo "<h3>Selected City AQI</h3>";
    echo "<div class='scrollable-box'>";
    echo "<table><tr><th>City</th><th>AQI</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['City'] . "</td><td>" . $row['AQI'] . "</td></tr>";
    }

    echo "</table>";
    echo "</div>";
    mysqli_close($conn);
} else {
    echo "<p>No cities selected.</p>";
}
?>

      </div>
    </div>

    <!-- Right Column -->
    <div class="column">
      <div class="box2">
        <div class="form-wrapper" >
          <h2 >Registration Form</h2>
          <form id="registrationForm" action="process.php" method="post">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="city">City:</label>
            <select id="city" name="city" required>
              <option value="">Select City</option>
              <option value="DHAKA">DHAKA</option>
              <option value="RANGPUR">RANGPUR</option>
              <option value="RAJSHAHI">RAJSHAHI</option>
              <option value="KHULNA">KHULNA</option>
              <option value="BARISHAL">BARISHAL</option>
              <option value="DINAJPUR">DINAJPUR</option>
              <option value="GAZIPUR">GAZIPUR</option>
            </select>

            <label>Gender:</label>
            <div class="gender-group">
              <input type="radio" id="male" name="gender" value="Male" required>
              <label for="male">Male</label>
              <input type="radio" id="female" name="gender" value="Female">
              <label for="female">Female</label>
            </div>

            <label for="zipcode">ZIP Code:</label>
            <input type="text" id="zipcode" name="zipcode" required>

            <div class="checkbox-group">
              <input type="checkbox" id="terms" name="terms" required>
              <label for="terms">I agree to the Terms and Conditions</label>
            </div>

            <button type="submit">Register</button>
          </form>
        </div>
      </div>
      <div class="box4">

         <div class="form-wrapper2" >
          <h2 >Please Login</h2>
          <form id="registrationForm" action="login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
             <button type="submit">Login</button>

      </div>
    </div>
  </div>

  <script>
   document.getElementById("registrationForm").addEventListener("submit", function (e) {
  const displayDiv = document.getElementById("userDisplay");
  let errors = [];

  const fullname = document.getElementById("fullname").value.trim();
  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirm-password").value;
  const dob = document.getElementById("dob").value;
  const city = document.getElementById("city").value;
  const gender = document.querySelector('input[name="gender"]:checked');
  const zipcode = document.getElementById("zipcode").value.trim();
  const termsAccepted = document.getElementById("terms").checked;

  const nameRegex = /^[a-zA-Z\s]+$/;
  const emailRegex = /^\d{2}-\d{5}-[1-3]@student\.aiub\.edu$/;
  const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;

  if (!nameRegex.test(fullname)) {
    errors.push("Full Name should contain only letters and spaces.");
  }

  if (!emailRegex.test(email)) {
    errors.push("Email must be a valid xx-xxxxx-x@student.aiub.edu address.");
  }

  if (!passwordRegex.test(password)) {
    errors.push("Password must be at least 6 characters, include letters and numbers.");
  }

  if (password !== confirmPassword) {
    errors.push("Passwords do not match.");
  }

  if (!gender) {
    errors.push("Please select a gender.");
  }

  if (!dob) {
    errors.push("Please select your date of birth.");
  }

  if (!city) {
    errors.push("Please select a city.");
  }

  if (!termsAccepted) {
    errors.push("You must agree to the Terms and Conditions.");
  }

  if (!zipcode || isNaN(zipcode)) {
    errors.push("ZIP code must be numeric.");
  }

  if (errors.length > 0) {
    e.preventDefault();  // Prevent only if there are errors
    displayDiv.innerHTML = `<p style="color:red;"><strong>${errors.join("<br>")}</strong></p>`;
  }
});

  </script>
</body>
</html>
