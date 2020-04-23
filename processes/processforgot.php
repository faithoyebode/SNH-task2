<?php session_start(); 
    //collecting data
    $errorCount = 0;

    $email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
    $_SESSION['email'] = $email; 

    if($errorCount > 0){
        //If the email field is blank, show an error message and prevent any further action
        $session_error = "You have " . $errorCount . " error";
        if($errorCount > 1){
            $session_error .= "s";
        }
        $session_error .= " in your form submission";
        $_SESSION["error"] = $session_error;
        
        header("Location: ../forgot.php");
    }else{
        //If the email field is not blank, execute this block
        $allUsers = scandir("../db/users/");
        $countAllUsers = count($allUsers);
        for ($counter=0; $counter < $countAllUsers; $counter++){
            $currentUser = $allUsers[$counter];
            if($currentUser == $email . ".json"){
                //send the mail and redirect to the password page
               
                /* 
                GENERATING TOKEN CODE STARTS
                */

                $token = "";

                $alphabets = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']; 

                for($i=0; $i<20; $i++){
                    // get random number. The maximum value of the random number should be equal to the last index on the alphabet
                    //get element in alphabets at the index of random number
                    $index = mt_rand(0, count($alphabets)-1);
                    $token .= $alphabets[$index];  
                }
                
                /*
                * Token Generation Ends
                */

                $subject = "Password Reset Link";
                $message = "A password reset has been initiated from your account, if you
                did not initiate this reset, please ignore this message, otherwise, visit:  localhost//startng-php-task2/reset.php?token=".
                $token;  
                $headers = "From: no-reply@snh.org" ;
                file_put_contents("../db/tokens/" . $email . ".json", json_encode(['token'=>$token]));
                $try = mail($email,$subject,$message,$headers);
                if($try){  
                    //display a success message
                    $_SESSION['message'] = "Password reset has been sent to your email: " . $email;
                    header("Location: ../login.php");
                }else{
                    
                    //display error message 
                    $_SESSION['error'] = "Something went wrong, we could not send password reset to: " . $email;
                    header("Location: ../forgot.php");
                }
                die();
            }
        }
        //If after goung through all the email records in the database, the user's email is not found
        //the user will be redirected back to the forgot password page and an error message will be shown  
        $_SESSION['error'] = "Email not registered with us ERR: " . $email;
        header("Location: ../forgot.php");
       
    }
?>