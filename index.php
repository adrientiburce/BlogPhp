<?php

require __DIR__ . '/vendor/autoload.php';

require 'model.php';

$req = getPosts();

require_once 'indexView.php';
