 <?php
    //collecting data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $designation = $_POST['designation'];
    $department = $_POST['department'];
    
    $errorArray = [];

    //verifying data
    if($first_name == ""){
        $errorArray = 'First_name cannot be blank';
    }

    print_r($errorArray);


    //saving data into the database
 ?> 