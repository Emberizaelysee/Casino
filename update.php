<?php
include 'connection.php';

// Validate and sanitize input
if (isset($_GET['Username'])) {
    $username = mysqli_real_escape_string($con, $_GET['Username']);
    
    // Use prepared statement to prevent SQL injection
    $query = "SELECT * FROM Booking WHERE Username = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $fetch = mysqli_fetch_assoc($result);
?>
<html>
    <body>
        <h1>Updating Data</h1>
        <form method="post" action="update2.php">
            <table border="1">
                <tr>
                    <td>First Name</td>
                    <td><input type="text" name="firstname" value="<?php echo htmlspecialchars($fetch['firstname']); ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" name="lastname" value="<?php echo htmlspecialchars($fetch['Last Name']); ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="<?php echo htmlspecialchars($fetch['Username']); ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" value="<?php echo htmlspecialchars($fetch['Email']); ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Mobile Number</td>
                    <td><input type="text" name="phone" value="<?php echo htmlspecialchars($fetch['Mobile Number']); ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td><input type="text" name="dob" value="<?php echo htmlspecialchars($fetch['Date of Birth']); ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Booking Date And Time</td>
                    <td><input type="text" name="dat" value="<?php echo htmlspecialchars($fetch['Booking Date And Time']); ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Payment Method</td>
                    <td><input type="text" name="payment" value="<?php echo htmlspecialchars($fetch['Payment Method']); ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password" value="<?php echo htmlspecialchars($fetch['Password']); ?>" readonly /></td>
                </tr>
                <tr>
                    <td><input type="submit" value="UPDATE"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
    } else {
        echo "No results found for the given Username.";
    }
} else {
    echo "Username parameter is missing.";
}
?>
