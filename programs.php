<?php
session_start();

$host = "localhost";
$dbname = "Eduford";
$user = "postgres";
$password = "1234";

// Create connection
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

// Check connection
if (!$conn) {
  die("Connection failed: " . pg_last_error());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="eduford_img/onlyCap.png">
    <link rel="stylesheet" href="programs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
   <link
     href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap"
     rel="stylesheet"
   />
    <title>Eduford</title>
</head>
<style>
    .action_btn1 {
    display: flex;
    align-items: center;
    gap: 10px;
}
.search-container input[type="text"] {
    width: 350px; /* Adjust this value to your liking */
}
.search-container{
    margin-left: 170px;
}
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
.heading h1 {
    margin-top: 20px;
    text-align: center;
    color: #ff6347;
    font-size: 55px;
}
.navbar-section{
    background-image: url('eduford_img/courseHeader.jpeg');
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
                    <input type="text" placeholder="Search..">
                </div>
            </ul>
            <?php if (!isset($_SESSION['username'])): ?>
            
            <a href="signin.php" class="action_btn sign oldBtn" style="margin-left: 10px; ">Sign in</a>
            <a href="login.php" class="action_btn login oldBtn" style="margin-left: 15px;">Login</a>
            
        <?php else: ?>
            <div class="action_btn action_btn1 fas fa-user username newBtn"> <?= $_SESSION['username'] ?></div>
            <a href="logout.php" class="action_btn logout newBtn">Logout</a>
        <?php endif; ?>
        </div>
    </section>
    <a href ="feedback.php"><button id="popup" class="feedback-button" onclick="toggle_visibility()" style="color:black">Feedback</button></a>

    <div class="heading">
            <h1>Programs</h1>
        </div>
    <?php
// ... rest of your PHP code ...

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

$query = "SELECT * FROM programs";
$result = pg_query($conn, $query);

if (pg_num_rows($result) > 0) {
    echo '<div class="container">';
    // output data of each row
    while($row = pg_fetch_assoc($result)) {
        echo '<div class="card">
                <div class="card-content">
                    <img src="' . $row["p_image"] . '" class="card-img-top" alt="Placeholder Image">
                    <div class="overlay">
                        <h5 class="card-title">' . $row["p_name"] . '</h5>
                        <p class="card-text">' . $row["p_description"] . '</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Course duration: ' . $row["p_duration"] . '</li>
                            <li class="list-group-item">Course fees: ' . $row["p_fees"] . '</li>
                        </ul>
                    </div>
                </div>
            </div>';
    }
    echo '</div>';
} else {
    echo "0 results";
}
pg_close($conn);

// ... rest of your PHP code ...
?>
    <!-- <div class="container">
        <div class="card">
            <div class="card-content">
                <img src="eduford_img/mba.webp" class="card-img-top" alt="Placeholder Image">
                <div class="overlay">
                    <h5 class="card-title">MBA</h5>
                    <p class="card-text">MBA stands for Master of Business Administration. First introduced by Harvard University Graduate School of Administration in 1908 (now Harvard Business School), the MBA is the original graduate degree offered by business schools globally.</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Course duration:-2 years</li>
                        <li class="list-group-item">Offered by:-GRD,IIM</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <img src="eduford_img/arch1.jpeg" class="card-img-top" alt="Placeholder Image">
                <div class="overlay">
                    <h5 class="card-title">B.Arch</h5>
                    <p class="card-text">Bachelor of Architecture (BArch) course is a professional undergraduate degree, designed to prepare students for careers as architects. This five-year program, spread across ten semesters, integrates the art and science of building design and construction. </p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Course duration:-4 years</li>
                        <li class="list-group-item">Offered by:-Tulas,UPES</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <img src="eduford_img/eng2.jpeg" class="card-img-top" alt="Placeholder Image">
                <div class="overlay">
                    <h5 class="card-title">B.Tech</h5>
                    <p class="card-text">The full form of BTech is Bachelor of Technology (BTech). BTech is a highly sought-after undergraduate engineering degree, offering a gateway to diverse and rewarding career opportunities in the ever-evolving technological landscape</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Course duration:-4 years</li>
                        <li class="list-group-item">Offered by:-Utranchal</li>
                    </ul>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <img src="eduford_img/bsc.webp" class="card-img-top" alt="Placeholder Image">
                <div class="overlay">
                    <h5 class="card-title">BSc</h5>
                    <p class="card-text">Bachelor of Science (BSc) is an undergraduate academic degree awarded for completed courses in science. The full form of BSc is Bachelor of Science. It is a three-year course after 12th grade or equivalent.</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Course duration:-3 years</li>
                        <li class="list-group-item">Offered by:-JBIET</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->
    <footer style="margin-top:30px">
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
                <h3>Trending Courses<div class="underline"><span></span></h3>
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
                <div class="social-icons">
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

