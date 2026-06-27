<?php

include("../config/database.php");

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM players WHERE id='$id'");
$player = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $position = $_POST['position'];
    $number = $_POST['number'];

    mysqli_query($conn,"
        UPDATE players
        SET
            name='$name',
            position='$position',
            jersey_number='$number'
        WHERE id='$id'
    ");

    header("Location: players.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Player</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

<h2>Edit Player</h2>

<form method="POST">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control"
value="<?= $player['name']; ?>" required>
</div>

<div class="mb-3">
<label>Position</label>
<input type="text" name="position" class="form-control"
value="<?= $player['position']; ?>" required>
</div>

<div class="mb-3">
<label>Jersey Number</label>
<input type="number" name="number" class="form-control"
value="<?= $player['jersey_number']; ?>" required>
</div>

<button type="submit" name="update" class="btn btn-success">
Update Player
</button>

<a href="players.php" class="btn btn-secondary">
Back
</a>

</form>

</div>

</body>
</html>