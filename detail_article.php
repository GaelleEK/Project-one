<?php
include('fonctions.php');

$id = $_POST["id"];

$bdd = connect_bdd();

$query = "SELECT * FROM article WHERE id = $id";

$bdd -> query($query);

?>
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