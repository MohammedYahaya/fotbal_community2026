<?php
include("config/database.php");

$result = mysqli_query(
    $conn,
    "SELECT * FROM results ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html>
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Results</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .result-card{
            transition:0.3s;
        }

        .result-card:hover{
            transform:translateY(-5px);
        }

        .score{
            font-size:40px;
            font-weight:bold;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="index.php">FCMS</a>

        <button class="navbar-toggler"
                type="button"
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
                    <a class="nav-link" href="team.php">Team</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="fixtures.php">Fixtures</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="results.php">Results</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="news.php">News</a>
                </li>

            </ul>

        </div>

    </div>
</nav>

<div class="container mt-5">

    <h1 class="text-center mb-5">Match Results</h1>

    <div class="row">

    <?php
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_assoc($result)){
    ?>

        <div class="col-md-6 mb-4">

            <div class="card shadow result-card">

                <div class="card-body text-center">

                    <h4>
                        <?= htmlspecialchars($row['home_team']); ?>
                    </h4>

                    <div class="score">
                        <?= $row['home_score']; ?>
                        -
                        <?= $row['away_score']; ?>
                    </div>

                    <h4>
                        <?= htmlspecialchars($row['away_team']); ?>
                    </h4>

                    <hr>

                    <p>
                        <strong>Date:</strong>
                        <?= $row['match_date']; ?>
                    </p>

                    <?php if(!empty($row['report'])){ ?>

                        <p>
                            <strong>Match Report:</strong><br>
                            <?= htmlspecialchars($row['report']); ?>
                        </p>

                    <?php } ?>

                </div>

            </div>

        </div>

    <?php
        }
    } else {
    ?>

        <div class="col-12">
            <div class="alert alert-info text-center">
                No match results available yet.
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