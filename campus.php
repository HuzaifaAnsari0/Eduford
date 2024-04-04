<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="campus.css">
    <link rel="icon" type="image/x-icon" href="eduford_img/onlyCap.png">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

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
    <section class="hero">
        <div class="heading">
            <h1>Campuses</h1>
        </div>
        <div class="container animate-on-scroll">
            <div class="hero-content">
                <h2>Tulas university</h2>
                <p>Discover our colleges</p>
                <div class="contact-info1">
                    <i class="fa fa-phone"> +91 123456789 </i>
                </div> 
                <br>
                <div class="contact-info1">
                    <i class="fa fa-envelope"> info@tulas.edu</i>
                </div>
                <br>
                <p>Fees<button class="cta-button"> 80000</button></p>
            </div>
            <div class="hero-image">
                <img src="eduford_img/tulas1.jpeg">
            </div>
        </div>
        <div class="container animate-on-scroll">
            <div class="hero-image">
                <img src="eduford_img/utranchal2.jpeg">
            </div>
            <div class="hero-content">
                <h2>Utranchal university</h2>
                <p>Discover our colleges</p>
                <div class="contact-info1">
                    <i class="fa fa-phone"> +91 123456789 </i>
                </div> 
                <br>
                <div class="contact-info1 ">
                    <i class="fa fa-envelope"> info@utc.edu</i>
                </div>
                <br>
                <p>Fees<button class="cta-button"> 60000</button></p>
            </div>
        </div>
        <div class="container animate-on-scroll">
            <div class="hero-content">
                <h2>JBIET university</h2>
                <p>Discover our colleges</p>
                <div class="contact-info1">
                    <i class="fa fa-phone"> +91 123456789 </i>
                </div> 
                <br>
                <div class="contact-info1">
                    <i class="fa fa-envelope"> info@jbiet.edu</i>
                </div>
                <br>
                <p>Fees<button class="cta-button"> 70000</button></p>
            </div>
            <div class="hero-image">
                <img src="eduford_img/jbiet2.jpeg">
            </div>
        </div>
        <div class="container animate-on-scroll">
            <div class="hero-image">
                <img src="eduford_img/upes2.jpeg">
            </div>
            <div class="hero-content">
                <h2>UPES University</h2>
                <p>Discover our colleges</p>
                <div class="contact-info1">
                    <i class="fa fa-phone"> +91 123456789 </i>
                </div> 
                <br>
                <div class="contact-info1">
                    <i class="fa fa-envelope"> info@upes.edu</i>
                </div>
                <br>
                <p>Fees<button class="cta-button"> 75000</button></p>
            </div>
        </div>
        <div class="container animate-on-scroll">
            <div class="hero-content">
                <h2>GRD university</h2>
                <p>Discover our colleges</p>
                <div class="contact-info1">
                    <i class="fa fa-phone"> +91 123456789 </i>
                </div> 
                <br>
                <div class="contact-info1">
                    <i class="fa fa-envelope"> info@grd.edu</i>
                </div>
                <br>
                <p>Fees<button class="cta-button">90000</button></p>
            </div>
            <div class="hero-image">
                <img src="eduford_img/grd2.jpeg">
            </div>
        </div> 
        <div class="container animate-on-scroll">
            <div class="hero-image">
                <img src="eduford_img/dev2.jpeg">
            </div>
            <div class="hero-content">
                <h2>Dev Bhoomi University</h2>
                <p>Discover our colleges</p>
                <div class="contact-info1">
                    <i class="fa fa-phone"> +91 123456789 </i>
                </div> 
                <br>
                <div class="contact-info1">
                    <i class="fa fa-envelope"> info@dbu.edu</i>
                </div>
                <br>
                <p>Fees<button class="cta-button"> 45000</button></p>
            </div>
        </div>
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
    $(document).ready(function() {
    $(window).scroll(function() {
        $('.animate-on-scroll').each(function() {
            var elementTop = $(this).offset().top;
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();
            if (elementTop < viewportBottom) {
                $(this).addClass('visible');
            }
        });
    });
});

    </script>
</body>

</html>
