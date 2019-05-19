<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mon blog</title>
    <link href="style.css" rel="stylesheet" />
</head>

<body>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=blog_php;charset=utf8', 'root', 'farcai', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

// Récupération du billet
$posts = $bdd->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts WHERE id = ?');
$posts->execute(array($_GET['billet']));
$donnees = $posts->fetch();
?>

<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['title']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>

    <p>
        <?php
        echo nl2br(htmlspecialchars($donnees['content']));
        ?>
    </p>
</div>

<h2>Commentaires</h2>

<?php
$posts->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires
$posts = $bdd->prepare('SELECT author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM comments WHERE post_id = ? ORDER BY date_commentaire_fr');
$posts->execute(array($_GET['billet']));

while ($donnees = $posts->fetch())
{
    ?>
    <p><strong><?php echo htmlspecialchars($donnees['author']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
    <p><?php echo nl2br(htmlspecialchars($donnees['comment'])); ?></p>
    <?php
} // Fin de la boucle des commentaires
$posts->closeCursor();
?>
</body>
</html>