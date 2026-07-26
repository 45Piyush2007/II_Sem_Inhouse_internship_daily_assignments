<?php
include("../incudes/auth.php");
include("../incudes/db.php");
include("../incudes/header.php");

// Default query
$sql = "SELECT * FROM parking_slots WHERE status='available'";

// Filter by vehicle type
if(isset($_GET['vehicle_type']) && $_GET['vehicle_type'] != "")
{
    $vehicle_type = $_GET['vehicle_type'];

    $sql = "SELECT * FROM parking_slots
            WHERE status='available'
            AND vehicle_type='$vehicle_type'";
}

$result = mysqli_query($conn,$sql);

?>

<div class="dashboard">

<h1>Search Available Parking Slots</h1>

<form method="GET">

<label>Select Vehicle Type</label>

<select name="vehicle_type">

<option value="">All</option>

<option value="two wheeler">Two Wheeler</option>

<option value="four wheeler">Four Wheeler</option>

</select>

<button type="submit">
Search
</button>

</form>

<br>

<table>

<tr>

<th>Slot Number</th>
<th>Vehicle Type</th>
<th>Status</th>
<th>Book</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['slot_no']; ?></td>

<td><?php echo ucfirst($row['vehicle_type']); ?></td>

<td><?php echo ucfirst($row['status']); ?></td>

<td>

<a href="booking.php?slot=<?php echo $row['slot_no']; ?>">

<button>
Book
</button>

</a>

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