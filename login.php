<?php
include_once("config.php");  
if (!isset($_SESSION)) { session_start(); }
if (isset($_POST['loginButton'])) {
    echo "button bressed";
    $myUserName = mysqli_real_escape_string($db, $_POST["username"]);
    $myPassword = mysqli_real_escape_string($db, $_POST["password"]);
    if (!isset($myUserName)) {
        array_push($errors, "Username is required");
    }
    if (!isset($myPassword)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($myPassword);
        $sqlQuery = "SELECT ID FROM users WHERE user_name = '$myUserName' AND password = '$password'";
        $results = mysqli_query($db, $sqlQuery);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['logged_in'] = true;
            $_SESSION['userName'] = $myUserName;
            header("location: index.php");
        } else {
            array_push($errors, "Your login name or password is invalid!");
        }
    }
}
?>




<?php include("errors.php"); ?>
<?php include("inc/coreHtml.php"); ?>
<form action="login.php" method="post">
<input type="text" placeholder="Enter Username" name="username" required>
<input type="password" placeholder="Enter Password" name="password" required>
<button type="submit" name="loginButton">Login</button>
</form>
<?php include("inc/coreHtmlBottom.php"); ?>
