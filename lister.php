<?php 
/* connexion à la bdd */
$pdo = new PDO('mysql:host=mysql;dbname=project-one;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
/* requête */
$query = $pdo->query("SELECT * FROM article");
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
   <ul>
   <?php foreach ($articles as $article): ?>
    <li> <?= $article[title]." : ".$article[content]."," ?> </li>
    <?php endforeach ?>
   </ul>
</body>
</html>