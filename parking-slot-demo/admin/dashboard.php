<?php
include("../incudes/auth.php");
include("../incudes/db.php");
include("../incudes/header.php");

// Total Users
$userQuery = mysqli_query($conn, "SELECT COUNT(*) AS total_users FROM users WHERE role='user'");
$userData = mysqli_fetch_assoc($userQuery);

// Total Slots
$slotQuery = mysqli_query($conn, "SELECT COUNT(*) AS total_slots FROM parking_slots");
$slotData = mysqli_fetch_assoc($slotQuery);

// Available Slots
$availableQuery = mysqli_query($conn, "SELECT COUNT(*) AS available_slots FROM parking_slots WHERE status='available'");
$availableData = mysqli_fetch_assoc($availableQuery);

// Occupied Slots
$occupiedQuery = mysqli_query($conn, "SELECT COUNT(*) AS occupied_slots FROM parking_slots WHERE status='occupied'");
$occupiedData = mysqli_fetch_assoc($occupiedQuery);

// Pending Bookings
$pendingQuery = mysqli_query($conn, "SELECT COUNT(*) AS pending_bookings FROM bookings WHERE status='pending'");
$pendingData = mysqli_fetch_assoc($pendingQuery);
?>

<div class="dashboard">

    <h1>Admin Dashboard</h1>

    <p>Welcome,
        <strong><?php echo $_SESSION['full_name']; ?></strong>
    </p>

    <div class="dashboard-cards">

        <div class="card">
            <h2><?php echo $userData['total_users']; ?></h2>
            <p>Total Users</p>
        </div>

        <div class="card">
            <h2><?php echo $slotData['total_slots']; ?></h2>
            <p>Total Parking Slots</p>
        </div>

        <div class="card">
            <h2><?php echo $availableData['available_slots']; ?></h2>
            <p>Available Slots</p>
        </div>

        <div class="card">
            <h2><?php echo $occupiedData['occupied_slots']; ?></h2>
            <p>Occupied Slots</p>
        </div>

        <div class="card">
            <h2><?php echo $pendingData['pending_bookings']; ?></h2>
            <p>Pending Bookings</p>
        </div>

    </div>

    <br><br>

    <div class="dashboard-cards">

        <div class="card">
            <h3>Manage Users</h3>

            <a href="users.php">
                <button>Open</button>
            </a>
        </div>

        <div class="card">
            <h3>Manage Slots</h3>

            <a href="slots.php">
                <button>Open</button>
            </a>
        </div>

        <div class="card">
            <h3>Manage Bookings</h3>

            <a href="bookings.php">
                <button>Open</button>
            </a>
        </div>

        <div class="card">
            <h3>Reports</h3>

            <a href="reports.php">
                <button>Open</button>
            </a>
        </div>

    </div>

</div>

<?php
include("../incudes/footer.php");
?>