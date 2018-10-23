<?php

// récupération de _url du .htaccess
// renvoie tout ce qui est après le / dans l'url
// exemple : http://localhost/s05/e02/S05-E02-support-controllers-views-master/products.php renvoie /products.php en $_GET

// echo $_GET['_url'];

// include(__DIR__.'/views/header.tpl.php');

// 1- Chargement des fichiers définissants les classes
include(__DIR__.'/controllers/MainController.php');
include(__DIR__.'/controllers/Templator.php');

// Instanciation de la classe MainController
$controller = new MainController();

// dispatcher

if (!isset($_GET['_url'])) {
    $controller->home();
} elseif($_GET['_url'] === '/about-us'){
    $controller->about();
} elseif($_GET['_url'] === '/our-products'){
    $controller->products();
} elseif($_GET['_url'] === '/our-store'){
    $controller->store();
} else {
    $controller->show('error');
}
