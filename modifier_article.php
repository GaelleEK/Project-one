<?php
//include('fonctions.php');
//$bdd = connect_bdd();

$pdo = new PDO('mysql:host=mysql;dbname=project-one;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$query = $pdo->prepare("SELECT * FROM article WHERE id = :id");
$id = $_GET['id'];
$id = intval($id);
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
$articles = $query->fetch();


//faire un formulaire avec

//<input type="text" name="title" value="<?php echo  $article["title"] ?>"></input> etc
//et finir avec un type submit

<?php if (!empty($save) && $save === true): ?>
    <div class="alert alert-success">article modifié</div> <!-- -->
<?php endif; ?>

<main class="container">
    <div class="row">
        <section class="col-12">
            <form class="text-center" method="post">
                <div class="shadow p-3 mb-5 mt-5 rounded" style="background-color: #4b4b4b">
                    <div class="mt-3 p-2">
                        <h2 class=" font-weight-bold ">Titre</h2>
                        <div>
                            <input class="form-control  " name="title"></input>
                        </div>
                    </div>
                    <div class="mt-3 p-2">
                        <h2 class=" font-weight-bold">Contenu</h2>
                        <div class="input-group">
                            <textarea name="content" class="form-control" aria-label="With textarea"></textarea>
                        </div>
                    </div>
                    <div class="mt-3  p-2 ">
                        <h2 class="  font-weight-bold">Categorie</h2>
                        <select class="form-control" name="category">
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category["id"] ?>"> <?= $category["category_name"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <button class=" btn btn-dark m-3" type="submit" value="enregistrer">Modifier</button>
                <a class="btn btn-dark" href="index.php">Retour à l'accueil</a>
            </form>
        </section>
    </div>
</main>











