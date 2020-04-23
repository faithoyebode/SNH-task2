<?php 
    include_once('../lib/header.php');
    function addUser(){
        $_SESSION['addUser'] = true;
    }
?>
<p style="color: green">
    <?php if(isset($_SESSION['UserAdded'])){
        echo "You've just added a user";
        unset($_SESSION['UserAdded']);
        unset($_SESSION['addUser']);  
    }?>
</p>
<?php 
    include_once('dashboard.php');
?>
<form method="POST" action="adduser.php">
<p style="margin-top : 30px; margin-bottom : 30px;  display: inline-block;">
    <button type="submit" name="submit" class="btn btn-warning">Add Users</button>
</p>
</form>
<p>
    <?php
        include_once('../viewusers.php');
    ?>
</p>
<?php
    include_once('../lib/footer.php');
?>