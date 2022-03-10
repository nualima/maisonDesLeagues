<?php
namespace controller;


abstract class Controller
{
    protected $twig;
    protected $pathView = 'view';

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('view');
        $this->twig = new \Twig\Environment($loader);

        if( isset( $_GET['action'] )  && method_exists($this, $_REQUEST['action'] . 'Action') )
         {
            $action = $_GET['action'] . 'Action';
            $this->$action();
        } else {
            $this->defaultAction();
        }
    }

    /**
     * Action par défaut du contrôleur
     */
    abstract public function defaultAction();


    protected function render($view, $data=[])
    {
        extract( $data );


        $fileName =  $view . 'View.twig';
        $filePath = $this->pathView . '/' . $fileName;

        if( file_exists( $filePath ) ) {
            echo $this->twig->render( $fileName, $data );
        } else {
            exit( "View file not exist !" );
        }
    }

 
}