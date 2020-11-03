<?php
include 'connection/Connection.php';
session_start();

$_SESSION['currentuser'];
if(isset($_GET['login']))
{
    $connection = new Connection();
    $connection->openConnection();
    $users = $connection->getUsers();
    $logged = false;

    if(!is_null($users))
    {
        foreach ($users as $u)
        {
            if ($u['email'] == $_GET['email'] && $u['password'] == $_GET['password']) {
                $_SESSION['currentuser'] = $u;
                header('location: booking.php');
                $logged = true;
                break;
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
        <li> <a href="#" class="link">Services</a></li>
        <li> <a href="#" class="link">About us</a></li>
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
    <form action="" method="get" id="formReg">
        <h1>Login</h1>
        <div class="data">
            <label for="email">Email: </label>
            <input class ="inputs" type="text" id ="email" placeholder="Enter email" name="email" required>
            <label for="password">Password: </label>
            <input class ="inputs" type="password" id="password" placeholder="Enter password" name="password" required>
            <input type="submit" name="login" value="Login!">
            <?php
            if(isset($_GET['login'])) {
                if (!$logged) {
                    echo "<p style='margin-left: 35%; color: #FF8C00'>Wrong credentials introduced</p>";
                }
            }
            ?>
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