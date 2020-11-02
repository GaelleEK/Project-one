<?php
/* connexion à la bdd */
$pdo = new PDO('mysql:host=mysql;dbname=project-one;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

/* requête le 'desc limit' cible le dernier article crée */
$query = $pdo->query("SELECT * FROM article ORDER BY createdAt DESC LIMIT 6");


/* code permettant d'afficher au format date les dates provenant de la bdd */
$intlDateFormater = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT, IntlDateFormatter::NONE);
$query->bindValue(':date', date("Y-m-d"),PDO::PARAM_STR);

/* liaison entre colonne et variable */
$query->bindColumn('id', $id, PDO::PARAM_INT);
$query->bindColumn('title', $title, PDO::PARAM_STR);
$query->bindColumn('content', $content, PDO::PARAM_STR);
$query->bindColumn('category_id', $category, PDO::PARAM_INT);
$query->bindColumn('slug', $slug, PDO::PARAM_STR);
$query->bindColumn('createdAt', $dateC);
$articles = $query->fetchAll();
?>
<body>
    <main class="container">
        <div class="row row-cols-1 row-cols-md-2">
            <?php foreach ($articles as $article): ?>
                <a class="text-decoration-none text-dark" href="page5.php?id=<?=$article["id"]?>">
                    <div class="col mt-5 ">
                        <div class="card ">
                            <img src="https://picsum.photos/350/150?random=1" class="card-img-top" alt="..." />
                            <div class="card-body">
                                <h5 class="card-title"><?= $article["title"] ?></h5>
                                <p class="card-text"><?= $article["content"] ?></p>
                                <p class="card-text"><?= $article["category_id"] ?></p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">créer le : <?= $dateC ?> </small>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>