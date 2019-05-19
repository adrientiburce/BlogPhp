<?php

require './model/model.php';

function showHome()
{
    $posts = getPosts();
    require_once './views/homeView.php';
}

function showPost($feedback = null)
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    $feedBack = $feedback;
    require('./views/postView.php');
}

function insertComment($feedback)
{
    $affectedLines = addComment($_GET['id'], $_POST['author'], $_POST['comment']);
    if ($affectedLines === false) {
        $feedback = "Une erreur  est survenue";
    }
    showPost($feedback);
}
