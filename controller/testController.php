<?php
require_once "abstractController.php";
class testController extends abstractController{

    public function title(){
        return "Тестовая страница";
    }

    public function metaKey(){
        return "тест, страница, тестовая страница";
    }

    public function metaDesc(){
        return "Это тестовая страница она предназначена только для теста";
    }

    public function mainContent(){
        return "Тестовый контент предназначенный исключительно для теста";
    }
}