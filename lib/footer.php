    
    <?php
    // This functions determine the directory of the file in which this module is running
    //and make sure the links are in relation to the file
        /*function path ($url){
            $dir = dirname($_SERVER['PHP_SELF']);
            if($dir != "/startng-php-task2" ){
                echo "../$url";
            }else{
                echo $url;
            }
        }*/
    ?>
        <p>
            <a href=<?php path("index.php"); ?> class="btn btn-primary">Index</a> 
            <?php 
            // if the user is not logged in, hide logout and reset password links
            if(!isset($_SESSION['loggedIn'])){?>
                
            <a href=<?php path("login.php"); ?> class="btn btn-outline-success font-weight-bold">Login</a> 
            <a href=<?php path("register.php"); ?> class="btn btn-outline-primary font-weight-bold">Register</a> 
            <a href=<?php path("forgot.php"); ?> class="btn btn-outline-danger font-weight-bold">Forgot Password</a> 
            <?php }else{?>

            <a href=<?php path("logout.php"); ?> class="btn btn-outline-danger">Logout</a> 
            <a href=<?php path("reset.php"); ?> class="btn btn-outline-primary">Reset Password</a>
            <?php } ?>
            
        </p>
    </div>
</body>
</html> 