<?php
include("incudes/db.php");

session_start();

$message = "";

if(isset($_POST['login']))
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)==1)
    {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['id'] = $row['id'];
        $_SESSION['full_name'] = $row['full_name'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        if($row['role']=="admin")
        {
            header("Location: admin/dashboard.php");
        }
        else
        {
            header("Location: user/dashboard.php");
        }

        exit();
    }
    else
    {
        $message = "Invalid Username or Password!";
    }
}

include("incudes/header.php");
?>

<div class="login-container">

    <h2>Login</h2>

    <?php
    if($message!="")
    {
        echo "<p class='error'>$message</p>";
    }
    ?>

    <form method="POST">

        <label>Username</label>

        <input
            type="text"
            name="username"
            placeholder="Enter Username"
            required
        >

        <label>Password</label>

        <input
            type="password"
            name="password"
            placeholder="Enter Password"
            required
        >

        <button
            type="submit"
            name="login">
            Login
        </button>

    </form>

    <p class="login-link">
        Don't have an account?
        <a href="register.php">
            Register Here
        </a>
    </p>

</div>

<?php
include("incudes/footer.php");
?>