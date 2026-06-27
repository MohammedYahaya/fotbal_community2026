<?php
session_start();
include("config/database.php");

if(!isset($_SESSION['reset_email'])){
    header("Location: login.php");
    exit();
}

$message = "";

if(isset($_POST['reset'])){

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $email = $_SESSION['reset_email'];

    $sql = "UPDATE users SET password='$password' WHERE email='$email'";
    mysqli_query($conn, $sql);

    unset($_SESSION['reset_email']);

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="col-md-5 mx-auto">

        <div class="card p-4">

            <h4>Reset Password</h4>

            <form method="POST">

                <input type="password" name="password" class="form-control mb-3" placeholder="New Password" required>

                <button class="btn btn-success w-100" name="reset">Reset Password</button>

            </form>

        </div>

    </div>

</div>

</body>
</html>