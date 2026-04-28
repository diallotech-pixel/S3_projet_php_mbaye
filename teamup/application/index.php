<?php

// Traitement du POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $theme = isset($_POST['lst_theme']) ? (int)$_POST['lst_theme'] : 0;
    setcookie('user_profile', $theme, time() + 3600, '/');
}

// Récupération du cookie
$theme = 0;
if (isset($_COOKIE['user_profile'])) {
    $theme = (int)$_COOKIE['user_profile'];
}

require_once 'config.php';

// Appliquer le thème selon la valeur de $theme
switch ($theme) {
    case 1:
        FPLGlobal::set_theme('default');
        break;
    case 2:
        FPLGlobal::set_theme('fonce');
        break;
    default:
        FPLGlobal::set_theme('default');
        break;
}

require_once 'views/_layout.php';
