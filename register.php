<?php include_once('lib/header.php');
//if(isset($_SESSION['loggedIn']) && isset($_SESSION['addUser'])){
    
     
//}
if(isset($_SESSION['loggedIn']) && !isset($_SESSION['addUser'])){
    //redirect to dashboard
    header("Location: dashboard.php");
}
?>
    <p><strong><?php if(isset($_SESSION['addUser'])){
                echo "Add User";
            }else{
                echo "Welcome, Please Register";
            }?>
        </strong></p>
    <p>All fields are required </p>

    <form method="POST" action="processregister.php">
        <p>
            <?php
                if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
                    echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                }
            ?>
        </p>
        <p>
            <?php
            /********************** 
             * FIRST NAME;
             * ***************/
            ?>
            <label>First Name</label><br />
            <input 
            <?php
                if(isset($_SESSION['first_name'])){
                   echo "value=" . $_SESSION['first_name'];
                }
            ?>
            type="text" name="first_name" placeholder="First Name"/>
            <p>
                <?php
                    if(isset($_SESSION['noNumber'])){
                        echo "<span style='color:red'>" . $_SESSION['noNumber']  . "</span>";
                    }
                ?>
            </p>
            <p>
                <?php
                    if(isset($_SESSION['lessThanTwo'])){
                        echo "<span style='color:red'>" . $_SESSION['lessThanTwo'] . "</span>";
                    }
                ?>
            </p>
            <p>
                <?php
                    if(isset($_SESSION['blankName'])){
                        echo "<span style='color:red'>" . $_SESSION['blankName'] . "</span>";
                    }
                ?>
            </p>
        </p>
        <p>
        <?php
            /********************** 
             * LAST NAME;
             * ***************/
        ?>
            <label>Last Name</label><br />
            <input 
            <?php
                if(isset($_SESSION['last_name'])){
                   echo "value=" . $_SESSION['last_name'];
                }
            ?>
            type="text" name="last_name" placeholder="Last Name"/>
        </p>
        <p>
                <?php
                    if(isset($_SESSION['noNumberL'])){
                        echo "<span style='color:red'>" . $_SESSION['noNumberL']  . "</span>";
                    }
                ?>
            </p>
            <p>
                <?php
                    if(isset($_SESSION['lessThanTwoL'])){
                        echo "<span style='color:red'>" . $_SESSION['lessThanTwoL'] . "</span>";
                    }
                ?>
            </p>
            <p>
                <?php
                    if(isset($_SESSION['blankNameL'])){
                        echo "<span style='color:red'>" . $_SESSION['blankNameL'] . "</span>";
                    }
                ?>
            </p>
        </p>
        <p>
        <?php
            /********************** 
             * E--MAIL;
             * ***************/
        ?>
            <label>Email</label><br />
            <input 
            <?php
                if(isset($_SESSION['email'])){
                   echo "value=" . $_SESSION['email'];
                }
            ?>
            type="text" name="email" placeholder="Email"/ autocomplete="off">
            <p>
                <?php
                    if(isset($_SESSION['invalidMail'])){
                        echo "<span style='color:red'>" . $_SESSION['invalidMail']  . "</span>";
                    }
                ?>
            </p>
            <p>
                <?php
                    if(isset($_SESSION['blankMail'])){
                        echo "<span style='color:red'>" . $_SESSION['blankMail'] . "</span>";
                    }
                ?>
            </p>
            <p>
                <?php
                    if(isset($_SESSION['lessThanFive'])){
                        echo "<span style='color:red'>" . $_SESSION['lessThanFive'] . "</span>";
                    }
                ?>
            </p>
            <p>
                <?php
                    if(isset($_SESSION['mustHave'])){
                        echo "<span style='color:red'>" . $_SESSION['mustHave'] . "</span>";
                    }
                ?>
            </p>
        </p>
        <?php
            /********************** 
             * END OF E--MAIL;
             * *******************/
        ?>
        <p>
            <label>Password</label><br />
            <input type="password" name="password" placeholder="Password" autocomplete="off"/>
        </p>
        <p>
            <label>Gender</label><br />
            <select name="gender" >
            <?php
                if(isset($_SESSION['department'])){
                   echo "value=" . $_SESSION['department'];
                }
            ?>
                <option value="">Select One</option>
                <option
                <?php
                if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female'){
                   echo "selected";
                }
                ?>
                >Female</option>
                <option
                <?php
                if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male'){
                   echo "selected";
                }
                ?>>Male</option>
            </select>
        <p>
            <label>Designation</label><br />
            <select name="designation">
                <option value="">Select One</option>
                <option
                <?php
                if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Medical Team (MT)'){
                   echo "selected";
                }
                ?>
                >Medical Team (MT)</option>
                <option
                <?php
                if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patients'){
                   echo "selected";
                }
                ?>
                >Patients</option>
                <option
                <?php
                if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Super Admin'){
                   echo "selected";
                }
                ?>
                >Super Admin</option>
            </select>
        </p>
        <p>
            <label>Department</label><br />
            <input 
            <?php
                if(isset($_SESSION['department'])){
                   echo "value=" . $_SESSION['department'];
                }
            ?>
            type="text" name="department" placeholder="Department"/>
        </p>
        <p>
            <button type="submit"><?php if(isset($_SESSION['addUser'])){
                echo "Add User";
            }else{
                echo "Register";
            }?>
            </button>
        </p>
    </form>

<?php include_once('lib/footer.php');
if(isset($_SESSION['loggedIn']) && !isset($_SESSION['addUser'])){
    session_unset();
    session_destroy();
} 
?>
