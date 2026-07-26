<?php
include("../incudes/auth.php");
include("../incudes/db.php");

// Delete User
if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    // Prevent deleting the admin account
    $check = mysqli_query($conn,"SELECT * FROM users WHERE id='$id'");

    if(mysqli_num_rows($check)>0)
    {
        $row=mysqli_fetch_assoc($check);

        if($row['role']!="admin")
        {
            mysqli_query($conn,"DELETE FROM users WHERE id='$id'");
            header("Location: users.php");
            exit();
        }
    }
}

include("../incudes/header.php");
?>

<div class="dashboard">

    <h1>Manage Users</h1>

    <table>

        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Action</th>
        </tr>

        <?php

        $result = mysqli_query($conn,"SELECT * FROM users ORDER BY id ASC");

        while($row=mysqli_fetch_assoc($result))
        {

        ?>

        <tr>

            <td><?php echo $row['id']; ?></td>

            <td><?php echo $row['full_name']; ?></td>

            <td><?php echo $row['username']; ?></td>

            <td><?php echo $row['phone']; ?></td>

            <td><?php echo ucfirst($row['role']); ?></td>

            <td>

            <?php

            if($row['role']=="admin")
            {
                echo "<strong>Protected</strong>";
            }
            else
            {

            ?>

            <a href="users.php?delete=<?php echo $row['id']; ?>"
               onclick="return confirm('Delete this user?');">

                <button>Delete</button>

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