 <?php session_start(); 
    //collecting data
    $errorCount = 0;

    /*$first_name = $_POST['first_name'] != "" ? $_POST['first_name'] : $errorCount++;
    $last_name = $_POST['last_name'] != "" ? $_POST['last_name'] : $errorCount++;
    $email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
    $password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;
    $gender = $_POST['gender'] != "" ? $_POST['gender'] : $errorCount++;
    $designation = $_POST['designation'] != "" ? $_POST['designation'] : $errorCount++;
    $department = $_POST['department'] != "" ? $_POST['department'] : $errorCount++;
    */
    if($_POST['first_name'] != ""){
        $first_name = $_POST['first_name'];
    }else{
        $errorCount++;
    }
    if($_POST['last_name'] != ""){
        $last_name = $_POST['last_name'];
    }else{
        $errorCount++;
    }
    if($_POST['email'] != ""){
        $email = $_POST['email'];
    }else{
        $errorCount++;
    }
    if($_POST['password'] != ""){
        $password = $_POST['password'];
    }else{
        $errorCount++;
    }
    if(!empty($_POST['gender']) ){
        $gender = $_POST['gender'];
    }else{
        $errorCount++;
    }
    if(!empty($_POST['designation'])){
        $designation = $_POST['designation'];
    }else{
        $errorCount++;
    }
    if($_POST['department'] != ""){
        $department = $_POST['department'];
    }else{
        $errorCount++;
    }
    $_SESSION['first_name'] = $first_name; 
    $_SESSION['last_name'] = $last_name; 
    $_SESSION['email'] = $email; 
    $_SESSION['password'] = $password; 
    $_SESSION['gender'] = $gender; 
    $_SESSION['designation'] = $designation; 
    $_SESSION['department'] = $department;
    $nameErrorMsg = []; 


    if($errorCount > 0){
        //if any of the field is blank, execute this code
        $session_error = "You have " . $errorCount . " blank field";
        if($errorCount > 1){
            $session_error .= "s";
        }
        $session_error .= " in your form submission";
        $_SESSION["error"] = $session_error;
        if ($_POST['first_name'] == "" ){
            $nameErrorMsg['blank'] = "Name cannot be blank";
            $_SESSION['blankName'] = $nameErrorMsg['blank'];
        }
        if (strlen($_POST['first_name']) < 2 ){
            $nameErrorMsg['lessThanTwo'] = "Name should not be less than 2 characters";
            $_SESSION['lessThanTwo'] = $nameErrorMsg['lessThanTwo'];
        }
        if(isset($_POST['first_name'])){
            $arr = str_split($_POST['first_name']);
            $countArr = count($arr);
            for ($counter=0; $counter < $countArr; $counter++){
                if(is_numeric($arr[$counter])){
                    $nameErrorMsg['noNumber'] = "Name should not have numbers";
                    $_SESSION['noNumber'] = $nameErrorMsg['noNumber'];
                }
            }
        }

        if ($_POST['last_name'] == "" ){
            $nameErrorMsg['blankL'] = "Name cannot be blank";
            $_SESSION['blankNameL'] = $nameErrorMsg['blankL'];
        }
        if (strlen($_POST['last_name']) < 2 ){
            $nameErrorMsg['lessThanTwoL'] = "Name should not be less than 2 characters";
            $_SESSION['lessThanTwoL'] = $nameErrorMsg['lessThanTwoL'];
        }
        if(isset($_POST['last_name'])){
            $arrL = str_split($_POST['last_name']);
            $countArrL = count($arrL);
            for ($counter=0; $counter < $countArrL; $counter++){
                if(is_numeric($arrL[$counter])){
                    $nameErrorMsg['noNumberL'] = "Name should not have numbers";
                    $_SESSION['noNumberL'] = $nameErrorMsg['noNumberL'];
                }
            }
        }

        if ($_POST['email'] == "" ){
            $emailErrorMsg['blank'] = "Email must not be empty";
            $_SESSION['blankMail'] = $emailErrorMsg['blank'];
        }
        if (strlen($_POST['email']) < 5 ){
            $emailErrorMsg['lessThanFive'] = "Email must not be less than 5 characters";
            $_SESSION['lessThanFive'] = $emailErrorMsg['lessThanFive'];
        }
        if(isset($_POST['email'])){
            $atChars=false;
            $dotChars=false;
            $earr = str_split($_POST['email']);
            $countEarr = count($earr);
            for($counter=0; $counter < $countEarr; $counter++){
                if($earr[$counter] == "@"){$atChars = true;}
                if($earr[$counter] == "."){$dotChars = true;}   
            }
            if($atChars == false || $dotChars == false){
                $emailErrorMsg['mustHave'] = "Email must have @ and . in it";
                $_SESSION['mustHave'] = $emailErrorMsg['mustHave'];
            }
        }
        if(filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL) == FALSE){
            $emailErrorMsg['invalidMail'] = "Your email input is invalid";
            $_SESSION['invalidMail'] = $emailErrorMsg['invalidMail'];

        }
        header("Location: register.php");
    }else{
         //if every field is filled, execute this code
        if(isset($_POST['first_name'])){
            $arr = str_split($_POST['first_name']);
            $countArr = count($arr);
            for ($counter=0; $counter < $countArr; $counter++){
                if(is_numeric($arr[$counter])){
                    $nameErrorMsg['noNumber'] = "Name should not have numbers";
                    $_SESSION['noNumber'] = $nameErrorMsg['noNumber'];
                }
            }
        }
        if (strlen($_POST['first_name']) < 2){
            $nameErrorMsg['lessThanTwo'] = "Name should not be less than 2";
            $_SESSION['lessThanTwo'] = $nameErrorMsg['lessThanTwo'];   
        }

        if(isset($_POST['last_name'])){
            $arrL = str_split($_POST['last_name']);
            $countArrL = count($arrL);
            for ($counter=0; $counter < $countArrL; $counter++){
                if(is_numeric($arrL[$counter])){
                    $nameErrorMsg['noNumberL'] = "Name should not have numbers";
                    $_SESSION['noNumberL'] = $nameErrorMsg['noNumberL'];
                }
            }
        }
        if (strlen($_POST['last_name']) < 2 ){
            $nameErrorMsg['lessThanTwoL'] = "Name should not be less than 2 characters";
            $_SESSION['lessThanTwoL'] = $nameErrorMsg['lessThanTwoL'];
        }

        if (strlen($_POST['email']) < 5 ){
            $emailErrorMsg['lessThanFive'] = "Email must not be less than 5 characters";
            $_SESSION['lessThanFive'] = $emailErrorMsg['lessThanFive'];
        }
        if(isset($_POST['email'])){
            $atChars=false;
            $dotChars=false;
            $earr = str_split($_POST['email']);
            $countEarr = count($earr);
            for($counter=0; $counter < $countEarr; $counter++){
                if($earr[$counter] == "@"){$atChars = true;}
                if($earr[$counter] == "."){$dotChars = true;}   
            }
            if($atChars == false || $dotChars == false){
                $emailErrorMsg['mustHave'] = "Email must have @ and . in it";
                $_SESSION['mustHave'] = $emailErrorMsg['mustHave'];
            }
        }
        if(filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL) == FALSE){
            $emailErrorMsg['invalidMail'] = "Your email input is invalid";
            $_SESSION['invalidMail'] = $emailErrorMsg['invalidMail'];

        }
        // if there is any validation error and there is no blank field, prevent the user from registering
        if(isset($_SESSION['lessThanTwo']) || isset($_SESSION['noNumber']) || isset($_SESSION['lessThanTwoL']) 
        || isset($_SESSION['noNumberL']) || isset($_SESSION['lessThanFive']) || isset($_SESSION['mustHave']) 
        || isset($_SESSION['invalidMail'])){
            header("Location: register.php");
            die();
        }
        $allUsers = scandir("db/users/");
        $countAllUsers = count($allUsers);
        $newUserId = ($countAllUsers-2) + 1;
        $userObject= [
            'id'=>$newUserId,
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'email'=>$email,
            'password'=>password_hash($password,PASSWORD_DEFAULT),
            'gender'=>$gender,
            'designation'=>$designation,
            'department'=>$department                                                                                                                                                                                                                

        ];
        
        for ($counter=0; $counter < $countAllUsers; $counter++){
            $currentUser = $allUsers[$counter];
            if($currentUser == $email . ".json"){
                $_SESSION['error'] = "Registration failed, User already exist" ;
                header("Location: register.php");
                die();

            }
        }
       

        file_put_contents("db/users/" . $email . ".json", json_encode($userObject));
        $_SESSION['message'] = "Registration Successful, you can now login! " . $first_name ;
        if(isset($_SESSION['loggedIn']) && isset($_SESSION['addUser'])){
            $_SESSION['UserAdded'] = true;
            header("Location: sup-dashboard.php");
        }else{
        header("Location: login.php");}
    }
    



    //saving data into the database
 ?>  