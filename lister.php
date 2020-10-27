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
    <title>Liste des articles</title>
</head>
<body>
   <table>
    <thead class="thead-dark">
        <tr>
            <th>Titre</th>
            <th>Contenu</th>
            <th>Date de création</th>
            <th>Date de mise à jour</th>
            <th>Slug</th>
        </tr>
    </thead>

            <?php foreach ($articles as $article): ?>  
            <tr>
                <td><?= $article["title"] ?> </td>
                <td><?= $article["content"] ?></td>
                <td><?= $article["createdAt"] ?> </td>
                <td><?= $article["updatedAt"] ?> </td>
                <td><?= $article["slug"] ?> </td>
            </tr> 
            <?php endforeach ?>
    </table>
    <a class="btn" href="creer_un_article.php">Créer un article</a>
</body>
</html>