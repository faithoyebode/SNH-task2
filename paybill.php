<?php
    include_once('lib/header.php');

    if($_SESSION['role']=='Patients'){
        echo "I wanna pay my bill now!";
        die();
    }
        header("Location: dashboards/pat-dashboard.php");
?>
<?php
    include_once('lib/footer.php');
?>