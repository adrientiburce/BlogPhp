<?php
require '../../model.php';


if (isset($_GET['id']) && $_GET['id']) {
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    require('postView.php');
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}

