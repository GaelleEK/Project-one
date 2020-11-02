<?php
include('fonctions.php');

/* connexion à la bdd */
$pdo = new PDO('mysql:host=mysql;dbname=project-one;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$query = $pdo -> prepare("SELECT * FROM article WHERE id = :id");
$id = $_GET['id'];
$id = intval($id);
$query->bindParam(':id', $id, PDO::PARAM_INT);

$query->execute();
$article= $query->fetch();

?>
<body>
<div class="col mt-5 ">
    <div class="card ">
        <img src="https://picsum.photos/350/150?random=1" class="card-img-top" alt="..." />
        <div class="card-body">
            <h5 class="card-title"><?= $article["title"] ?></h5>
            <p class="card-text"><?= $article["content"] ?></p>
            <p class="card-text"><?= $article["category_id"] ?></p>
        </div>
        <div class="card-footer">
            <small class="text-muted">créer le : <?= $article["createdAt"] ?> </small>
        </div>
    </div>
</div>
</body>