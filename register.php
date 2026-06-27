<?php
include("config/database.php");

$message = "";

if(isset($_POST['register'])){

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(fullname,email,password,role)
            VALUES('$fullname','$email','$password','admin')";

    if(mysqli_query($conn,$sql)){
    
    header("Location: login.php?success=1");
    exit();

}else{
    $message = "Error: ".mysqli_error($conn);
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Admin Registration</h4>
                </div>

                <div class="card-body">

                    <?php if(!empty($message)) echo "<div class='alert alert-info'>$message</div>"; ?>

                    <form method="POST">

                        <div class="mb-3">
                            <label>Full Name</label>
                            <input type="text" name="fullname" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button type="submit" name="register" class="btn btn-primary w-100">
                            Register
                        </button>
                        <a href="login.php" class="btn btn-primary">
                            Login
                        </a>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>