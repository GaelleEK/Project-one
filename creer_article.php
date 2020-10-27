<?php
/* connexion à la bdd */
$pdo = new PDO('mysql:host=mysql;dbname=project-one;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

if (isset($_POST["title"])) {

    $title = $_POST["title"];
    $content = $_POST["content"];
    $slug = $_POST["slug"];

    $sql = "INSERT INTO article (title, content, slug) VALUES ('$title', '$content', '$slug')";
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
<!-- If permettant d'afficher une alerte si l'article est bien entré en bdd -->
<?php if (!empty($save) && $save === true): ?>
<div class="alert alert-success">Article enregistré</div>
<?php endif; ?>

    <form method="post">
    <label>Titre</label>
    <input name="title"></input>

    <label>Contenu</label>
    <input name="content"></input>

    <label>Slug</label>
    <input name="slug"></input>

    <button type="submit">Enregistrer</button>

    </form>
    
</div>

</body>
</html>