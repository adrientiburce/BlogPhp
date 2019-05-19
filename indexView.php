<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Mon blog</title>
    <link href="style.css" rel="stylesheet"/>
</head>

<body>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>


<?php
while ($post = $posts->fetch()) {
    ?>
    <div class="news">
            <h3>
                <?= htmlspecialchars($post['title']); ?>
                <em>le <?php echo $post['date_creation_fr']; ?></em>
            </h3>

            <p>
                <?= nl2br(htmlspecialchars($post['content'])); ?>
                <br/>
                <em><a href="commentaires.php?billet=<?= $post['id']; ?>">Commentaires</a></em>
            </p>
    </div>
    <?php
} // Fin de la boucle des billets
$posts->closeCursor();
?>
</body>
</html>
