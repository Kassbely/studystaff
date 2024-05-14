<?php 
class User {
    private $name;
    private $surname;
    private $email;
    private $id;

    function __construct($id, $name, $surname, $email) {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->id = $id;
    }
    function getId() {
        return $this->id;
    }
    function getName() {
        return $this->name;
    }
    function getSurname() {
        return $this->surname;
    }
    function getEmail() {
        return $this->email;
    }
    //статический метод для добавления пользователя
    static function addUser() {
        echo "User added!";
    }
}
