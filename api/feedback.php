<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['satisfy2']) && isset($_POST['msg'])){

            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $satisfied = $_POST['satisfy2'];
            $suggestion = $_POST['msg'];

            $conn = pg_connect("host=localhost port=5432 dbname=Eduford user=postgres password=1234");

            if(!$conn){
                die("Connection failed: " . pg_last_error());
            }

            $query = "INSERT INTO feedbacks (f_name, f_email, f_phno, f_satisfied, f_suggestion) VALUES ($1, $2, $3, $4, $5)";
            $res = pg_query_params($conn, $query, array($name, $email, $phone, $satisfied, $suggestion));

            if(!$res){
                die("Query failed: "  . pg_last_error());
            }

            header('location:index.php'); // Redirect to home page after successful submission
            exit(); // Ensure the script stops here
        } else {
            echo "Form data not received";
        }
    }
?>
<!DOCTYPE html> 
<html lang="en"> 

<head> 
	<meta charset="UTF-8"> 
	<meta name="viewport"
		content="width=device-width,initial-scale=1.0"> 
		<link rel="icon" type="image/x-icon" href="onlyCap.png">
	<link rel="stylesheet" href= 
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"> 
	<link rel="stylesheet" href="../assets/feedback.css"> 
	<title>Eduford</title>
</head> 
<body> 
	 
	<div class="form-box" id="feedback-main"> 
	<h1 style="text-align:center">Eduford</h1>
		<div class="textup"> 
			<i class="fa fa-solid fa-clock"></i> 
			It only takes two minutes!! 
		</div> 
		<form method="POST" action=""> 
			<label for="uname"> 
				<i class="fa fa-solid fa-user"></i> 
				Name 
			</label> 
			<input type="text" id="uname"
				name="name" required> 

			<label for="email"> 
				<i class="fa fa-solid fa-envelope"></i> 
				Email Address 
			</label> 
			<input type="email" id="email"
				name="email" required> 

			<label for="phone"> 
				<i class="fa-solid fa-phone"></i> 
				Phone No 
			</label> 
			<input type="tel" id="phone"
				name="phone" required> 

			<label> 
				<i class="fa-solid fa-face-smile"></i> 
				Do you satisfy with our service? 
			</label> 
			<div class="radio-group"> 
    <input type="radio" id="yes2" name="satisfy2" value="yes" checked> 
    <label for="yes2">Yes</label> 

    <input type="radio" id="no2" name="satisfy2" value="no"> 
    <label for="no2">No</label> 
			</div>

			<label for="msg"> 
				<i class="fa-solid fa-comments"
				style="margin-right: 3px;"></i> 
				Write your Suggestions: 
			</label> 
			<textarea id="msg" name="msg"
					rows="4" cols="10" required> 
			</textarea> 
			<button type="submit" class="submit-buttom"> 
				Submit 
			</button> 
		</form> 
	</div>
</body> 

</html>
