<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mon blog</title>
    <link href="../../style.css" rel="stylesheet" />
</head>

<body>
<h1>Mon super blog !</h1>
<p><a href="../index.php">Retour à la liste des billets</a></p>

<?php


?>

<div class="news">
    <h3>
        <?php echo htmlspecialchars($post['title']); ?>
        <em>le <?php echo $post['date_creation_fr']; ?></em>
    </h3>

    <p>
        <?php
        echo nl2br(htmlspecialchars($post['content']));
        ?>
    </p>
</div>

<h2>Commentaires</h2>

<?php

while ($comment = $comments->fetch())
{
    ?>
    <p><strong><?php echo htmlspecialchars($comment['author']); ?></strong> le <?php echo $comment['date_commentaire_fr']; ?></p>
    <p><?php echo nl2br(htmlspecialchars($comment['comment'])); ?></p>
    <?php
} // Fin de la boucle des commentaires

?>
</body>
</html>
