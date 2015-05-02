<?php
require_once "abstractController.php";
require_once $_SERVER['DOCUMENT_ROOT']."/model/Db.php";
class indexController extends abstractController{

    public function title(){
        return "Главная страница";
    }

    public function metaKey(){
        return "магазин, интернет магазин";
    }

    public function metaDesc(){
        return "Самый лучший движок";
    }

    public function mainContent(){
        return "Динамическая часть";
    }

    public function registerUser($name, $surname, $login, $email, $password){
        if($name == "") return false;
        if($surname == "")return false;
        if($login == "")return false;
        if($email == "")return false;
        if($password == "")return false;

        $name = htmlspecialchars($name);
        $surname = htmlspecialchars($surname);
        $login = htmlspecialchars($login);
        $email = htmlspecialchars($email);
        $password = htmlspecialchars(md5($password));
        $db = Db::getMysqli();
        $save = $db->saveUser($name, $surname, $login, $email, $password);
        if($save){
            return true;
        }
    }

    public function authUser($login, $password){
        $login = htmlspecialchars($login);
        $password = htmlspecialchars(md5($password));
        $db = Db::getMysqli();
        $user = $db->getUserOnLogin($login);
        if($login == $user['login'] and $password == $user['password']){
            session_start();
            $_SESSION['login'] = $user['login'];
            return $user;
        }else{
            return false;
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        header("location: ".$_SERVER['HTTP_REFERER']);
        exit();
    }

}