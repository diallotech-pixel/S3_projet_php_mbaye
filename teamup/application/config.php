<?php
require_once __DIR__ . '/../comfpl/main.php';

$bootstrap = new bundle();

$bootstrap->css_set = array(
    new cssItemBundle("public/lib/bootstrap/css/bootstrap.min.css")
);

$bootstrap->script_set = array(
    new scriptItemBundle("public/lib/bootstrap/js/bootstrap.bundle.min.js")
);
