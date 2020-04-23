<h5>View All Staff</h5>
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <p style= "margin-bottom : 30px;  display: inline-block;">
        <button type="submit" name="view-staff" class="btn btn-success">View Staff</button>
    </p>
</form>
<?php 
    if(isset($_POST["view-staff"])){
?>      
        <table  class="table">
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Role</th>
        </tr>
        <?php
            $allUsers = scandir("../db/users/");
            $countAllUsers = count($allUsers);
            for ($counter=0; $counter < $countAllUsers; $counter++){
                $currentUser = $allUsers[$counter];
                if(strpos($currentUser, 'json') != false){
                    $userString=file_get_contents("../db/users/" .$currentUser);
                    $userObject = json_decode($userString);
                    if($userObject->designation == "Medical Team (MT)"){
                        $firstname = $userObject->first_name;
                        $lastname = $userObject->last_name;
                        $role = $userObject->designation;
                        echo "<tr><td>$firstname</td><td>$lastname</td><td>$role</td></tr>";
                    }
                }
                
            }
        }
        ?>
        </table>
<h5>View Patients</h5>
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <p style= "margin-bottom : 30px;  display: inline-block;">
        <button type="submit" name="view-patients" class="btn btn-info">View Patients</button>
    </p>
</form>
<?php 
    if(isset($_POST["view-patients"])){
?>      
        <table  class="table">
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Role</th>
            </tr>
        <?php
            $allUsers = scandir("../db/users/");
            $countAllUsers = count($allUsers);
            for ($counter=0; $counter < $countAllUsers; $counter++){
                $currentUser = $allUsers[$counter];
                if(strpos($currentUser, 'json') != false){
                    $userString=file_get_contents("../db/users/" .$currentUser);
                    $userObject = json_decode($userString);
                    if($userObject->designation == "Patients"){
                        $firstname = $userObject->first_name;
                        $lastname = $userObject->last_name;
                        $role = $userObject->designation;
                        echo "<tr><td>$firstname</td><td>$lastname</td><td>$role</td></tr>";
                    }
                    
                }
                
            }
        }
        ?>
        </table>
