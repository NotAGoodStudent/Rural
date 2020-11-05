<?php
include 'connection/Connection.php';
session_start();
if(isset($_GET['pay']))
{
    $connection = new Connection();
    $connection->openConnection();
    $booking = $_SESSION['pendingBooking'];
    $connection->updateBooking($booking);
    $connection->closeConnection();
    header('location: mybookings.php');
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="JavaScript/index.js"></script>
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/styleCheckout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Rural</title>
</head>
<header>
    <nav>
        <div class="logo">
            <h4><a href="index.php">Scape</a></h4>
        </div>
        <ul class="nav-link" id="navul">
            <li> <a href="services.php" class="link">Services</a></li>
            <li> <a href="aboutus.php" class="link">About us</a></li>
            <?php
            if(is_null($_SESSION['currentuser']))
            {
                echo '<li> <a href="login.php" class="link">Login</a></li>';
            }
            else
            {
                echo '<li> <a href="logout.php" class="link">Logout('. $_SESSION['currentuser']['name'] .')</a></li>';
            }
            ?>
        </ul>
        <div class="burger" onclick="toggleBurger('navul')">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>

</header>
<body onscroll="scrollFunction()">
<div class="content">
    <form id="formReg" method="get">
        <?php

            echo '<h1>Total: '.$_SESSION['pendingBooking'][4].'€</h1>'
        ?>

        <div class="data">
            <input type="text" class="items" placeholder="Card Number" required>
            <input type="text" class="items" placeholder="Cardholder Name" required>
            <input type="text" class="itemsE" placeholder="Expiry Date" required>
            <input type="text" class="itemsC" placeholder="CVV" required>
            <input type="submit" value="pay" name="pay">
        </div>
    </form>
</div>
</body>
<footer>
    <div class="footerContent">
        <div class="faBox">
            <a href="" class="fa fa-twitter"></a>
            <a href="" class="fa fa-linkedin"></a>
            <a href="" class="fa fa-instagram"></a>
            <a href="" class="fa fa-facebook"></a>
        </div>
        <p>&copy; Stephen Donoghue</p>
    </div>
</footer>
</html>
