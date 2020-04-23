<?php 
    include_once('lib/header.php');
    if(!isset($_GET['token']) && !isset($_SESSION['token'])){
        $_SESSION['error'] = "You are not authorized to view that page";
        header("Location: login.php");
        die();
    }
?>
    <h3>Reset password </h3>
    <p>Reset password associated with your account</p>
    <form action="processes/processreset.php" method="POST">
        <p>
            <?php
                if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
                    echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                    #session unset
                   session_destroy();
                }
            ?>
        </p>
        <input 
            <?php 
                if(isset($_SESSION['token'])){
                    echo "value='" . $_SESSION['token'] . "'";
                }else{
                    echo "value='" . $_GET['token'] . "'";
                }
            ?>
        
        type="hidden" name='token' />
        <p>
            <label>Email</label><br />
            <input type="text" name="email" placeholder="Email"/>
        </p>
        <p>
            <label>Enter New Password</label><br />
            <input type="password" name="password" placeholder="Password" autocomplete="off"/>
        </p>
        <p>
            <button type="submit">Send Reset Code</button>
        </p>
    </form>
<?php 
    include_once('lib/footer.php');
?>