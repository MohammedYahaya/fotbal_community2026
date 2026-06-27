<?php
include("config/database.php");

$result = mysqli_query(
    $conn,
    "SELECT * FROM fixtures ORDER BY match_date ASC, match_time ASC"
);
?>

<!DOCTYPE html>
<html>
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixtures</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .fixture-card{
            transition:0.3s;
        }

        .fixture-card:hover{
            transform:translateY(-5px);
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="index.php">
            FCMS
        </a>

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
                    <a class="nav-link active" href="fixtures.php">Fixtures</a>
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

    <h1 class="text-center mb-5">Upcoming Fixtures</h1>

    <div class="row">

    <?php
    if(mysqli_num_rows($result) > 0){
        while($fixture = mysqli_fetch_assoc($result)){
    ?>

        <div class="col-md-4 mb-4">

            <div class="card shadow fixture-card">

                <div class="card-body text-center">

                    <h3>
                        VS
                    </h3>

                    <h4>
                        <?= htmlspecialchars($fixture['opponent']); ?>
                    </h4>

                    <hr>

                    <p>
                        <strong>Date:</strong><br>
                        <?= $fixture['match_date']; ?>
                    </p>

                    <p>
                        <strong>Time:</strong><br>
                        <?= $fixture['match_time']; ?>
                    </p>

                    <p>
                        <strong>Venue:</strong><br>
                        <?= htmlspecialchars($fixture['venue']); ?>
                    </p>

                    <p>
                        <strong>Competition:</strong><br>
                        <?= htmlspecialchars($fixture['competition']); ?>
                    </p>

                    <span class="badge bg-primary">
                        <?= $fixture['status']; ?>
                    </span>

                </div>

            </div>

        </div>

    <?php
        }
    } else {
    ?>

        <div class="col-12">
            <div class="alert alert-info text-center">
                No fixtures available yet.
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