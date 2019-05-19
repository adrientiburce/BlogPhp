<?php

require './controller/controller.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            showPost();
        } else {
            echo 'Aucun billet à afficher';
        }
    }
    if ($_GET['action'] == 'home') {
        showHome();
    }
} else {
    showHome();
}
