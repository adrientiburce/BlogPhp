<?php

require './model/model.php';

function showHome()
{
    $posts = getPosts();
    require_once './views/homeView.php';
}

function showPost()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);

    require('./views/postView.php');
}
