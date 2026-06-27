<?php
include("config/database.php");

$result = mysqli_query($conn, "SELECT * FROM league_table ORDER BY points DESC");
?>

<!DOCTYPE html>
<html>
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>League Table</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">FCMS</a>
    </div>
</nav>

<div class="container mt-5">

<h2 class="text-center mb-4">League Table</h2>

<table class="table table-striped table-bordered">

<thead class="table-dark">
<tr>
    <th>Pos</th>
    <th>Team</th>
    <th>Played</th>
    <th>Won</th>
    <th>Drawn</th>
    <th>Lost</th>
    <th>GF</th>
    <th>GA</th>
    <th>Points</th>
</tr>
</thead>

<tbody>

<?php
$pos = 1;
while($row = mysqli_fetch_assoc($result)){
?>

<tr>
    <td><?= $pos++; ?></td>
    <td><?= $row['team_name']; ?></td>
    <td><?= $row['played']; ?></td>
    <td><?= $row['won']; ?></td>
    <td><?= $row['drawn']; ?></td>
    <td><?= $row['lost']; ?></td>
    <td><?= $row['goals_for']; ?></td>
    <td><?= $row['goals_against']; ?></td>
    <td><strong><?= $row['points']; ?></strong></td>
</tr>

<?php } ?>

</tbody>

</table>

</div>

</body>
</html>