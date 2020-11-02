<?php
/* connexion à la bdd */
$pdo = new PDO('mysql:host=mysql;dbname=project-one;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

/* requête */
$idCat = $_GET["id"];
$query = $pdo->query("SELECT *
                                FROM article a
                                INNER JOIN category c 
                                ON c.id = a.category_id
                                WHERE $idCat = a.category_id");

        $query->bindColumn('createdAt', $dateC);
        $articles = $query->fetchAll();
?>

<?php foreach ($articles as $article): ?>
                <a class="text-decoration-none text-dark href="page4.php?id=<?=$article["id"]?>
                    <div class="col mt-5 ">
                        <div class="card ">
                            <img src="https://picsum.photos/350/150?random=1" class="card-img-top" alt="..." />
                            <div class="card-body">
                                <h5 class="card-title"><?= $article["title"] ?></h5>
                                <p class="card-text"><?= $article["content"] ?></p>
                                <p class="card-text"><?= $article["category_name"] ?></p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">créer le : <?= $dateC ?> </small>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>

