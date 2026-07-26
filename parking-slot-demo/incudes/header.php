<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking Slot Demo</title>

    <!-- CSS -->
    <link rel="stylesheet" href="/parking-slot-demo/css/style.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

<header>

    <div class="logo">
        <h2>🚗 ParkNGo</h2>
    </div>

    <nav>

        <a href="/parking-slot-demo/index.php">Home</a>

        <?php if(isset($_SESSION['id'])) { ?>

            <?php if($_SESSION['role']=="admin") { ?>

                <a href="/parking-slot-demo/admin/dashboard.php">Dashboard</a>

            <?php } else { ?>

                <a href="/parking-slot-demo/user/dashboard.php">Dashboard</a>

            <?php } ?>

            <span class="welcome">
                Welcome,
                <?php echo $_SESSION['full_name']; ?>
            </span>

            <a href="/parking-slot-demo/logout.php" class="logout-btn">Logout</a>

        <?php } else { ?>

            <a href="/parking-slot-demo/login.php">Login</a>
            <a href="/parking-slot-demo/register.php">Register</a>

        <?php } ?>

    </nav>

</header>

<div class="container">