<?php

include("../config/database.php");

if(isset($_POST['save'])){

    $name = $_POST['name'];
    $position = $_POST['position'];
    $number = $_POST['number'];
    $age = $_POST['age'];
    $bio = $_POST['bio'];
    $goals = $_POST['goals'];
    $assists = $_POST['assists'];
    $yellow = $_POST['yellow_cards'];
    $red = $_POST['red_cards'];

    // IMAGE UPLOAD
    $photoName = $_FILES['photo']['name'];
    $photoTmp = $_FILES['photo']['tmp_name'];

    if(!empty($photoName)){
        $newPhotoName = time() . "_" . $photoName;
        move_uploaded_file($photoTmp, "../uploads/" . $newPhotoName);
    } else {
        $newPhotoName = "";
    }

    // INSERT INTO DATABASE
    $sql = "INSERT INTO players
    (name, position, jersey_number, age, bio, goals, assists, yellow_cards, red_cards, photo)
    VALUES
    ('$name', '$position', '$number', '$age', '$bio', '$goals', '$assists', '$yellow', '$red', '$newPhotoName')";

    mysqli_query($conn, $sql);

    header("Location: players.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Add Player</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<h2>Add Player</h2>

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label>Position</label>
<input type="text" name="position" class="form-control" required>
</div>

<div class="mb-3">
<label>Jersey Number</label>
<input type="number" name="number" class="form-control" required>
</div>

<div class="mb-3">
<label>Age</label>
<input type="number" name="age" class="form-control" required>
</div>

<div class="mb-3">
<label>Bio</label>
<textarea name="bio" class="form-control"></textarea>
</div>

<div class="mb-3">
<label>Goals</label>
<input type="number" name="goals" class="form-control" value="0">
</div>

<div class="mb-3">
<label>Assists</label>
<input type="number" name="assists" class="form-control" value="0">
</div>

<div class="mb-3">
<label>Yellow Cards</label>
<input type="number" name="yellow_cards" class="form-control" value="0">
</div>

<div class="mb-3">
<label>Red Cards</label>
<input type="number" name="red_cards" class="form-control" value="0">
</div>

<div class="mb-3">
<label>Photo</label>
<input type="file" name="photo" class="form-control">
</div>

<button class="btn btn-success" name="save">
Save Player
</button>

</form>

</div>

</body>
</html>