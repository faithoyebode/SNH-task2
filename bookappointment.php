<?php 
    include_once('lib/header.php');
?>
<h5 class="mt-5">Book Appointment</h5>
<form method="POST" action="processes/processbooking.php" class="w-50">
        <p class="form-group">
            <label>Date of Appointment</label><br />
            <input type="date" name="date" placeholder="Email" class="form-control" required/>
        </p>
        <p class="form-group">
            <label for="time">Time of Appointment</label><br />
            <input type="time" name="time" placeholder="Password" class="form-control" required/>
        </p>
        <p class="form-group">
            <label>Nature of Appointment</label><br />
            <input type="text" name="nature" placeholder="Nature" class="form-control" required/>
        </p>
        <p class="form-group">
            <label>Initial Complaint</label><br />
            <input type="text" name="complaint" placeholder="Complaint" class="form-control" required/>
        </p>
        <p class="form-group">
            <label>Department to book</label><br />
            <input type="text" name="department" placeholder="Department" class="form-control" required/>
        </p>
        
        <p>
            <button type="submit" class="form-control btn btn-success">Book</button>
        </p>
    </form>

<?php
    include_once('lib/footer.php');
?>