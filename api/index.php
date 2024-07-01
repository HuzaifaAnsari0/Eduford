<?php
session_start();

$dbhost = "localhost";
$dbname = "Eduford";
$dbuser = "postgres";
$dbpass = "1234";

$conn = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpass");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" contents="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="onlyCap.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
   />
   <!-- Google Font -->
   <link
     href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap"
     rel="stylesheet"
   />
    <title>Eduford</title>
    <script src="https://kit.fontawesome.com/410cc890ec.js" crossorigin="anonymous"></script>
</head>
<style>
.action_btn1 {
    display: flex;
    align-items: center;
    gap: 10px;
}
/* .search-container input[type="text"] {
    width: 350px; /* Adjust this value to your liking */
/* }
.search-container{
    margin-left: 170px;
} */ 
.oldBtn{
    width: fit-content;
    margin-left: auto;
    margin-right: auto;
    border-radius: 5px;
    color: #333;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;

}
.newBtn{
    margin-right: 35px;
    margin-top: 25px;
    border-radius: 5px;
    color: #333;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}
.feedback-button {
  height: fit-content;
    padding: 1px 5px;
  background: orange;
  border-radius: 5px;
  width: fit-content;
  line-height: 32px;
  -webkit-transform: rotate(-90deg);
  font-weight: 600;
  transform: rotate(-90deg);
  -ms-transform: rotate(-90deg);
  -moz-transform: rotate(-90deg);
  text-align: center;
  font-size: 16px;
  position: fixed;
  right: -30px;
  top: 45%;
  font-family: 'Poppins', sans-serif;
  z-index: 999;
}
#feedback-main {
  display: none;
  float: left;
  padding-top: 0px;
}
.search-container input[type="text"] {
    width: 350px; /* Adjust this value to your liking */
    padding: 10px;
    border: 2px solid #000;
    border-radius: 10px;
    outline: none;
    font-size: 16px;
    color: black;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
.search-container input[type="text"]:hover {
    border: 2px solid black;
    border-radius: 13px;
}
.search-container button[type="submit"] {
    background-color: orange;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.search-container button[type="submit"]:hover {
    background-color: darkorange;
}
form {
    margin-bottom: -10px;
    border-bottom: 1px solid black;
}
input[type=text] {
    margin-right: 20px;
}
.search-input::placeholder {
    color: black;
}
</style>
<body>
    <section class="navbar-section">
        <div class="navbar">
            <div class="logo" style="margin-top:50px; margin-right: 2px;">
                <a href="index.php"><img src="eduford_img/logo.png"></a>
            </div>
            <ul class="links">
            <div class="search-container">
                <form action="search.php" method="GET">
                    <input type="text" name="query" placeholder="Search.." class="search-input">
                    <button type="submit" class="search-button" style="color:black">Search</button>
                </form>
            </div>
            </ul>
            <?php if (!isset($_SESSION['username'])): ?>
            
        <a href="signin.php" class="action_btn sign oldBtn" style="margin-left: 92px; ">Sign in</a>
        <a href="login.php" class="action_btn login oldBtn" style="margin-left: 15px;">Login</a>
        
    <?php else: ?>
        <div class="action_btn action_btn1 fas fa-user username newBtn" style="margin-left: 92px;" > <?= $_SESSION['username'] ?></div>
        <a href="logout.php" class="action_btn logout newBtn">Logout</a>
    <?php endif; ?>
        </div>
        <div class="text-box">
            <a href="about.php" class="hero-btn"><b>About us</b></a>
        </div>     
    </section>
    <a href ="feedback.php"><button id="popup" class="feedback-button" onclick="toggle_visibility()" style="color:black">Feedback</button></a>
    <section class="course-section">

    <?php
// ... rest of your PHP code ...

$query = "SELECT * FROM institutions";
$result = pg_query($conn, $query);

if (pg_num_rows($result) > 0) {
    echo '<section class="course">
            <h1>Feature colleges/universities</h1>  
            <div class="row">';
    // output data of each row
    while($row = pg_fetch_assoc($result)) {
        echo '<div class="course-col">
                <img src="' . $row["i_image"] . '">
                <h3>' . $row["i_name"] . '</h3>
                <p>' . $row["i_description"] . '</p>
                <a href="campus.php" class="action_btn">Read more</a>
            </div>';
    }
    echo '</div></section>';
} else {
    echo "0 results";
}
pg_close($conn);

// ... rest of your PHP code ...
?>
        <!-- <section class="course">
            <h1>Feature colleges/universities</h1>  
            <div class="row">
                <div class="course-col">
                    <img src="eduford_img/washington.png">
                    <h3>UPES Dehradun</h3>
                    <p>UPES ranked the No. 1 private university in academic reputation in India by the QS World University Rankings 2024 and is among the top 3% of universities in the world.</p>
                    <a href="campus.php" class="action_btn">Read more</a>
                </div>
                <div class="course-col">
                    <img src="eduford_img/JBIT.jpeg">
                    <h3>JBIET Dehradun</h3>
                    <p>JBIET is one among the best 10 Engineering Colleges of the Telangana State, and is also the most preferred institution for aspiring students and their parents.</p>
                    <a href="campus.php" class="action_btn">Read more</a>
                </div>
                <div class="course-col">
                    <img src="eduford_img/Utranchal.jpeg">
                    <h3>Utranchal university</h3>
                    <p>Uttaranchal University is ranked among the Top 50 general private universities in India by India Today's best universities in India survey August 2022 · </p>
                    <a href="campus.php" class="action_btn">Read more</a>
                </div>
                <div class="course-col">
                    <img src="eduford_img/GRD.jpeg">
                    <h3>GRD university</h3>
                    <p>GRD Institute of Management & Technology is top engineering colleges in Dehradun, offering top-notch B.tech, Diploma, Pharmacy & Mgt. courses.</p>
                    <a href="campus.php" class="action_btn">Read more</a>
                </div>
                <div class="course-col">
                    <img src="eduford_img/dev.jpeg">
                    <h3>Dev bhoomi university</h3>
                    <p>Dev Bhoomi Uttarakhand University
                        The Best University in Dehradun, Uttarakhand
                        Dev Bhoomi Uttarakhand University is a non-profit, self-governed organisation that offers unique and advanced academic models designed mainly to train industry-ready individuals. </p>
                    <a href="campus.php" class="action_btn">Read more</a>
                </div>
                <div class="course-col">
                    <img src="eduford_img/tulas.jpeg">
                    <h3>Tulas University</h3>
                    <p>Tula's Institute established in the year 2006, is a renowned educational institution located in Dehradun, Uttarakhand. It provides a wide range of Degree</p>
                    <a href="campus.php" class="action_btn">Read more</a>
                </div>
            </div>
        </section> -->
    </section>
    <section class="campus">
        <h1>Programs</h1>
        <div class="row">
            <div class="campus-col">
                <img src="eduford_img/eng.jpeg">  
                <div class="layer">
                    <h3>Engineering</h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="eduford_img/management.jpeg">  
                <div class="layer">
                    <h3>Management</h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="eduford_img/doc.jpeg">  
                <div class="layer">
                    <h3>Medical</h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="eduford_img/arch.jpeg">  
                <div class="layer">
                    <h3>Architecture</h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="eduford_img/pharma.jpeg">  
                <div class="layer">
                    <h3>Pharmacy</h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="eduford_img/des.jpeg">  
                <div class="layer">
                    <h3>Designing</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="campus-col">
                <img src="eduford_img/agri.jpeg">  
                <div class="layer">
                    <h3>Agriculture</h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="eduford_img/sci.jpeg">  
                <div class="layer">
                    <h3>Science</h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="eduford_img/com.png">  
                <div class="layer">
                    <h3>Commerce</h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="eduford_img/hosp.jpeg">  
                <div class="layer">
                    <h3>Hospitality</h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="eduford_img/law.jpeg">  
                <div class="layer">
                    <h3>law</h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="eduford_img/arts2.jpeg">  
                <div class="layer">
                    <h3>Arts</h3>
                </div>
            </div>
        </div>
        <a href="programs.php" class="action_btn">Explore</a>
    </section>
    <section class="testimonials">
        <h1>What our students say</h1>
        <p>Feedbacks</p>
        <div class="row">
            <div class="testimonial-col animateD">
                <img src="eduford_img/user1.jpg" alt="user 1">
                <div>
                    <p>
                        Eduford simplifies the college search with its user-friendly interface, providing comprehensive details on fees, courses, and locations. With regular updates and transparent insights, it's an indispensable tool for any student navigating higher education choices.</p>
                    <h3>Ananya</h3>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
            </div>
            <div class="testimonial-col animateD">
                <img src="eduford_img/user2.jpg" alt="user 1">
                <div>
                    <p>
                        Eduford streamlines the college search process by offering a user-friendly interface and comprehensive details on fees, courses, and locations. With regular updates and transparent insights, it's an invaluable resource for students making informed higher education decisions.</p>
                    <h3>Zack</h3>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </section>
     <!-- call to action -->
     <section class="cta">
        <h1>Enroll to various course anywhere from the world</h1>
        <a href="contact.php" class="action_btn">Contact us</a>
    </section>
    <footer>
        <div class="rowf">
            <div class="colf">
                <img src="eduford_img/logo.png" class="logof">
                <li>Eduford is an educational platform dedicated to providing information about the courses one must be willing to pursue, relevant colleges and other career prospects</li>
            </div>
            <div class="colf">
                <h3>Trending streams<div class="underline"><span></span></div></h3>
                <ul>
                    <li>Engineering</li>
                    <li>Management</li>
                    <li>Medical</li>
                    <li>Design</li>
                    <li>Pharmacy</li>
                </ul>
            </div>
            <div class="colf">
                <h3>Trending Programs<div class="underline"><span></span></h3>
                <ul>
                    <li>B.Tech</li>
                    <li>MBA</li>
                    <li>MBBS</li>
                    <li>B.Des</li>
                    <li>B.Pharma</li>
                </ul>
            </div>
            <div class="colf">
                <h3>Newsletter<div class="underline"><span></span></h3>
                <form>
                    <i class="fa-solid fa-envelope" style="margin-right:8px;"></i>
                    <input type="email" placeholder="Enter your email id" required>
                    <button type="submit"><i class="fa-solid fa-arrow-right"></i></button>
                </form>
                <div class="social-icons" style="margin-top:50px">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-pinterest"></i>
                </div>
            </div>
        </div>
    </footer>
    <script>
    function toggle_visibility() {
        var e = document.getElementById('feedback-main');
        if(e.style.display == 'block')
            e.style.display = 'none';
        else
            e.style.display = 'block';
    }
</script>
</body>
</html>
