<?php

namespace controller;


abstract class Controller
{
    protected $twig;
    protected $pathView = 'view';

    public function __construct()
    {
        //initialise twig
        $loader = new \Twig\Loader\FilesystemLoader('view');
        $this->twig = new \Twig\Environment($loader);

        //call action
        if (isset($_GET['action'])  && method_exists($this, $_REQUEST['action'] . 'Action')) {
            $action = $_GET['action'] . 'Action';
            $this->$action();
        } else {
            $this->defaultAction();
        }
        $twig = new \Twig\Environment($loader, [
            'debug' => true,
            // ...
        ]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());
    }

    /**
     * Action par défaut du contrôleur
     */
    abstract public function defaultAction();


    protected function render($view, $data = [])
    {

        // sert à passer les données du tableau en variable (pour $data=["nbPerso"=>$nbPerso] donc $data=["nbPerso"] devient $nbPerso grace a extract)
        // extract($data); 


        $fileName =  $view . 'View.twig';
        $filePath = $this->pathView . '/' . $fileName;

        if (file_exists($filePath)) {
            echo $this->twig->render($fileName, $data);
        } else {
            exit("View file not exist !");
        }
    }
}
