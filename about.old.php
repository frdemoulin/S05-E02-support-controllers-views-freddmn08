<?php

//include(__DIR__.'/views/header.tpl.php');

// inclusion de la classe MainController
include(__DIR__.'/controllers/MainController.php');

// Instanciation de la classe MainController
$controller = new MainController();

// Appel de la méthode correspondant à ce point d'entrée (page)
$controller->about();

// include(__DIR__.'/views/about.tpl.php');
//include(__DIR__.'/views/footer.tpl.php');