<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" contents="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="eduford_img/onlyCap.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="index.css">
    <title>Eduford</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
</head>
<style>
    .contact-col1 {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

#contact-form {
    width: 100%;
    max-width: 600px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

#contact-form input[type="text"],
#contact-form textarea {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

#contact-form button {
    background-color: orangered;
    color: white;
    padding: 10px 15px;
    margin: 4px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: fit-content;
}

#contact-form button:hover {
    background-color: orangered;
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
    color: black;
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
    <section class="sub-header1">
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
            <div class="action_btn action_btn1 fas fa-user username newBtn" style="margin-left: 92px; "> <?= $_SESSION['username'] ?></div>
            <a href="logout.php" class="action_btn logout newBtn">Logout</a>
        <?php endif; ?>
            </div>
        </div>
        <h1>Contact us</h1>
    </section>
    <a href ="feedback.php"><button id="popup" class="feedback-button" onclick="toggle_visibility()" style="color:black">Feedback</button></a>

    <!-- Contact us -->
    <section class="location">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60313.65565294067!2d72.8638489186343!3d19.1250436146657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c8081c1d7b43%3A0xbaf100c54b8be366!2sPowai%2C%20Mumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1711281532988!5m2!1sen!2sin"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>

    </section>
    <div class="contact-us">
        <section class="row1">
            <div class="contact-col">
                <div>
                    <i class="fa fa-home"></i>
                    <span>
                        <h5>502,Satori buliding</h5>
                        <p>Satori city, Satori</p>
                    </span>
                </div>
                <div>
                    <i class="fa fa-phone"></i>
                    <span>
                        <h5>+91123456789</h5>
                        <p>Monday-Friday 10am-5pm</p>
                    </span>
                </div>
                <div>
                    <i class="fa fa-envelope"></i>
                    <span>
                        <h5>huzaifa.a@somaiya.edu</h5>
                        <p>Email us for query</p>
                    </span>
                </div>
            </div>
            <div class="contact-col1">
                <form id="contact-form" action="http://localhost:3000/send-email" method="post">
                    <input type="text" name="name" placeholder="Enter your name" required>
                    <input type="text" name="email" placeholder="Enter email" required>
                    <input type="text" name="subject" placeholder="Enter Subject" required>
                    <textarea rows="8" name="message" id="message" placeholder="Message" required></textarea>
                    <button type="submit" class="action_btn">Send message</button>
                </form>        
            </div>
        </section>
    </div>
    <footer>
        <div class="rowf">
            <div class="colf">
                <img src="eduford_img/logo.png" class="logof">
                <li>Eduford is an educational platform dedicated to providing information about the courses one must be
                    willing to pursue, relevant colleges and other career prospects</li>
            </div>
            <div class="colf">
                <h3>Trending streams<div class="underline"><span></span></div>
                </h3>
                <ul>
                    <li>Engineering</li>
                    <li>management</li>
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
        document.getElementById('contact-form').addEventListener('submit', function(event) {
            event.preventDefault();
        
            const formData = new FormData(this);
            const data = Object.fromEntries(formData);
        
            fetch('http://localhost:3000/send-email', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'Email sent') {
                    alert('Email sent!');
                } else {
                    alert('Failed to send email.');
                }
            })
            .catch((error) => {
                console.error('Error:', error);
                alert('An error occurred.');
            });
        });
        </script>
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