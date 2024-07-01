<?php
session_start();

// Unset the username session variable
unset($_SESSION['username']);

// Redirect the user back to the index page
header('Location: index.php');
exit();
?>