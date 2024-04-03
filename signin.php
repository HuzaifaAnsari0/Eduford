<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['dob'])){

            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $dob = $_POST['dob'];

            $conn = pg_connect("host=localhost port=5432 dbname=Eduford user=postgres password=1234");

            if(!$conn){
                die("Connection failed: " . pg_last_error());
            }

            $query = "INSERT INTO students (s_name, s_email, s_password, s_phno, s_dob) VALUES ($1, $2, $3, $4, $5)";
            $res = pg_query_params($conn, $query, array($fullname, $email, $password, $phone, $dob));

            if(!$res){
                die("Query failed: "  . pg_last_error());
            }

            header('location:login.php');
            exit(); // Ensure the script stops here
        } else {
            echo "Form data not received";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eduford</title>
    <link rel="icon" type="image/x-icon" href="eduford_img/onlyCap.png" />
    <link rel="stylesheet" href="signin.css" />
  </head>
  <style>
    .Header {
      min-height: 100vh;
      background-image: linear-gradient(
          rgba(4, 9, 30, 0.7),
          rgba(4, 9, 30, 0.7)
        ),
        url(eduford_img/buildings.jpg);
      background-position: center;
      background-size: cover;
      position: relative;
      overflow: hidden; /* Ensure the image is contained within the Header */
    }
  </style>
  <body>
    <div class="Header">
      <div class="text-box">
        <h1>Create an Account</h1>
        <p>Start your journey with us today.</p>
      </div>
      <div class="form-container">
        <h2>Sign Up</h2>
        <form action="signin.php" method="post">
          <input type="text" name="fullname" placeholder="Full Name" required />
          <input type="email" name="email" placeholder="Email" required />
          <input
            type="password"
            name="password"
            placeholder="Password"
            required
          />
          <input type="tel" name="phone" placeholder="Phone Number" required />
          <input type="date" name="dob" placeholder="Date of Birth" required />
          <button type="submit" na,e value="signin">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
      </div>
    </div>
  </body>
</html>
