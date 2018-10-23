<?php

class MainController {

    public function home()
    {
        // Délègue l'affichage à la méthode "show" du MainController
        $this->show('index', ['menuActive' => 'index']);
    }

    public function about()
    {
        // Délègue l'affichage à la méthode "show" du MainController
        $this->show('about', ['menuActive' => 'about']);
    }

    public function products()
    {
        // Délègue l'affichage à la méthode "show" du MainController
        $this->show('products', ['menuActive' => 'products']);
    }

    public function store()
    {
        // Délègue l'affichage à la méthode "show" du MainController
        $this->show('store', ['menuActive' => 'store']);
    }

    public function show($viewName, $viewVars=array()) {

        // instanciation de la classe Templator
        // prend en argument le chemin vers les views
        $templator = new Templator(__DIR__.'/../views/');

        // définition des variables pour les views
        foreach($viewVars as $varName => $varValue) {
            $templator->addData($varName, $varValue);
        }

        // Penser à modifier les variables dans les templates ($this->getVar())
        $templator->display($viewName);
        // $viewVars est disponible dans chaque fichier de vue
      }

    /*
    public function show($viewName, $viewVars=array()) {
        // $viewVars est disponible dans chaque fichier de vue
        include(__DIR__.'/../views/header.tpl.php');
        include(__DIR__.'/../views/'.$viewName.'.tpl.php');
        include(__DIR__.'/../views/footer.tpl.php');
      }
    */

}