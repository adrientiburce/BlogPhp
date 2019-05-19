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
<?php if (isset($feedback)) { ?>
<div class="alert alert-warning">
        <?= $feedBack; ?>
</div>
<?php
    }

while ($comment = $comments->fetch()) {
    ?>
    <p><strong><?php echo htmlspecialchars($comment['author']); ?></strong>
        le <?php echo $comment['date_commentaire_fr']; ?>
        &nbsp;
        <?php echo nl2br(htmlspecialchars($comment['comment'])); ?>
    </p>
    <?php
}
?>
<hr size="3px">
<h4>Ajouter un commentaire</h4>

<di class="container">
    <form method="post" action="./index.php?action=postComment&amp;id=<?= $post['id']; ?>">
        <div class="form-group">
            <label for="author">Auteur</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <div class="form-group">
            <label for="comment">Message</label>
            <input type="text" class="form-control" id="comment" name="comment" required>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</di>

<?php $content = ob_get_clean();

require 'template.php';

?>
