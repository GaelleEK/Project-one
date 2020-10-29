<?php
/* connexion à la bdd */
$pdo = new PDO('mysql:host=mysql;dbname=project-one;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

/* requête */
$query = $pdo->query("SELECT * FROM category");

$categories = $query->fetchAll();


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Menu des catégories</title>
</head>
<body>
<select>
<?php foreach ($categories as $category): ?>
    <option><?= $category["category_name"] ?></option>
<?php endforeach; ?>
</select>
</body>
</html>