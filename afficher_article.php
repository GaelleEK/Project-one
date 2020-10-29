<?php
/* connexion à la bdd */
$pdo = new PDO('mysql:host=mysql;dbname=project-one;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

/* requête le 'desc limit' cible le dernier article crée */
$query = $pdo->query("SELECT * FROM article ORDER BY createdAt DESC LIMIT 1");


/* code permettant d'afficher au format date les dates provenant de la bdd */
$intlDateFormater = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT, IntlDateFormatter::NONE);
$query->bindValue(':date', date("Y-m-d"),PDO::PARAM_STR, );

/* liaison entre colonne et variable */
$query->bindColumn('id', $id, PDO::PARAM_INT);
$query->bindColumn('title', $title, PDO::PARAM_STR);
$query->bindColumn('content', $content, PDO::PARAM_STR);
$query->bindColumn('category_id', $category, PDO::PARAM_INT);
$query->bindColumn('slug', $slug, PDO::PARAM_STR);
$query->bindColumn('createdAt', $dateC);
$article = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="title">
    <?= $title ?>
</div>

<div>
    <?= $content ?>
</div>

<div>
    <?= $category ?>
</div>

<div>
    <?= $dateC ?>
</div>

</body>
</html>