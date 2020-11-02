<?php
session_start();
$_SESSION['currentuser'] = null;
header('location: index.php');
?>