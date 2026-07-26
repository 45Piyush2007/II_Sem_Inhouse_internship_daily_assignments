<?php
include("../incudes/auth.php");
include("../incudes/db.php");
include("../incudes/header.php");
?>

<div class="dashboard">

<h1>My Booking History</h1>

<table>

<tr>

<th>Booking ID</th>
<th>Slot No</th>
<th>Vehicle Number</th>
<th>Vehicle Type</th>
<th>Booking Date</th>
<th>Entry Time</th>
<th>Exit Time</th>
<th>Parking Type</th>
<th>Amount</th>
<th>Status</th>

</tr>

<?php

$user_id = $_SESSION['id'];

$result = mysqli_query($conn,"SELECT * FROM bookings WHERE user_id='$user_id' ORDER BY booking_id DESC");

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['booking_id']; ?></td>

<td><?php echo $row['slot_no']; ?></td>

<td><?php echo $row['vehicle_number']; ?></td>

<td><?php echo ucfirst($row['vehicle_type']); ?></td>

<td><?php echo $row['booking_date']; ?></td>

<td><?php echo $row['entry_time']; ?></td>

<td><?php echo $row['exit_time']; ?></td>

<td><?php echo ucfirst($row['parking_type']); ?></td>

<td>₹<?php echo $row['amount']; ?></td>

<td>

<?php

if($row['status']=="approved")
{
    echo "<span style='color:green;font-weight:bold;'>Approved</span>";
}
elseif($row['status']=="pending")
{
    echo "<span style='color:orange;font-weight:bold;'>Pending</span>";
}
else
{
    echo "<span style='color:red;font-weight:bold;'>Rejected</span>";
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