<?php
$menu = [
    ['label' => 'Accueil',  'href' => '#'],
    ['label' => 'Projets',  'href' => '#'],
    ['label' => 'Tâches',   'href' => '#'],
    ['label' => 'Équipe',   'href' => '#'],
    ['label' => 'Messages', 'href' => '#'],
];

// Afficher le JSON
echo json_encode($menu, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
