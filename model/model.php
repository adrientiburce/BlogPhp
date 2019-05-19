<?php
function dbConnect()
{
    try {
        $database = new PDO('mysql:host=localhost:3306; dbname=blog_php; charset=utf8', 'root', 'farcai', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $database;
}

function getPosts()
{
    $database = dbConnect();
    return $database->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts ORDER BY date_creation_fr DESC LIMIT 0, 5');
}

function getPost($postId)
{
    $database = dbConnect();
    $request = $database->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts WHERE id= ?');
    $request->execute(array($postId));
    return $request->fetch();
}

function getComments($postId)
{
    $database = dbConnect();
    $comments = $database->prepare('SELECT author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM comments WHERE post_id = ? ORDER BY date_commentaire_fr');
    $comments->execute(array($postId));
    return $comments;
}
