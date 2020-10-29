<?php
/* connexion à la bdd */
$pdo = new PDO('mysql:host=mysql;dbname=project-one;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

/* requête */
$query = $pdo->query("SELECT * FROM category");

$categories = $query->fetchAll();

?>

<select>
    <option><a class="nav-link" href="page1.php">Article</a></option>
<?php foreach ($categories as $category): ?>
    <option><?= $category["category_name"] ?></option>
<?php endforeach; ?>
</select>