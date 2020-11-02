<?php
//include('fonctions.php');
//$bdd = connect_bdd();

$pdo = new PDO('mysql:host=mysql;dbname=project-one;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$query = $pdo -> prepare("SELECT * FROM article WHERE id = :id");
$id = $_GET['id'];
$id = intval($id);
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
$article = $query->fetch();

$query_cat = $pdo->query("SELECT * FROM category");
$categories = $query_cat->fetchAll();


if (isset($_POST["modifier"])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['id_category'];

    $query = $pdo -> prepare("UPDATE article SET title = '$title', content = '$content', updatedAt = NOW(), category_id ='$category'");
    $query ->execute();

}

?>

<?php if (!empty($save) && $save === true): ?>
    <div class="alert alert-success">article modifié</div> <!-- -->
<?php endif; ?>
<body>
<main class="container">
    <div class="row">
        <section class="col-12">
            <form class="text-center" method="post">
                <div class="shadow p-3 mb-5 mt-5 rounded" style="background-color: #4b4b4b">
                    <div class="mt-3 p-2">
                        <h2 class=" font-weight-bold ">Titre</h2>
                        <div>
                            <input class="form-control" name="title" value="<?= $article["title"] ?>">
                        </div>
                    </div>
                    <div class="mt-3 p-2">
                        <h2 class=" font-weight-bold">Contenu</h2>
                        <div class="input-group">
                            <textarea name="content" class="form-control" aria-label="With textarea"><?= $article["content"] ?></textarea>
                        </div>
                    </div>
                    <div class="mt-3  p-2 ">
                        <h2 class="  font-weight-bold">Categorie</h2>
                        <select class="form-control" name="category">
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category["id"] ?>"><?= $category["category_name"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <button class=" btn btn-dark m-3" type="submit" value="modifier">Modifier</button>
                <a class="btn btn-dark" href="index.php">Retour à l'accueil</a>
            </form>
        </section>
    </div>
</main>
</body>










