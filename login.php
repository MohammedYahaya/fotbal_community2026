<?php
session_start();
include("config/database.php");

$message = "";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){

        $user = mysqli_fetch_assoc($result);

        if(password_verify($password,$user['password'])){

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['role'] = $user['role']; // FIXED HERE

            // ROLE-BASED REDIRECT
            if($user['role'] == 'admin'){

                header("Location: admin/dashboard.php");
            }else{
                header("Location: user/dashboard.php");
            }

            exit();

        }else{
            $message = "Wrong Password";
        }

    }else{
        $message = "User Not Found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Admin Login</h4>
                </div>

                <div class="card-body">

                    <?php if(!empty($message)) echo "<div class='alert alert-danger'>$message</div>"; ?>

                    <form method="POST">

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button type="submit" name="login" class="btn btn-primary w-100">
                            Login
                        </button>
                        <a href="forgot-password.php">Forgot Password?</a>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>