<?php

require './controller/controller.php';

if (isset($_GET['action'])) {
    // show all posts
    if ($_GET['action'] == 'home') {
        showHome();
    }
    // show 1 post with comments
    if ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            showPost();
        } else {
            echo 'Aucun billet à afficher';
        }
    }
    // add comment
    if ($_GET['action'] == 'postComment') {
        if(!empty($_POST['author']) && !empty($_POST['comment'])){
            $feedBack = "Commentaire ajouté";
            insertComment($feedBack);
        } else{
            $feedBack = "Une erreur est survenue";
        }
    }

} else {
    showHome();
}
