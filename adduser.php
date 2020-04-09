<?php session_start();
if(isset($_POST['submit'])){
    $_SESSION['addUser'] = true;
    header("Location: register.php");
}

?>