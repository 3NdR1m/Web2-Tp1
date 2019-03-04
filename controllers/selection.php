<?php
include_once("classes/Car.php");  

    class selectionController
    {
        public $model;

        public function __construct()
        {
            $this->model = new Model();
        }

        public function invoke()  
        {  
             if (!isset($_GET['selected_cars']))  
             {  
                  // No car selected; go to accueil.
                  $books = $this->model->getBookList();  
                  include 'view/booklist.php'; 
             } 
             else 
             {
                  include "./views/selection.php?";  
             }  
        }  
    }
?>