<?php
include("incudes/db.php");

$message = "";

if(isset($_POST['register']))
{
    $full_name = trim($_POST['full name']);
    $username = trim($_POST['username']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);

    // Check if username already exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

    if(mysqli_num_rows($check) > 0)
    {
        $message = "Username already exists!";
    }
    else
    {
        // Insert new user
        $sql = "INSERT INTO users(full_name, username, phone, password, role)
                VALUES('$full name','$username','$phone','$password','user')";

        if(mysqli_query($conn,$sql))
        {
            echo "<script>
                    alert('Registration Successful!');
                    window.location='login.php';
                  </script>";
            exit();
        }
        else
        {
            $message = "Registration Failed!";
        }
    }
}

include("incudes/header.php");
?>

<div class="register-container">

    <h2>Create Account</h2>

    <?php
    if($message != "")
    {
        echo "<p class='error'>$message</p>";
    }
    ?>

    <form method="POST">

        <label>Full Name</label>
        <input
            type="text"
            name="full_name"
            placeholder="Enter Full Name"
            required
        >

        <label>Username</label>
        <input
            type="text"
            name="username"
            placeholder="Choose Username"
            required
        >

        <label>Phone Number</label>
        <input
            type="text"
            name="phone"
            placeholder="Enter Phone Number"
            maxlength="10"
            required
        >

        <label>Password</label>
        <input
            type="password"
            name="password"
            placeholder="Enter Password"
            required
        >

        <button type="submit" name="register">
            Register
        </button>

    </form>

    <p class="login-link">
        Already have an account?
        <a href="login.php">Login Here</a>
    </p>

</div>

<?php
include("incudes/footer.php");
?>