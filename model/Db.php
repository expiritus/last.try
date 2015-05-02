<?php

class Db{

    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DB_NAME = 'last.try';
    private $users_table = 'xyz_users';

    static $db = null;
    private $mysqli;

    private function __construct(){
        $this->mysqli = new mysqli(self::HOST, self::USER, self::PASSWORD, self::DB_NAME);
        $this->mysqli->query("SET NAMES 'UTF8'");
    }

    private function __clone(){}

    public function __destruct(){
        if($this->mysqli){
            $this->mysqli->close();
        }
    }

    static function getMysqli(){
        if(self::$db === null){
            self::$db = new Db();
        }
        return self::$db;
    }



    public function saveUser($name, $surname, $login, $email, $password, $role = 'user'){
        $date_registration = date('Y-m-d');
        $time_registration = date('H:i:s');
        $query = "INSERT INTO $this->users_table(
                                name,
                                surname,
                                login,
                                email, 
                                password,
                                role,
                                date_registration,
                                time_registration
                        ) VALUES (
                                '$name',
                                '$surname',
                                '$login',
                                '$email',
                                '$password',
                                '$role',
                                '$date_registration',
                                '$time_registration'
                        )";
        $result = $this->mysqli->query($query);
        if($result){
            return true;
        }else{
            return false;
        }

    }

    public function getUserOnLogin($login){
        $query = "SELECT * FROM $this->users_table WHERE login = '$login'";
        $result = $this->mysqli->query($query);
        if($result->num_rows > 0){
            $user = array();
            while($row = $result->fetch_assoc()){
                $user['id'] = $row['id'];
                $user['login'] = $row['login'];
                $user['password'] = $row['password'];
            }
            return $user;
        }else{
            return false;
        }
    }
}