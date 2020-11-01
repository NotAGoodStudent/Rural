<?php
include 'connection/Connection.php';
if(isset($_POST['register']))
{
    $connection = new Connection();
    $canadd = true;
    $connection->openConnection();
    $users = $connection->getUsers();
    if(!is_null($users))
    {
        foreach ($users as $u) {
            if ($u['email'] == $_POST['email'])
            {
                $canadd = false;
                break;
            }
        }
    }

    if($canadd && $_POST['password'] == $_POST['password2'])
    {
        $date = date("Y/m/d");
        $connection->addUser($_POST['email'], $_POST['name'], $_POST['surname'], $_POST['password'], $date);
        $connection->closeConnection();
        header('location: login.php');
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
    <nav>
    <div class="logo">
        <h4><a href="index.php">Scape</a></h4>
    </div>
    <ul class="nav-link" id="navul">
        <li> <a href="#" class="link">Booking</a></li>
        <li> <a href="#" class="link">About us</a></li>
        <li> <a href="login.php" class="link">Login</a></li>
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
        <h1>register</h1>
        <div class="data">
            <label for="email">Email: </label>
            <input class ="inputs" type="text" id ="email" placeholder="Enter email" name="email" required>
            <label for="name">Name: </label>
            <input class ="inputs" type="text" id ="name" placeholder="Enter name" name="name" required>
            <label for="surname">surname: </label>
            <input class ="inputs" type="text" id ="surname" placeholder="Enter surname" name="surname" required>
            <label for="password">Password: </label>
            <input class ="inputs" type="password" id="password" placeholder="Enter password" name="password" required>
            <label for="password2">Password: </label>
            <input class ="inputs" type="password" id="password2" placeholder="Re-enter password" name="password2" required>
            <input type="submit" name="register" value="Register!">
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
