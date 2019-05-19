<?php $title = "Mon super blog";

ob_start(); ?>

    <h1>Article <?= htmlspecialchars($post['title']); ?></h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']); ?>
        <em>le <?= $post['date_creation_fr']; ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post['content'])); ?>
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
}
?>

<?php $content = ob_get_clean();

require 'template.php';
