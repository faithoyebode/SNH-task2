<?php 
    include_once('lib/header.php');
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
<p style="margin-top : 50px; margin-bottom : 50px;  display: inline-block;">
    <button type="submit" name="submit" style="border: none; color: white; background-color: red; padding: 10px;">Add Users</button>
</p>
</form>

<?php
    include_once('lib/footer.php');
?>