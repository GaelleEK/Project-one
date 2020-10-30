<?php
function slugify($string, $delimiter = '-') {
    $oldLocale = setlocale(LC_ALL, '0');
    setlocale(LC_ALL, 'fr.UTF-8');
    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    $clean = strtolower($clean);
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
    $clean = trim($clean, $delimiter);
    setlocale(LC_ALL, $oldLocale);
    return $clean;
}

function connect_bdd() {
    try {
        $pdo = new PDO('mysql:host=mysql;dbname=project-one;host=127.0.0.1', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}