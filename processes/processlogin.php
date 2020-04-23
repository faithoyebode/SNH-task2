<?php session_start(); 
    $errorCount = 0;
    //Assign variables to user inputs
    $email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
    $password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;
    $_SESSION['email'] = $email; 
    //if any of the field is empty, execute this
    if($errorCount > 0){
        //this section determines the number of empty fields, output them and prevents login
        $session_error = "You have " . $errorCount . " error";
        if($errorCount > 1) {
            $session_error .= "s";
        }
        $session_error .= " in your form submission";
        //session_error indicates number of blank fields
        $_SESSION["error"] = $session_error;
        header("Location: ../login.php");
    }else{
        // this section processes all the fields if there is no blank one on input
        //get all the user files in the database as an array
        $allUsers = scandir("../db/users/");
        $countAllUsers = count($allUsers);
        for ($counter=0; $counter < $countAllUsers; $counter++){
            $currentUser = $allUsers[$counter];
            if($currentUser == $email . ".json"){
                //check user password
                $userString=file_get_contents("../db/users/" .$currentUser);
                $userObject = json_decode($userString);
                $passwordFromDB = ($userObject->password);
                $passwordFromUser = password_verify($password, $passwordFromDB);

                if($passwordFromDB == $passwordFromUser){
                    //redirect to dashboard
                    date_default_timezone_set("Africa/Lagos");
                    $loginTime = date('h:i:sa');
                    $loginDate = date('d/m/Y');
                    $_SESSION['logInTime'] = $loginTime;
                    $_SESSION['logInDate'] = $loginDate;
                    $_SESSION['lastLogDate'] = $userObject->lastLogDate != '' ? $userObject->lastLogDate : '';
                    $_SESSION['lastLogTime'] = $userObject->lastLogTime != '' ? $userObject->lastLogTime : '';
                    $_SESSION['loggedIn'] = $userObject->id;
                    $_SESSION['fullname'] = $userObject->first_name . " " . $userObject->last_name;
                    $_SESSION['role'] = $userObject->designation;              
                    $_SESSION['department'] = $userObject->department;
                    //Record New Last Login Time and Date
                    $userObject->lastLogTime = $loginTime;
                    $userObject->lastLogDate = $loginDate;
                    file_put_contents("../db/users/" . $currentUser, json_encode($userObject));
                    if($_SESSION['role']=='Medical Team (MT)'){
                        header("Location: ../dashboards/med-dashboard.php");
                        die();
                    }elseif($_SESSION['role']=='Patients'){
                        header("Location: ../dashboards/pat-dashboard.php");
                        die();
                    }elseif($_SESSION['role']=='Super Admin'){
                        header("Location: ../dashboards/sup-dashboard.php");
                        die();
                    }
                    
                    
                }
                 
            }
        }
        $_SESSION['error'] = "Invalid Email or Password" ;
        header("Location: ../login.php");
        die();
    }
?>