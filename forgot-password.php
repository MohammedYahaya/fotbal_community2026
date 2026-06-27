<?php
include("config/database.php");

$message = "";

if(isset($_POST['submit'])){

    $email = $_POST['email'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        // store email in session for reset
        session_start();
        $_SESSION['reset_email'] = $email;

        header("Location: reset-password.php");
        exit();

    } else {
        $message = "Email not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="col-md-5 mx-auto">

        <div class="card p-4">

            <h4>Forgot Password</h4>

            <form method="POST">

                <input type="email" name="email" class="form-control mb-3" placeholder="Enter your email" required>

                <button class="btn btn-primary w-100" name="submit">Continue</button>

            </form>

            <p class="text-danger mt-2"><?php echo $message; ?></p>

        </div>

    </div>

</div>

</body>
</html>