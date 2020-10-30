<?php
include('fonctions.php');

$id = $_POST["id"];

$bdd = connect_bdd();

$query = "SELECT * FROM article WHERE id = $id";

$bdd -> query($query);

$bdd =

