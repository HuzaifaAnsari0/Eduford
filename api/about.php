<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" contents="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="onlyCap.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="index.css">
    <title>Eduford</title>
     <!-- Font Awesome -->
     <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
   />
   <!-- Google Font -->
   <link
     href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap"
     rel="stylesheet"
   />
</head>
<style>
    * {
     padding: 0;
     margin: 0;
     box-sizing: border-box;
     /* font-size: 12.8px; */
     font-family: "Poppins", sans-serif;
   }
   body {
     background-color: #f5f5f5;
   }
   .row {
     display: flex;
     flex-wrap: wrap;
     padding-bottom: 1em;
     /* padding:1em; */
     margin-top: 0.9em;
     text-align: center;
   }
   .column {
     width: 100%;
     padding: 0.5em 0;
   }
   h1 {
     width: 100%;
     text-align: center;
     font-size: 3.5em;
     color: #1f003b;
     margin: 0;
   }
   .card {
     box-shadow: 0 0 2.4em rgba(25, 0, 58, 0.1);
     padding: 3.5em 1em;
     border-radius: 0.6em;
     color: #1f003b;
     cursor: pointer;
     transition: 0.3s;
     background-color: #ffffff;
   }
   .card .img-container {
     width: 8em;
     height: 8em;
     background-color: rgb(223, 146, 3);
     padding: 0.5em;
     border-radius: 50%;
     margin: 0 auto 2em auto;
   }
   .card img {
     width: 100%;
     border-radius: 50%;
   }
   .card h3 {
     font-weight: 500;
   }
   .card p {
     font-weight: 300;
     text-transform: uppercase;
     margin: 0.5em 0 2em 0;
     letter-spacing: 2px;
   }
   .icons {
     width: 50%;
     min-width: 180px;
     margin: auto;
     display: flex;
     justify-content: space-between;
   }
   .card a {
     text-decoration: none;
     color: inherit;
     font-size: 1.4em;
   }
   .card:hover {
     background: linear-gradient(orange, rgb(250, 196, 95));
     color: #ffffff;
   }
   .card:hover .img-container {
     transform: scale(1.15);
   }
   @media screen and (min-width: 280px){ 
       section {
       padding: 1em 3em;
     }  
   }
   @media screen and (min-width: 768px) {
     section {
       padding: 1em 3em;
     }
   }
   @media screen and (min-width: 992px) {
     section {
       padding: 1em;
     }
     .card {
       padding: 5em 1em;
     }
     .column {
       flex: 0 0 33.33%;
       max-width: 33.33%;
       padding: 0 1em;
     }
   }
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
.search-container input[type="text"] {
    width: 350px; /* Adjust this value to your liking */
    padding: 10px;
    border: 2px solid white;
    border-radius: 10px;
    outline: none;
    font-size: 16px;
    color: white;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
.search-container input[type="text"]:hover {
    border: 2px solid white;
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
}
input[type=text] {
    margin-right: 20px;
}
.search-input::placeholder {
    color: white;
}
</style>
<body>
    <section class="sub-header">
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
            </div>>
          </ul>
          <?php if (!isset($_SESSION['username'])): ?>
            
            <a href="signin.php" class="action_btn sign oldBtn" style="margin-left: 50px; ">Sign in</a>
            <a href="login.php" class="action_btn login oldBtn" style="margin-left: 15px;">Login</a>
            
        <?php else: ?>
            <div class="action_btn action_btn1 fas fa-user username newBtn" style="margin-left: 50px; "> <?= $_SESSION['username'] ?></div>
            <a href="logout.php" class="action_btn logout newBtn">Logout</a>
        <?php endif; ?>
        </div>
        <h1>About us</h1>
    </section>
    <a href ="feedback.php"><button id="popup" class="feedback-button" onclick="toggle_visibility()" style="color:black">Feedback</button></a>
    <!-- About us content -->
    <section class="about-us">
        <div class="row">
            <div class="about-col">
                <h4 style="margin-bottom: 20px;">Welcome to Eduford! We're your go-to destination for all things college and courses. Our mission is simple: to provide you with the information and tools you need to make confident decisions about your education. With a curated database, expert advice, and user-friendly features, we're here to support you on your academic journey. Thanks for choosing us!</h4>
                <a href="#" class="action_btn">Explore now</a>
            </div>
            <div class="about-col">
                <img src="eduford_img/about.jpg">
            </div>
        </div>
    </section>
    <section>   
        <div class="row">
          <h1>OUR TEAM</h1>
        </div>
        <div class="row">
          <!-- Column 1-->
          <div class="column">
            <div class="card">
              <div class="img-container">
                <img src="eduford_img/kaushal.jpg" />
              </div>
              <h3>Kaushal Bhadra</h3>
              <p>Full Stack Developer</p>
              <div class="icons">
                <a href="tel:9920351043">
                  <i class="fas fa-phone"></i>
                </a>
                <a href="https://www.linkedin.com/in/kaushal-b-5a8890254/">
                  <i class="fab fa-linkedin"></i>
                </a>
                <a href="https://github.com/KaushalBhadra15">
                  <i class="fab fa-github"></i>
                </a>
                <a href="mailto:kaushal.b@somaiya.edu">
                  <i class="fas fa-envelope"></i>
                </a>
              </div>
            </div>
          </div>
          <!-- Column 2-->
          <div class="column">
            <div class="card">
              <div class="img-container">
                <img src="eduford_img/Huzaifa.jpeg" style="height: 112px;" />
              </div>
              <h3>Huzaifa Ansari</h3>
              <p>Full Stack Developer</p>
              <div class="icons">
                <a href="tel:773896259">
                  <i class="fas fa-phone"></i>
                </a>
                <a href="https://www.linkedin.com/in/huzaifaansari0/">
                  <i class="fab fa-linkedin"></i>
                </a>
                <a href="https://github.com/HuzaifaAnsari0">
                  <i class="fab fa-github"></i>
                </a>
                <a href="mailto:huzaifa.a@somaiya.edu">
                  <i class="fas fa-envelope"></i>
                </a>
              </div>
            </div>
          </div>
          <!-- Column 3-->
          <div class="column">
            <div class="card">
              <div class="img-container">
                <img src="eduford_img/Medhaj.jpeg" style="height:112px;"/>
              </div>
              <h3>Medhaj Chaudhari</h3>
              <p>Frontend Developer</p>
              <div class="icons">
                <a href="tel:9326459319">
                  <i class="fas fa-phone"></i>
                </a>
                <a href="https://www.linkedin.com/in/medhaj-chaudhari-777575254/">
                  <i class="fab fa-linkedin"></i>
                </a>
                <a href="https://github.com/MedhajChaudhari">
                  <i class="fab fa-github"></i>
                </a>
                <a href="mailto:medhaj.c@somaiya.edu">
                  <i class="fas fa-envelope"></i>
                </a>
              </div>
            </div>
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
                    <li>management</li>
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
