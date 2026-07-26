<?php
include("../incudes/auth.php");
include("../incudes/db.php");

$slot_no = "";

if(isset($_GET['slot']))
{
    $slot_no = $_GET['slot'];
}

if(isset($_POST['book']))
{
    $slot_no = $_POST['slot_no'];
    $user_id = $_SESSION['id'];

    $vehicle_number = $_POST['vehicle_number'];
    $vehicle_type = $_POST['vehicle_type'];

    $booking_date = $_POST['booking_date'];
    $entry_time = $_POST['entry_time'];
    $exit_time = $_POST['exit_time'];

    $parking_type = $_POST['parking_type'];

    // Calculate Amount

    if($parking_type=="month pass")
    {
        $amount = 250;
    }
    else
    {
        $hours = (strtotime($exit_time)-strtotime($entry_time))/3600;

        if($hours<=0)
        {
            $hours=1;
        }

        $amount = $hours*5;
    }

    $sql = "INSERT INTO bookings
    (user_id,slot_no,vehicle_number,vehicle_type,
    booking_date,entry_time,exit_time,
    parking_type,amount,status)

    VALUES

    ('$user_id','$slot_no','$vehicle_number','$vehicle_type',
    '$booking_date','$entry_time','$exit_time',
    '$parking_type','$amount','pending')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>
        alert('Booking Submitted Successfully');
        window.location='history.php';
        </script>";
        exit();
    }
}

include("../incudes/header.php");
?>

<div class="register-container">

<h2>Book Parking Slot</h2>

<form method="POST">

<input
type="hidden"
name="slot_no"
value="<?php echo $slot_no;?>">

<label>Slot Number</label>

<input
type="text"
value="<?php echo $slot_no;?>"
readonly>

<label>Vehicle Number</label>

<input
type="text"
name="vehicle_number"
required>

<label>Vehicle Type</label>

<select name="vehicle_type" required>

<option value="">Select</option>

<option value="two wheeler">Two Wheeler</option>

<option value="four wheeler">Four Wheeler</option>

</select>

<label>Booking Date</label>

<input
type="date"
name="booking_date"
required>

<label>Entry Time</label>

<input
type="time"
name="entry_time"
required>

<label>Exit Time</label>

<input
type="time"
name="exit_time"
required>

<label>Parking Type</label>

<select
name="parking_type"
required>

<option value="">Select</option>

<option value="hourly">Hourly</option>

<option value="month pass">Monthly Pass</option>

</select>

<button
type="submit"
name="book">

Book Parking

</button>

</form>

</div>

<?php
include("../incudes/footer.php");
?>