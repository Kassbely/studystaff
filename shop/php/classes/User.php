<?php

class User
{

  private $name;
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
  function getId()
  {
    return $this->id;
  }
  function getName()
  {
    return $this->name;
  }
  function getSurname()
  {
    return $this->surname;
  }
  function getEmail()
  {
    return $this->email;
  }

  //Статический метод добавления пользователя в бд
  static function addUser()
  {
    global $mysqli;
  }
}
