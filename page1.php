<?php
include "connection.php";

$errors = []; // Array to store validation errors

// Validate inputs when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    // First Name
    if (isset($_POST['firstname']) && !empty($_POST['firstname'])) {
        $firstname = $_POST['firstname'];
    } else {
        $errors[] = "First Name is required.";
    }

    // Last Name
    if (isset($_POST['lastname']) && !empty($_POST['lastname'])) {
        $lastname = $_POST['lastname'];
    } else {
        $errors[] = "Last Name is required.";
    }

    // Username
    if (isset($_POST['username']) && !empty($_POST['username'])) {
        $username = $_POST['username'];
    } else {
        $errors[] = "Username is required.";
    }

    // Email
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $errors[] = "Email is required.";
    }

    // Phone
    if (isset($_POST['phone']) && !empty($_POST['phone'])) {
        $phone = $_POST['phone'];
    } else {
        $errors[] = "Phone is required.";
    }

    // Date of Birth
    if (isset($_POST['dob']) && !empty($_POST['dob'])) {
        $dob = $_POST['dob'];
    } else {
        $errors[] = "Date of Birth is required.";
    }


    // Date and Time
    if (isset($_POST['dat']) && !empty($_POST['dat'])) {
        $dat = $_POST['dat'];
    } else {
        $errors[] = "Date and Time is required.";
    }

    // Payment Method
    if (isset($_POST['payment']) && !empty($_POST['payment'])) {
        $payment = $_POST['payment'];
    } else {
        $errors[] = "Payment Method is required.";
    }

    // Password
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $errors[] = "Password is required.";
    }

    $sql_add_query = "insert into Booking values ('$firstname' , '$lastname' , '$username' , '$email' , '$phone' , 
    '$dob' , '$dat' , '$payment' , '$password')" ;
    if (mysqli_query($con,$sql_add_query)===FALSE)
    die("could not add data");

   ?> 

