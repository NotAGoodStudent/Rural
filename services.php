<?php
session_start();
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
    <link rel="stylesheet" href="css/styleServices.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Rural</title>
</head>
<header>
    <nav id ='nav'">
    <div class="logo">
        <h4><a href="index.php">Scape</a></h4>
    </div>
    <ul class="nav-link" id="navul">
        <li> <a href="aboutus.php" class="link">About us</a></li>
        <?php
        if(is_null($_SESSION['currentuser']))
        {
            echo '<li> <a href="login.php" class="link">Login</a></li>';
            echo '<li> <a href="register.php" class="link">Register</a></li>';
        }
        else
        {
            echo '<li> <a href="logout.php" class="link">Logout('. $_SESSION['currentuser']['name'] .')</a></li>';
            echo '<li> <a href="mybookings.php" class="link">My Bookings</a></li>';
            echo '<li> <a href="booking.php" class="link">Booking</a></li>';
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
    <div class="rooms">
        <img class="roomImg" src="/images/imageRes.jpg">
        <h3>room</h3>
        <p class="text">There's no better way to start the day
        than waking up from those extremely comfortable beds.
        Designed to give the best rest possible and around luxury at a very nice price... 35€ per person!</p>
        <img class="roomImg" src="">
    </div>
    <div class="spa">
        <img class="spaImg" src="/images/spa.jpg">
        <h3>spa</h3>
        <p class="text">
            We offer you a great spa service, ideal to get rid of stress. You also have the chance of spending some time in our very comfortable sauna and if that were not enough you have access to the jacuzzi. This sounds more fun if you bring someone along!
        </p>


    </div>
    <div class="views">
        <img class="viewImg" src="/images/viewRes.jpg">
        <h3>views</h3>

        <p class="text">
            Do you like hiking? well good news for you.
            We have such great views around for you to visit, if you need a hiking guide
            let us know and plan a great hiking experience for you!
        </p>

    </div>
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