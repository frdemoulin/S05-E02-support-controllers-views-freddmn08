# Structurer en objets une application

Voici un petit site internet de 4 pages.

Actuellement, il est composé de 4 fichiers HTML statiques.

On va améliorer ce site et rendre le tout dynamique, tout en suivant une structuration objet plus professionnelle, plus maintenable et plus scalable.

## Etape 1 : préparation

- déplacer les fichiers HTML dans un sous-répertoire _views_
- renommer ces fichiers HTML en fichiers PHP
- créer les 4 fichiers "point d'entrée" PHP à la racine du projet :
  - index.php
  - products.php
  - store.php
  - about.php
- dans chacun de ces fichiers, inclure le fichier de vue correspondant
  ```php
  include(__DIR__.'/views/index.tpl.php'); // pour la home
  ```

## Etape 2 : views

- `view` ou `template`, même combat :muscle: :art: :lipstick:
- factoriser le code HTML répété dans les fichiers de vues
  - créer une vue `header.tpl.php` dans _views_
  - créer une vue `footer.tpl.php` dans _views_
- modifier les fichiers "point d'entrée" pour inclure ces vues `header.tpl.php` et `footer.tpl.php`

## Etape 3 : controllers

- créer une classe `MainController` dans le sous-répertoire `controllers`
- déclarer 4 méthodes vides dans ce `MainController` :
  - `home` (correspondant à la page `index.php`)
  - `about` (correspondant à la page `about.php`)
  - `products` (correspondant à la page `products.php`)
  - `store` (correspondant à la page `store.php`)
- déclarer la méthode `show` dans `MainController` qui va s'occuper d'inclure les _views_
  ```php
  public function show($viewName, $viewVars=array()) {
    // $viewVars est disponible dans chaque fichier de vue
    include(__DIR__.'/../views/header.tpl.php');
    include(__DIR__.'/../views/'.$viewName.'.tpl.php');
    include(__DIR__.'/../views/footer.tpl.php');
  }
  ```
- dans le corps des 4 méthodes vides, appeler la méthode `show` sur l'objet courant (`$this`) en précisant en paramètre quelle _views_ vous souhaitez
  ```php
  public function home() {
    // Délègue l'affichage à la méthode "show" du MainController
    $this->show('home');
  }
  ```
- modifier chaque fichier "point d'entrée"
  - retirer l'inclusion existante (_views_)
  - inclure la classe `MainController`
  - instancier un objet `MainController`
  - appeler la méthode de l'objet `MainController` correspondant au point d'entrée
    ```php
    <?php
    // File index.php
    // Instanciation de la classe MainController
    $controller = new MainController();
    // Appel de la méthode correspondant à ce point d'entrée (page)
    $controller->home();
    ```
- `point d'entrée` > `méthode du controller` > `views` > :ok_hand:

## Bonus Templator

Intégrer notre classe de template `Templator` :nerd_face:

- `Templator` est un système de gestion des templates permettant de faire mieux que de simples `include` de _views_
- rechercher à quel endroit du code actuel nous incluons les _views_
- remplacer ces `include` ou `require` par l'utilisation de la classe `Templator`
  - instancier l'objet
  - définir les "variables" pour les _views_ (fournies en paramètre)
  - appeler la méthode `display()`

  <details><summary>Indice "endroit du code"</summary>

  Inclure les views ou templates, c'est afficher/générer le code HTML  
  Une seule méthode s'occupe de la partie affichage :wink:

  </details>

  <details><summary>Spoiler "endroit du code"</summary>

  méthode `show` du `MainController`

  </details>
  
  <details><summary>Spoiler réponse</summary>

  ```php
  public function show($viewName, $viewVars=array()) {
    // Instanciation de l'objet Templator
    $templateEngine = new Templator(__DIR__.'/../views/');

    // Définition des "variables" pour les _views_
    foreach ($viewVars as $varName=>$varValue) {
      $templateEngine->addData($varName, $varValue);
    }

    // Penser à modifier les variables dans les templates ($this->getVar())
    $templateEngine->display($viewName);
  }
  ```

  </details>

## Dernière étape

Job's done ! :muscle: :tada: :champagne:

Se féliciter, relire la structure de nos fichiers et se représenter le parcours du script PHP dans nos fichiers pour afficher une page HTML
