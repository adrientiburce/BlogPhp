<?php

$title = "Accueil";
$style =  '<link rel="stylesheet" href="style.css">';

ob_start(); ?>

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
            <em><a href="comments/post.php?id=<?= $post['id']; ?>">Commentaires</a></em>
        </p>
    </div>
    <?php
} // Fin de la boucle des billets
?>

<?php $content = ob_get_clean();

require('template.php'); ?>
