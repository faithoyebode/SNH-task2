<?php include_once('lib/header.php'); 
if(isset($_SESSION['loggedIn']) && isset($_SESSION['addUser'])){
    //redirect to dashboard
    header("Location: register.php");
}elseif(isset($_SESSION['loggedIn']) && !isset($_SESSION['addUser'])){
    header("Location: dashboard.php");
}
?>
<h3>Login</h3>
    <!--<p>
        //<?php
           // if(isset($_SESSION['message'])){
           //     echo "<span style='color:red'>" . $_SESSION['message'] . "</span>";
                    
             //   }
        //?>
    </p>-->
     
    <form method="POST" action="processlogin.php">
        <p>
            <?php
                if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
                    echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                }
            ?>
        </p>
        
        <p>
            <label>Email</label><br />
            <input 
            <?php
                if(isset($_SESSION['email'])){
                   echo "value=" . $_SESSION['email'];
                }
            ?>
            type="text" name="email" placeholder="Email"/>
        </p>
        <p>
            <label>Password</label><br />
            <input type="password" name="password" placeholder="Password"/>
        </p>
        
        <p>
            <button type="submit">Login</button>
        </p>
    </form>

<?php include_once('lib/footer.php'); ?>