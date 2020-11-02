<?php 
/* connexion à la bdd */
$pdo = new PDO('mysql:host=mysql;dbname=project-one;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

/* requête */
$query = $pdo->query("SELECT * FROM article");

/* code premettant d'afficher au format date les dates provenant de la bdd */
$intlDateFormater = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT, IntlDateFormatter::NONE);
$query->bindValue(':date', date("Y-m-d"), PDO::PARAM_STR);

$articles = $query->fetchAll();


?>

    <body>

        <main class="container">
            <div class="row">
                <section class="col-12 mt-5 ">
                    <?php foreach ($articles as $article): ?>
                       <div class="card mb-5">
                           <div class="card">
                               <a class="text-decoration-none text-dark" href="page4.php?id=<?=$article["id"]?>">
                                   <img src="https://picsum.photos/350/150?random=1" class="card-img-top" alt="...">
                                   <div class="card-body">
                                       <h5 class="card-title"><?= $article["title"] ?></h5>
                                       <p class="card-text"><?= $article["content"] ?></p>
                                   </div>
                                   <div class="card-footer">
                                       <small class="text-muted">Créer le : <?= $article["createdAt"] ?> Mise à jour : <?= $article["updatedAt"] ?></small>
                                   </div>
                               </a>
                           </div>
                       </div>
                    <?php endforeach ?>
                </section>
            </div>
        </main>
    </body>
</html>