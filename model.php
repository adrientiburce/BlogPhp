<?php
try {
    $database = new PDO('mysql:host=localhost:3306; dbname=blog_php; charset=utf8', 'root', 'farcai', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// On récupère les 5 derniers billets

function getPosts()
{
    global $database;
    return $database->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts ORDER BY date_creation_fr DESC LIMIT 0, 5');
}
