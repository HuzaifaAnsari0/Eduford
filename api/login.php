<?php
    session_start(); 

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $authenticated = false;
    if(isset($_POST['verify']) && $_POST['verify'] == 'Verify'){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $conn = pg_connect("host=localhost port=5432 dbname=Eduford user=postgres password=1234");

        if(!$conn){
            die("Connection failed: " . pg_last_error());
        }

        $query = "SELECT verify($1,$2)";
        $res = pg_query_params($conn,$query,array($username,$password));

        if(!$res){
            die("Query failed: " . pg_last_error());
        }

        $result= pg_fetch_result($res, 0, 0);

        if($result === FALSE){
            die("Fetching result failed");
        }

        $authenticated = $result == 1;

        if(!$authenticated){
            echo "You are not authenticated!";
        }else{
            $_SESSION['username'] = $username;
            header('location:index.php');
            exit(); // Ensure the script stops here
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eduford</title>
    <link rel="icon" type="image/x-icon" href="onlyCap.png">
    <link rel="stylesheet" href="signin.css">
</head>
<style>
    .Header {
    min-height: 100vh;
    background-image: linear-gradient(rgba(4, 9, 30, 0.7), rgba(4, 9, 30, 0.7)), url(eduford_img/buildings2.jpg);
    background-position: center;
    background-size: cover;
    position: relative;
    overflow: hidden; 
}
</style>
<body>
    <div class="Header">
        <div class="text-box">
            <h1>Welcome Back!</h1>
            <p>Please login to your account.</p>
        </div>
        <div class="form-container">
            <h2>Login</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="verify" value="Verify">Login</button>
            </form>
            <p>Don't have an account? <a href="signin.php">Sign Up</a></p>
        </div>
    </div>
</body>
</html>