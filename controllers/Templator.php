<?php

class Templator {

    // $directory stocke le chemin absolu vers le dossier views
    private $directory;

    // on stocke à l'interieur de $viewVars les clés et valeurs fournies
    // = array() montre simplement au développeur qui va lire ce code que $viewVars est un tableau
    private $viewVars = array();

    public function __construct($param)
    {
        // on stocke l'argument $param dans $directory
        $this->directory = $param;
    }

    // méthode stockant dans l'objet templator sous la forme d'un tableau associatif
    // clé param1 => valeur param2
    // les données fournies "persisteront" dans l'objet
    public function addData($param1, $param2)
    {
        $this->viewVars[$param1] = $param2;
    }

    // méthode getVar
    // prend en argument le nom de la clé à chercher
    // si la clé existe dans le tableau $viewVars, on renvoie la valeur associée
        // $this->getVar('clé') renvoie valeur associée
    public function getVar($param)
    {
        // si la clé existe dans le tableau $this->viewVars
        if (isset($this->viewVars[$param])) {

            // alors on lui renvoie la valeur associée
            return $this->viewVars[$param];

        } else {

            // Sinon on lui renvoie une chaine vide
            return '';
        }
    }

    // méthode affichant une page complete (header, contenu et footer)
    public function display($param)
    {
        // inclusion du header
        $this->include('header');
        // inclusion du fichier demandé
        $this->include($param);
        // inclusion du footer
        $this->include('footer');
    }

    // méthode incluant les fichiers de template
    public function include($param)
    {
        require $this->directory . '/' . $param . '.tpl.php';
    }
}