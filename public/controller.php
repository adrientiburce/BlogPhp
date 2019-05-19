<?php

require '../model.php';

function showHome()
{
    $posts = getPosts();
    require_once 'indexView.php';
}

function showPost()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);

    require('post/postView.php');
}