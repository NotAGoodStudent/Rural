<?php
include 'connection/Connection.php';
session_start();
if(!is_null($_SESSION['currentuser']))
{
    if(isset($_POST['bookit']))
    {
        echo "passed if1";
        if(strtotime($_POST['fromDate']) <= strtotime(date('Y/m/d')))
        {
            echo "passed if2";
            if (strtotime($_POST['fromDate']) <= strtotime($_POST['toDate']))
            {
                echo "passed if3";
                $connection = new Connection();
                $connection->openConnection();
                $price = ($_POST['fromDate'] - $_POST['toDate'] * 35) * $_POST['persons'];
                $persons = $_POST['persons'];
                $fromDate = $_POST['fromDate'];
                $toDate = $_POST['toDate'];
                $creationDate = date('Y/m/d');
                $connection->addBooking($_POST['email'], $persons, $fromDate, $toDate, $price, $creationDate);
                $connection->closeConnection();
                echo "added";
            }
        }
    }
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
    <link rel="stylesheet" href="css/styleRegister.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Rural</title>
</head>
<header>
    <nav id ='nav'">
    <div class="logo">
        <h4><a href="index.php">Scape</a></h4>
    </div>
    <ul class="nav-link" id="navul">
        <li> <a href="#" class="link">Booking</a></li>
        <li> <a href="#" class="link">About us</a></li>
        <li> <a href="login.php" class="link">Login</a></li>
        <li> <a href="register.php" class="link">Register</a></li>
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
    <form id="formReg" method="post">
        <p id="errorText" class ="errortext" hidden>Make sure passwords coincide and that you're using the right email</p>
        <h1>book scape's house!</h1>
        <div class="data">
            <label for="email">Mail: </label>
            <?php
            echo'<input class ="inputs" type="text" id ="email" placeholder="Enter email" name="email" value=' . $_SESSION['currentuser']['email'] .' readonly>';
            ?>
            <label for="persons">Guests: </label>
            <input type="number" class="inputs" id="persons" min="1" max="10" required>
            <label for="fromDate">From: </label>
            <?php
            $end = date('Y/m/d',strtotime("+2 years"));
            echo'<input class ="inputs" type="date" id ="fromDate" name="fromDate" min=' . date("Y/m/d") .' max= ' . $end . '  required>';
            ?>
            <label for="toDate">To: </label>
            <?php
            echo'<input class ="inputs" type="date" id ="toDate" name="toDate" min=' . date("Y/m/d") .' max='. $end . ' required    >';
            ?>
            <input type="submit" value="Book it!" id="bookit" name="bookit">
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
