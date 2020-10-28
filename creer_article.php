<?php
/* appel fichier fonctions */
require_once 'fonctions.php';

/* connexion à la bdd */
$pdo = new PDO('mysql:host=mysql;dbname=project-one;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

/* requete pour récuperer les catégories pour le select */
$query = $pdo->query("SELECT * FROM category");
$categories = $query->fetchAll();

// si la variable post-title est affecté et n'est pas vide
if (isset($_POST["title"])&& !empty($_POST["title"])) {

        $title = $_POST["title"];
        $content = $_POST["content"];
        $category = $_POST["category"];
        $slug = slugify($title);

        $sql = "INSERT INTO article (title, content, createdAt, category_id, slug) VALUES ('$title', '$content', NOW(), '$category', '$slug')";
        $pdo -> exec($sql);

        $save = true;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Créer un article</title>
</head>
<body>

    <?php if (!empty($save) && $save === true): ?>
        <div class="alert alert-success">article enregistré</div>
    <?php endif; ?>

    <main class="container">
        <div class="row">
            <section class="col-12">
                <form class="text-center" method="post">
                    <div class="shadow p-3 mb-5 mt-5 rounded"   style="background-color: #4b4b4b">

                        <div class="mt-3 p-2" >
                                <h2 class=" font-weight-bold ">Titre</h2>
                                <div >
                                    <input class="form-control  "  name="title"></input>
                                </div>
                        </div>

                        <div class="mt-3 p-2" >
                            <h2 class=" font-weight-bold">Contenu</h2>
                            <div class="input-group">
                                <textarea name="content" class="form-control" aria-label="With textarea"></textarea>
                            </div>
                        </div>

                        <div class="mt-3  p-2 ">
                            <h2 class="  font-weight-bold">Categorie</h2>
                            <select class="form-control" name="category">
                                <?php foreach ($categories as $category): ?>
                                    <option value = "<?=$category["id"] ?>"> <?= $category["category_name"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <button class=" btn btn-dark m-3" type="submit" value="enregistrer">Enregistrer</button>
                    <a class="btn btn-dark" href="index.php">Retour à l'accueil</a>
                </form>
            </section>
        </div>
    </main>

</body>
</html>