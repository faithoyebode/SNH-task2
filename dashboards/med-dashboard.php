<?php 
    include_once('../lib/header.php');
?>
<?php 
    include_once('dashboard.php');
?>
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" style="display: inline-block; margin: 10px 0px 50px 35px; ">
    <button type="submit" name="view-appointments" class="btn btn-outline-success">View Appointments</button>
</form>
<?php 
    if(isset($_POST["view-appointments"])){
?>      
        <table  class="table">
            <tr>
                <th>Patient ID</th>
                <th>Patient Name</th>
                <th>Patient Email</th>
                <th>Date of Appointment</th>
                <th>Time of Appointment</th>
                <th>Nature of Appointment</th>
                <th>Initial Complaint</th>
                <th>Department</th>
            </tr>
            <?php
                $allAppointments = scandir("../db/appointments/");
                $countAllAppointments = count($allAppointments);
                for ($counter=0; $counter < $countAllAppointments; $counter++){
                    $currentAppointment = $allAppointments[$counter];
                    if(strpos($currentAppointment, 'json') != false){
                        $appointmentString=file_get_contents("../db/appointments/" . $currentAppointment);
                        $appointmentObject = json_decode($appointmentString);
                        if($appointmentObject->department == $_SESSION['department']){
                            $id = $appointmentObject->id;
                            $fullname = $appointmentObject->fullname;
                            $email = $appointmentObject->email;
                            $date = $appointmentObject->date;
                            $time = $appointmentObject->time;
                            $nature = $appointmentObject->nature;
                            $complaint = $appointmentObject->complaint;
                            $department = $appointmentObject->department;
                            echo "<tr><td>$id</td><td>$fullname</td><td>$email</td><td>$date</td><td>$time</td><td>$nature</td><td>$complaint</td><td>$department</td></tr>";
                        }else{
                            echo "<tr><td colspan='8'>You have no pending appointments</td></tr>";
                        }
                    }
                    
                }
            }
            ?>
        </table>
<?php
    include_once('../lib/footer.php');
?>
