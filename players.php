<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}

include("../config/database.php");

$result = mysqli_query($conn, "SELECT * FROM players ORDER BY id DESC");

$search = "";

if(isset($_GET['search'])){
    $search = $_GET['search'];
}

if($search != ""){
    $players = mysqli_query($conn,
        "SELECT * FROM players 
         WHERE name LIKE '%$search%' 
         OR position LIKE '%$search%'"
    );
}else{
    $players = mysqli_query($conn, "SELECT * FROM players");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Player Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .player-photo{
            width:60px;
            height:60px;
            object-fit:cover;
            border-radius:50%;
        }
    </style>
</head>

<body>
        <form method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search player by name...">
        <button class="btn btn-primary">Search</button>
    </div>
</form>

<div class="mb-3">
    <input type="text"
           id="search"
           class="form-control"
           placeholder="🔍 Search players live...">
</div>

<div id="searchResult"></div>
<?php if($search != ""){ ?>
    <div class="alert alert-info">
        Search results for: <b><?php echo $search; ?></b>
    </div>
<?php } ?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Player Management</h2>

        <div>
            <a href="dashboard.php" class="btn btn-secondary">
                Dashboard
            </a>

            <a href="add_player.php" class="btn btn-primary">
                Add Player
            </a>
        </div>
    </div>

    <table class="table table-bordered table-striped table-hover">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Position</th>
                <th>Jersey No.</th>
                <th>Age</th>
                <th>Goals</th>
                <th>Assists</th>
                <th>Yellow Cards</th>
                <th>Red Cards</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        <?php
        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_assoc($result)){
        ?>

            <tr>

                <td><?= $row['id']; ?></td>

                <td>
                    <?php if(!empty($row['photo'])){ ?>
                        <img
                            src="../uploads/<?= $row['photo']; ?>"
                            class="player-photo"
                            alt="Player Photo">
                    <?php } else { ?>
                        No Photo
                    <?php } ?>
                </td>

                <td><?= htmlspecialchars($row['name']); ?></td>

                <td><?= htmlspecialchars($row['position']); ?></td>

                <td><?= $row['jersey_number']; ?></td>

                <td><?= $row['age']; ?></td>

                <td><?= $row['goals']; ?></td>

                <td><?= $row['assists']; ?></td>

                <td><?= $row['yellow_cards']; ?></td>

                <td><?= $row['red_cards']; ?></td>

                <td>
                    <a
                        href="edit_player.php?id=<?= $row['id']; ?>"
                        class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <a
                        href="delete_player.php?id=<?= $row['id']; ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure you want to delete this player?')">
                        Delete
                    </a>
                </td>

            </tr>

        <?php
            }
        } else {
        ?>

            <tr>
                <td colspan="11" class="text-center">
                    No players found.
                </td>
            </tr>

        <?php } ?>

        </tbody>

    </table>

</div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){

    $("#search").on("keyup", function(){

        let search = $(this).val();

        $.ajax({
            url: "search_players.php",
            type: "POST",
            data: {search: search},
            success: function(data){
                $("#searchResult").html(data);
            }
        });

    });

});
</script>
</body>
</html>