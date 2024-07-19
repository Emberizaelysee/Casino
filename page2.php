<?php
include 'connection.php';

$query = "SELECT * FROM Booking";
$result = mysqli_query($con, $query);
$num_rows = mysqli_num_rows($result);
?>

<html>
<body>
    <table border="1">
        <tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Username</td>
            <td>Email</td>
            <td>Mobile Number</td>
            <td>Date of Birth</td>
            <td>Booking Date And Time</td>
            <td>Payment Method</td>
            <td>Password</td>
            <td>Delete</td>
            <td>Update</td>
        </tr>

        <?php
        while ($fetch = mysqli_fetch_assoc($result)) {
            $firstname = $fetch['First Name'];
            $lastname = $fetch['Last Name'];
            $username = $fetch['Username'];
            $email = $fetch['Email'];
            $phone = $fetch['Mobile Number'];
            $dob = $fetch['Date of Birth'];
            $dat = $fetch['Booking Date And Time'];
            $payment = $fetch['Payment Method'];
            $password = $fetch['Password'];
        ?>

        <tr>
            <td><input type="text" id="firstname" value="<?php echo $firstname; ?>"></td>
            <td><input type="text" id="lastname" value="<?php echo $lastname; ?>"></td>
            <td><input type="text" id="username" value="<?php echo $username; ?>"></td>
            <td><input type="email" id="email" value="<?php echo $email; ?>"></td>
            <td><input type="number" id="phone" value="<?php echo $phone; ?>"></td>
            <td><input type="date" id="dob" value="<?php echo $dob; ?>"></td>
            <td><input type="datetime-local" id="dat" value="<?php echo $dat; ?>"></td>
            <td><input type="text" id="payment" value="<?php echo $payment; ?>"></td>
            <td><input type="password" id="password" value="<?php echo $password; ?>"></td>
            <td><a href="delete.php?username=<?php echo $username; ?>">Delete</a></td>
            <td><a href="update.php?username=<?php echo $username; ?>">Update</a></td>
        </tr>

        <?php
        }
        ?>
    </table>
</body>
</html>
