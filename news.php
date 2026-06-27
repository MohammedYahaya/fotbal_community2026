<?php
include("config/database.php");

$result = mysqli_query(
    $conn,
    "SELECT * FROM news ORDER BY created_at DESC"
);
?>

<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club News</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .news-card{
            transition:0.3s;
        }

        .news-card:hover{
            transform:translateY(-5px);
        }

        .news-img{
            height:200px;
            object-fit:cover;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="index.php">FCMS</a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="nav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="team.php">Team</a></li>
                <li class="nav-item"><a class="nav-link" href="fixtures.php">Fixtures</a></li>
                <li class="nav-item"><a class="nav-link" href="results.php">Results</a></li>
                <li class="nav-item"><a class="nav-link active" href="news.php">News</a></li>

            </ul>

        </div>

    </div>
</nav>

<div class="container mt-5">

    <h1 class="text-center mb-5">Latest News</h1>

    <div class="row">

    <?php
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
    ?>

        <div class="col-md-4 mb-4">

            <div class="card news-card shadow">

                <?php if(!empty($row['image'])){ ?>

                    <img src="uploads/<?= $row['image']; ?>"
                         class="card-img-top news-img">

                <?php } ?>

                <div class="card-body">

                    <h5><?= htmlspecialchars($row['title']); ?></h5>

                    <p>
                        <?= substr($row['content'], 0, 120); ?>...
                    </p>

                </div>

            </div>

        </div>

    <?php
        }
    } else {
    ?>

        <div class="col-12">
            <div class="alert alert-info text-center">
                No news available yet.
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