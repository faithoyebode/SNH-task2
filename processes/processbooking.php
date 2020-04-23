<?php session_start();
    $date = $_POST['date'];
    $time = $_POST['time'];
    $nature = $_POST['nature'];
    $complaint = $_POST['complaint'];
    $department = $_POST['department'];
    $email = $_SESSION['email'];
    $fullname = $_SESSION['fullname'];

    $allAppointments = scandir("../db/appointments/");
    $countAllAppointments = count($allAppointments);
    $newAppointmentId = ($countAllAppointments-2) + 1;
    $appointmentObject= [
        'id'=>$newAppointmentId,
        'fullname'=>$fullname,
        'email'=>$email,
        'date'=>$date,
        'time'=>$time,
        'nature'=>$nature,
        'complaint'=>$complaint,
        'department'=>$department,                                                                                                                                                                                                              

    ];
    
    file_put_contents("../db/appointments/" . $email . ".json", json_encode( $appointmentObject));
    $_SESSION['message'] = "You have successfully booked an appointment";
    header("Location: ../dashboards/pat-dashboard.php");

?>