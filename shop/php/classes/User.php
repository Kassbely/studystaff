<?php

class User
{ private $name;
  private $surname;
  private $email;
  private $id;

  function __construct($id, $name, $surname, $email)
  {
    $this->id = $id;
    $this->name = $name;
    $this->surname = $surname;
    $this->email = $email;
  }
  function getId() { return $this->id;}
  function getName() {return $this->name;}
  function getSurname() {return $this->surname;}
  function getEmail()  {return $this->email;}

  //Статический метод добавления пользователя в бд
  static function addUser($name, $surname, $email, $pass)
  {
    global $mysqli;
    $email = mb_strtolower(trim($email));
    $pass = trim($pass);
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'");
    if ($result->num_rows != 0) {
      return json_encode(["result" => "exist"]);
    } else {
        return json_encode(["result" => "success"]);
    }
  }
}
