<?php
include("config/database.php");

$result = mysqli_query($conn, "SELECT * FROM players ORDER BY jersey_number ASC");
?>

<!DOCTYPE html>
<html>
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .player-card{
            transition: 0.3s;
        }

        .player-card:hover{
            transform: translateY(-5px);
        }

        .player-photo{
            height:250px;
            object-fit:cover;
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="index.php">FCMS</a>

        <button class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="team.php">Team</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="fixtures.php">Fixtures</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="results.php">Results</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="news.php">News</a>
                </li>

            </ul>

        </div>

    </div>
</nav>

<div class="container mt-5">

    <h1 class="text-center mb-5">Our Team</h1>

    <div class="row">

    <?php while($player = mysqli_fetch_assoc($result)){ ?>

        <div class="col-md-4 mb-4">

            <div class="card player-card shadow">

                <?php if(!empty($player['photo'])){ ?>

                    <img src="uploads/<?= $player['photo']; ?>"
                         class="card-img-top player-photo">

                <?php } else { ?>

                    <img src="https://via.placeholder.com/400x250?text=No+Photo"
                         class="card-img-top player-photo">

                <?php } ?>

                <div class="card-body">

                    <h4><?= htmlspecialchars($player['name']); ?></h4>

                    <p>
                        <strong>Position:</strong>
                        <?= htmlspecialchars($player['position']); ?>
                    </p>

                    <p>
                        <strong>Jersey Number:</strong>
                        <?= $player['jersey_number']; ?>
                    </p>

                    <p>
                        <strong>Age:</strong>
                        <?= $player['age']; ?>
                    </p>

                    <p>
                        ⚽ Goals: <?= $player['goals']; ?>
                    </p>

                    <p>
                        🎯 Assists: <?= $player['assists']; ?>
                    </p>

                    <p>
                        🟨 Yellow Cards: <?= $player['yellow_cards']; ?>
                    </p>

                    <p>
                        🟥 Red Cards: <?= $player['red_cards']; ?>
                    </p>

                    <?php if(!empty($player['bio'])){ ?>
                        <hr>

                        <p>
                            <?= htmlspecialchars($player['bio']); ?>
                        </p>
                    <?php } ?>

                </div>

            </div>

        </div>

    <?php } ?>

    </div>

</div>

<footer class="bg-dark text-white text-center p-4 mt-5">
    Football Community Management System © 2026
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>