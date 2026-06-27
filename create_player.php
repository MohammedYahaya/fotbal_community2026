<?php
include("../config/database.php");

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM players WHERE id='$id'");

header("Location: players.php");
exit();
?>