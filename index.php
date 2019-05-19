<?php

require __DIR__ . '/vendor/autoload.php';

require 'model.php';

$posts = getPosts();

require_once 'indexView.php';
