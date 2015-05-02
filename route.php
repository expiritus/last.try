<?php
function __autoload($class_name){
    require_once $_SERVER['DOCUMENT_ROOT']."/controller/".$class_name.".php";
}

switch($_SERVER['REQUEST_URI']){
    case '/': $page = new indexController();
        break;
    case '/index.php':$page = new indexController();
        break;
    case preg_match("'".$_SERVER['REQUEST_URI']."'", '/^[0-9a-z][0-9A-Z]*$/'): $page = new notFoundController();
}

if(isset($_GET)){
    foreach($_GET as $key => $value){
        switch($key){
            case 'test': $page = new testController();
                         $page->logout();
                break;
            case 'logout':$page = new indexController();
                          $page->logout();
                break;
            default: $page = new notFoundController();
        }
    }
}

if(isset($_POST)){
    foreach($_POST as $key => $value){
        switch($key){
            case 'register_name':
                $name = $_POST['register_name'];
                $surname = $_POST['register_surname'];
                $login = $_POST['register_login'];
                $email = $_POST['register_email'];
                $password = $_POST['register_password'];
                $registerUser = new indexController();
                $reg = $registerUser->registerUser($name, $surname, $login, $email, $password);
                echo $reg;
                break;
            case 'login_send':
                $login = $_POST['login'];
                $password = $_POST['password'];
                $authUser = new indexController();
                $user = $authUser->authUser($login, $password);
                header("location: ".$_SERVER['HTTP_REFERER']);
                exit();
        }
    }
}






