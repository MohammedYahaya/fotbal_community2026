<?php
include("config/database.php");

$news = mysqli_query($conn,
    "SELECT * FROM news ORDER BY created_at DESC LIMIT 3");

$fixtures = mysqli_query($conn,
    "SELECT * FROM fixtures
     WHERE status='Upcoming'
     ORDER BY match_date ASC
     LIMIT 3");

$results = mysqli_query($conn,
    "SELECT * FROM results
     ORDER BY match_date DESC
     LIMIT 3");
?>

<!DOCTYPE html>
<html>
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Community Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">

    <style>
        .hero{
            background:#0d6efd;
            color:white;
            padding:80px 20px;
            text-align:center;
        }

        .news-image{
            height:200px;
            object-fit:cover;
        }
    </style>
    <head>
    
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="index.php">
            FCMS
        </a>

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
                    <a class="nav-link" href="team.php">Team</a>
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

                <li class="nav-item">
                    <a class="nav-link" href="league.php">League</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>

            </ul>

        </div>

    </div>
</nav>

<!-- HERO SECTION -->
<section class="hero">
    <div class="container">

        <h1>Welcome to Football Community</h1>

        <p>
            Follow your team, players, fixtures and latest news.
        </p>

    </div>
</section>

<!-- NEWS -->
<div class="container mt-5">

    <h2 class="mb-4">Latest News</h2>

    <div class="row">

    <?php while($row = mysqli_fetch_assoc($news)){ ?>

        <div class="col-md-4">

            <div class="card mb-3">

                <?php if(!empty($row['image'])){ ?>

                    <img src="uploads/<?= $row['image']; ?>"
                         class="card-img-top news-image">

                <?php } ?>

                <div class="card-body">

                    <h5><?= $row['title']; ?></h5>

                    <p>
                        <?= substr($row['content'],0,100); ?>...
                    </p>

                </div>

            </div>

        </div>

    <?php } ?>

    </div>

</div>

<!-- FIXTURES -->
<div class="container mt-5">

    <h2>Upcoming Fixtures</h2>

    <table class="table table-bordered">

        <tr>
            <th>Opponent</th>
            <th>Date</th>
            <th>Venue</th>
        </tr>

        <?php while($fixture = mysqli_fetch_assoc($fixtures)){ ?>

        <tr>
            <td><?= $fixture['opponent']; ?></td>
            <td><?= $fixture['match_date']; ?></td>
            <td><?= $fixture['venue']; ?></td>
        </tr>

        <?php } ?>

    </table>

</div>

<!-- RESULTS -->
<div class="container mt-5">

    <h2>Recent Results</h2>

    <table class="table table-bordered">

        <tr>
            <th>Match</th>
            <th>Score</th>
        </tr>

        <?php while($result = mysqli_fetch_assoc($results)){ ?>

        <tr>

            <td>
                <?= $result['home_team']; ?>
                vs
                <?= $result['away_team']; ?>
            </td>

            <td>
                <?= $result['home_score']; ?>
                -
                <?= $result['away_score']; ?>
            </td>

        </tr>

        <?php } ?>

    </table>

</div>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center p-4 mt-5">

    Football Community Management System
    © 2026

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>