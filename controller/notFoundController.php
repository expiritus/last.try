<?php
require_once "abstractController.php";
class notFoundController extends abstractController{

    public function title(){
        echo "Страница не найдена";
        header("HTTP/1.0 404 Not Found");

    }

    public function metaKey(){
        return "";
    }

    public function metaDesc(){
        return "";
    }

    public function mainContent(){
        return "Страница не найдена";
    }

}