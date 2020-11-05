<?php
include 'connection/Connection.php';
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
    <link rel="stylesheet" href="css/styleMyBookings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Rural</title>
</head>
<header>
    <nav id ='nav'">
    <div class="logo">
        <h4><a href="index.php">Scape</a></h4>
    </div>
    <ul class="nav-link" id="navul">
        <li> <a href="services.php" class="link">Services</a></li>
        <li> <a href="booking.php" class="link">Booking</a></li>
        <li> <a href="aboutus.php" class="link">About us</a></li>
        <?php
        echo '<li> <a href="logout.php" class="link">Logout('. $_SESSION['currentuser']['name'] .')</a></li>';
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
    <h1>My Bookings</h1>
    <div class="bookings">
    <?php
    $connection = new Connection();
    $connection->openConnection();
    $connection->getBookings();
    $bookings = $connection->getBookings();

    if(!is_null($bookings))
    {
        $added = false;
        foreach ($bookings as $b) {
            if ($_SESSION['currentuser']['email'] == $b['userMail'] && $b['paid'])
            {
                echo '<div class="bookingContainer">';
                    echo '<div class="bookingInfo">';
                        echo '<p class="bookingText">From: '.$b['fromDate']. ' </p>';
                        echo '<p class="bookingText">To: '.$b['toDate']. '</p>';
                        echo '<p class="bookingText">Booked on: '.$b['bookingDate'].'</p>';
                        $added = true;
                        echo '</div>';
                        echo '</div>';
            }
        }
    }
    if(!$added)
    {
        echo "<p style='margin: 20% 5%; color: #FF8C00; padding-left: 30%; font-size: 25px'>Nothing to check!</p>";
    }



    ?>
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
