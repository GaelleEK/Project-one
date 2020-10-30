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
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
                crossorigin="anonymous"></script>
        <title>Liste des articles</title>
    </head>
    <body>

        <main class="container">
            <div class="row">
                <section class="col-12 mt-5 ">
                    <?php foreach ($articles as $article): ?>
                       <div class="card mb-5">
                           <a class="text-decoration-none text-dark" href="detail_article.php?id=<?=$article["id"]?>">
                               <div class="card">
                                   <img src="https://picsum.photos/350/150?random=1" class="card-img-top" alt="...">
                                   <div class="card-body">
                                       <h5 class="card-title"><?= $article["title"] ?></h5>
                                       <p class="card-text"><?= $article["content"] ?></p>
                                   </div>
                                   <div class="card-footer">
                                       <small class="text-muted">Créer le : <?= $article["createdAt"] ?> Mise à jour : <?= $article["updatedAt"] ?></small>
                                   </div>
                               </div>
                           </a>
                       </div>
                    <?php endforeach ?>
                </section>
            </div>
        </main>
    </body>
</html>