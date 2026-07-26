<?php
include("incudes/header.php");
?>

<div class="dashboard">

    <div class="card" style="text-align:center; padding:40px;">

        <h1>🚗 Parking Slot Demo</h1>

        <br>

        <p style="font-size:18px;">
            Welcome to the Parking Slot Management System.
        </p>

        <br>

        <p>
            This project allows users to register, login, search available parking slots,
            book parking spaces, and track booking status.
            Administrators can manage users, parking slots, and approve or reject bookings.
        </p>

        <br><br>

        <?php
        if(!isset($_SESSION['id']))
        {
        ?>

        <a href="register.php">
            <button style="width:180px;">Register</button>
        </a>

        &nbsp;&nbsp;

        <a href="login.php">
            <button style="width:180px;">Login</button>
        </a>

        <?php
        }
        else
        {

            if($_SESSION['role']=="admin")
            {
        ?>

        <a href="admin/dashboard.php">
            <button style="width:220px;">
                Go to Admin Dashboard
            </button>
        </a>

        <?php
            }
            else
            {
        ?>

        <a href="user/dashboard.php">
            <button style="width:220px;">
                Go to User Dashboard
            </button>
        </a>

        <?php
            }
        }
        ?>

    </div>

    <br><br>

    <div class="dashboard-cards">

        <div class="card">

            <h2>👤 User Features</h2>

            <ul>
                <li>Register Account</li>
                <li>Login</li>
                <li>Search Parking Slots</li>
                <li>Book Parking Slot</li>
                <li>View Booking History</li>
            </ul>

        </div>

        <div class="card">

            <h2>🛠 Admin Features</h2>

            <ul>
                <li>Manage Users</li>
                <li>Manage Parking Slots</li>
                <li>Approve Bookings</li>
                <li>Reject Bookings</li>
                <li>View Dashboard Statistics</li>
            </ul>

        </div>

    </div>

</div>

<?php
include("incudes/footer.php");
?>