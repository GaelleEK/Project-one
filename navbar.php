<?php
/* connexion à la bdd */
$pdo = new PDO('mysql:host=mysql;dbname=project-one;host=127.0.0.1', 'root', '', [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

/* requête */
$query = $pdo->query("SELECT * FROM category");

$categories = $query->fetchAll();

?>
<img src="img/code1.jpg" class="img-fluid">

<nav class="navbar navbar-expand-lg navbar navbar-dark " >
        <a class="navbar-brand" href="index.php">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item mr-3 ml-3">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="page1.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Article
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="page1.php">Tous les articles</a>
                        <div class="dropdown-divider"></div>
                        <?php foreach ($categories as $category): ?>
                        <a class="dropdown-item" href="page6.php?id=<?= $category["id"] ?>"><?= $category["category_name"] ?></a>
                        <?php endforeach; ?>
                    </div>
                   <!-- <a class="nav-link" href="page1.php">Article</a>-->
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link" href="page2.php">Creer article</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link" href="page3.php">A propos</a>
                </li>

            </ul>
        </div>
    </nav>
    <hr class="bg-dark">

