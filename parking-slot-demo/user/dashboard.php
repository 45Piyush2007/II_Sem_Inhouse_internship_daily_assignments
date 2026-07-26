<?php
include("../incudes/auth.php");
include("../incudes/db.php");
include("../incudes/header.php");
?>

<div class="dashboard">

    <h1>User Dashboard</h1>

    <p>Welcome,
        <strong><?php echo $_SESSION['full_name']; ?></strong>
    </p>

    <div class="dashboard-cards">

        <div class="card">
            <h3>Book Parking</h3>
            <p>Reserve your parking slot.</p>

            <a href="booking.php">
                <button>Book Now</button>
            </a>
        </div>

        <div class="card">
            <h3>Search Slots</h3>
            <p>Check available parking slots.</p>

            <a href="search.php">
                <button>Search</button>
            </a>
        </div>

        <div class="card">
            <h3>Booking History</h3>
            <p>View all your previous bookings.</p>

            <a href="history.php">
                <button>View History</button>
            </a>
        </div>

        <div class="card">
            <h3>Profile</h3>
            <p>View your profile details.</p>

            <a href="profile.php">
                <button>Profile</button>
            </a>
        </div>

    </div>

</div>

<?php
include("../incudes/footer.php");
?>