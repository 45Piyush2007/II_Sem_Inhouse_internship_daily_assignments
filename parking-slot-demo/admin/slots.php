<?php
include("../incudes/auth.php");
include("../incudes/db.php");

// Change Slot Status
if(isset($_GET['slot']) && isset($_GET['status']))
{
    $slot = $_GET['slot'];
    $status = $_GET['status'];

    mysqli_query($conn,"UPDATE parking_slots SET status='$status' WHERE slot_no='$slot'");

    header("Location: slots.php");
    exit();
}

include("../incudes/header.php");
?>

<div class="dashboard">

    <h1>Manage Parking Slots</h1>

    <table>

        <tr>
            <th>Slot No</th>
            <th>Vehicle Type</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php

        $result = mysqli_query($conn,"SELECT * FROM parking_slots ORDER BY slot_no ASC");

        while($row = mysqli_fetch_assoc($result))
        {

        ?>

        <tr>

            <td><?php echo $row['slot_no']; ?></td>

            <td><?php echo ucfirst($row['vehicle_type']); ?></td>

            <td><?php echo ucfirst($row['status']); ?></td>

            <td>

                <?php
                if($row['status']=="available")
                {
                ?>

                <a href="slots.php?slot=<?php echo $row['slot_no']; ?>&status=occupied">

                    <button>Mark Occupied</button>

                </a>

                <?php
                }
                else
                {
                ?>

                <a href="slots.php?slot=<?php echo $row['slot_no']; ?>&status=available">

                    <button>Mark Available</button>

                </a>

                <?php
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