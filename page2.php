<?php
include 'connection.php';
$query="select * from Booking ";
$result= mysqli_query($con,$query);
$r= mysqli_num_rows($result); ?>

<html>
<body>
<table border=1>
<tr> <td> First Name </td> <td> Last Name </td> <td> Username </td> <td> Email </td>
<td> Mobile Number </td> <td> Date of Birth </td> <td> City </td> <td> State </td> 
<td> Zip </td> <td> Booking Date And Time </td> <td> Payment Method </td> <td> Password </td> 
<td> Confirm Password </td><td> Delete </td> <td> Update </td> </tr>

<?php 
for ($i=0;$i<$r;$i++){
   $fetch=mysqli_fetch_assoc($result);
$firstname = $fetch['firstname'];
$lasttname = $fetch['lastname'];
$username = $fetch['username'];
$email = $fetch['email'];
$phone = $fetch['phone'];
$dob = $fetch['dob'];
$city = $fetch['city'];
$state = $fetch['state'];
$zip = $fetch['zip'];
$dat = $fetch['dat'];
$payment = $fetch['payment'];
$password = $fetch['password'];
$password2 = $fetch['password2'];

echo " <tr> <td> <input type='text' id='firstname' value=$firstname</td>
            <td> <input type='text' id='lastname' value=$lastname</td>
            <td> <input type='text' id='username' value=$username</td>
            <td> <input type='email' id='email' value=$email</td>
            <td> <input type='number' id='phone' value=$phone</td>
            <td> <input type='date' id='dob' value=$dob</td>
            <td> <input type='text' id='city' value=$city</td>
            <td> <input type='text' id='state' value=$state</td>
            <td> <input type='text' id='zip' value=$zip</td>
            <td> <input type='datetime-local' id='dat' value=$dat</td>
            <td> <input type='text' id='payment' value=$payment</td>
            <td> <input type='password' id='password' value=$password</td>
            <td> <a href='delete.php? username=$username'> Delete </a></td>
            <td> <a href='update.php? username=$username'> Update </a></td>";}

?>
</table>
</body>
</html>