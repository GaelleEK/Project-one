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

<?php if (!empty($save) && $save === true): ?>

    <div class="alert alert-success">Article enregistré</div>


<?php endif; ?>
<main class="container">
    <div class="row">
        <section class="col-12">

            <form class="text-center" method="post">



                <div class="shadow p-3 mb-5 mt-5  rounded"   style="background-color: #4b4b4b">
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
                        <div >
                            <select class="form-control " >
                                <!-- foreach -->
                                <option><!-- option-->
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <button class=" btn btn-dark m-3 " type="submit" value="enregistrer">Enregistrer</button>


    </div>

    </div>



    </form>

    </section>
    </div>
</main>

</body>
</html>