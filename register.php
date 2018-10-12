<?php
session_start();
// Make errors array for form validation
require_once("config.php"); 
// initializing variables
$username = "";
$email = "";
$errors = array();
// Check if form is filled

if (isset($_POST['reg_user'])) {
    // recieve the input values of the form
    $userName = mysqli_real_escape_string($db, $_POST['userName']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password2 = mysqli_real_escape_string($db, $_POST['password_2']);
    echo "Form is set, in the isset if";

        // Form validation. Check if each form field is filled in.
        // Add corresponding Errors to array.
        if (empty($userName)) {
            array_push($errors, "Username is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password1)) {
            array_push($errors, "Password is required");
        }
        if ($password1 != $password2) {
            array_push($errors, "The two passwords do not match");
        }
        if (!empty($userName) && !empty($email)) {
        // first check the database to make sure
        // a user does not already exists with the same username and/or email
        $userCheckQuery = "SELECT * FROM users WHERE user_name = '$userName' OR email = '$email' LIMIT 1";
        $result = mysqli_query($db, $userCheckQuery);
        $user = null;
        if ($result) {
            $user = mysqli_fetch_assoc($result);
        }
        // Check if user already exists
        if ($user) {
            if ($user["user_name"] === $userName) {
                array_push($errors, "Username already exists");
            }
            if ($user["email"] === $email) {
                array_push($errors, "Email already exists");
            }
        }
    }
    // Finally register the user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password1);
        echo "NO ERRORRSSSSSSSSSSSS";
        $query = "INSERT INTO users (user_name, email, password) VALUES ('$userName', '$email', '$password')";
        // Excecute the sql query
        mysqli_query($db, $query);
        // Set session
        $_SESSION['logged_in'] = true;
        $_SESSION["userName"] = $userName;
        $_SESSION["email"] = $email;
        $_SESSION["succes"] = "You are now logged in";
        header("location: index.php");
    } 
    else {
        // $_SESSION['errors'] = $errors;
        // header("location: registerForm.php");
        include("errors.php");

    }

}
