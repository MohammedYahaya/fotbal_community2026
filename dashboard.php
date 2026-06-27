<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card p-4 text-center shadow">

        <h2>Welcome 👋 <?php echo $_SESSION['fullname']; ?></h2>

        <p class="mt-3">
            You are logged in as a <b>User</b>.
        </p>

        <hr>

        <a href="../fixtures.php" class="btn btn-primary">View Fixtures</a>
        <a href="../results.php" class="btn btn-success">View Results</a>
        <a href="../news.php" class="btn btn-warning">View News</a>

        <br><br>

        <a href="../logout.php" class="btn btn-danger">Logout</a>

    </div>

</div>

</body>
</html>