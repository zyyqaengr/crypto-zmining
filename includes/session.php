<?php session_start(); ?>

<?php 
    if(!isset($_SESSION['id'])) {
        header("Location: login.php");
    }

 ?>