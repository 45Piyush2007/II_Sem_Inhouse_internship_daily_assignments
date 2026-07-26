<?php
include("../includes/auth.php");
include("../includes/db.php");
include("../includes/header.php");

// Fetch all parking slots
$result = mysqli_query($conn, "SELECT * FROM parking_slots ORDER BY slot_no ASC");
?>

<div class="container">

    <h1>Manage Parking Slots</h1>

    <br>

    <a href="add_slot.php" class="btn">+ Add New Slot</a>

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">

        <tr>
            <th>Slot No</th>
            <th>Vehicle Type</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td><?php echo $row['slot_no']; ?></td>

            <td><?php echo ucfirst($row['vehicle_type']); ?></td>

            <td>

                <?php
                if($row['status']=="available")
                {
                    echo "<span style='color:green;font-weight:bold;'>Available</span>";
                }
                else
                {
                    echo "<span style='color:red;font-weight:bold;'>Occupied</span>";
                }
                ?>

            </td>

            <td>

                <a href="edit_slot.php?slot_no=<?php echo $row['slot_no']; ?>">Edit</a>

                |

                <a href="delete_slot.php?slot_no=<?php echo $row['slot_no']; ?>"
                onclick="return confirm('Delete this slot?')">
                Delete
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>

</div>

<?php
include("../includes/footer.php");
?>