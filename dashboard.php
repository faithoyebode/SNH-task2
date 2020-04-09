<?php 
    if(!isset($_SESSION['loggedIn'])){
        //redirect to dashboard
        header("Location: login.php");
    }
?>
    <h3><?php echo$_SESSION['role']?> Dashboard</h3>
    <p>Welcome, <?php echo $_SESSION['fullname']?>,  You are logged in.</p>
    <p> 
        User Access Level : <?php echo$_SESSION['role']?> <br /> ID is <?php echo $_SESSION['loggedIn']?>.
    </p>
    <p>
        Your department is  <?php echo $_SESSION['department']?>
    </p>
    <?php 
    if($_SESSION['lastLogDate'] != "" && $_SESSION['lastLogTime'] != ""){
    ?>
        <p>
            The last time you logged in was on  <?php echo $_SESSION['lastLogDate']?> at <?php echo $_SESSION['lastLogTime']?>
        </p>
    <?php } ?>
    <p>
        Your present login time is  <?php echo $_SESSION['logInTime']?>
    </p>
    <p>
        Your present login date is <?php echo $_SESSION['logInDate']?>
    </p>
