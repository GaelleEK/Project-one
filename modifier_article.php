<?php
//include('fonctions.php');
//$bdd = connect_bdd();

$pdo = new PDO('mysql:host=mysql;dbname=project-one;host=127.0.0.1', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

$query = $pdo ->prepare("SELECT * FROM article WHERE id = :id");
$id = $_GET['id'];
$id = intval($id);
$query -> bindParam(':id', $id, PDO::PARAM_INT);
$query ->execute();
$articles = $query -> fetch();


//faire un formulaire avec

//<input type="text" name="title" value="<?php echo  $article["title"] ?>"></input> etc
//et finir avec un type submit











