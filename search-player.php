<?php
include("../config/database.php");

$search = $_POST['search'] ?? "";

$sql = "SELECT * FROM players 
        WHERE name LIKE '%$search%' 
        OR position LIKE '%$search%' 
        OR jersey_number LIKE '%$search%'";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
?>

<div class="card p-2 mb-2">
    <b><?php echo $row['name']; ?></b><br>
    Position: <?php echo $row['position']; ?> |
    No: <?php echo $row['jersey_number']; ?>
</div>

<?php } ?>