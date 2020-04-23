<?php 
    include_once('../lib/header.php');
?>
<?php 
    include_once('dashboard.php');
?>
<form method="POST" action="../paybill.php" style="display: inline-block;">
        <button type="submit" name="submit" class="btn btn-outline-warning">Pay Bill</button>
</form>
<form method="POST" action="../bookappointment.php" style="display: inline-block; margin: 10px 0px 50px 35px; ">
    <button type="submit" name="submit" class="btn btn-outline-success">Book Appointment</button>
</form>
<?php
    include_once('../lib/footer.php');
?>