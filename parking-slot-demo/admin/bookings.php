<?php
include("../incudes/auth.php");
include("../incudes/db.php");

// Approve Booking
if(isset($_GET['approve']))
{
    $booking_id = $_GET['approve'];

    // Get slot number
    $booking = mysqli_query($conn,"SELECT * FROM bookings WHERE booking_id='$booking_id'");
    $data = mysqli_fetch_assoc($booking);

    $slot_no = $data['slot_no'];

    // Update booking status
    mysqli_query($conn,"UPDATE bookings SET status='approved' WHERE booking_id='$booking_id'");

    // Update slot status
    mysqli_query($conn,"UPDATE parking_slots SET status='occupied' WHERE slot_no='$slot_no'");

    header("Location: bookings.php");
    exit();
}

// Reject Booking
if(isset($_GET['reject']))
{
    $booking_id = $_GET['reject'];

    mysqli_query($conn,"UPDATE bookings SET status='rejected' WHERE booking_id='$booking_id'");

    header("Location: bookings.php");
    exit();
}

include("../incudes/header.php");
?>

<div class="dashboard">

<h1>Manage Bookings</h1>

<table>

<tr>

<th>Booking ID</th>
<th>User ID</th>
<th>Slot</th>
<th>Vehicle Number</th>
<th>Vehicle Type</th>
<th>Date</th>
<th>Entry</th>
<th>Exit</th>
<th>Parking Type</th>
<th>Amount</th>
<th>Status</th>
<th>Action</th>

</tr>

<?php

$result = mysqli_query($conn,"SELECT * FROM bookings ORDER BY booking_id DESC");

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['booking_id']; ?></td>

<td><?php echo $row['user_id']; ?></td>

<td><?php echo $row['slot_no']; ?></td>

<td><?php echo $row['vehicle_number']; ?></td>

<td><?php echo ucfirst($row['vehicle_type']); ?></td>

<td><?php echo $row['booking_date']; ?></td>

<td><?php echo $row['entry_time']; ?></td>

<td><?php echo $row['exit_time']; ?></td>

<td><?php echo ucfirst($row['parking_type']); ?></td>

<td>₹<?php echo $row['amount']; ?></td>

<td><?php echo ucfirst($row['status']); ?></td>

<td>

<?php

if($row['status']=="pending")
{

?>

<a href="bookings.php?approve=<?php echo $row['booking_id']; ?>">

<button>Approve</button>

</a>

<a href="bookings.php?reject=<?php echo $row['booking_id']; ?>">

<button>Reject</button>

</a>

<?php

}
else
{

echo "<strong>Completed</strong>";

}

?>

</td>

</tr>

<?php

}

?>

</table>

</div>

<?php
include("../incudes/footer.php");
?>