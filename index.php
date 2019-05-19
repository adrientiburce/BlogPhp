<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mon blog</title>
    <link href="style.css" rel="stylesheet" />
</head>

<body>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>

<?php
require __DIR__.'/vendor/autoload.php';
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost:3306; dbname=blog_php; charset=utf8', 'root', 'farcai', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}



// On récupère les 5 derniers billets
$req = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts ORDER BY date_creation_fr DESC LIMIT 0, 5');

//dump($req->fetch());

while ($donnees = $req->fetch())
{
    ?>
    <div class="news">
        <h3>
            <?php echo htmlspecialchars($donnees['title']); ?>
            <em>le <?php echo $donnees['date_creation_fr']; ?></em>
        </h3>

        <p>
            <?php
            // On affiche le contenu du billet
            echo nl2br(htmlspecialchars($donnees['content']));
            ?>
            <br />
            <em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
        </p>
    </div>
    <?php
} // Fin de la boucle des billets
$req->closeCursor();
?>
</body>
</html>
