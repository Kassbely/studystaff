<?php

class Person {
  private $name;
  private $surname;
  private $age;
  private $hp;
  private $mother;
  private $father;
//   private $momgrandmother,
//   private $momgrandfather,
//   private $dadgrandmother,
//   private $dadgrandfather;

  function __construct($name, $surname, $age, $mother = null, $father = null)
  {
    $this->name = $name;
    $this->surname = $surname;
    $this->age = $age;
    $this->mother = $mother;
    $this->father = $father;
    $this->hp = 100;
  }

  function sayHi($name)
  {
    return "Hi, $name, I`m " . $this->name;
  }

  function setHp($hp)
  {
    if ($this->hp + $hp > 100) $this->hp = 100;
    else $this->hp = $this->hp + $hp;
  }

  function getHp()
  {
    return $this->hp;
  }
  function getName()
  {
    return $this->name;
  }
  function getSurname(){
    return $this->surname;
  }
  function getMother()
  {
    return $this->mother;
  }
  function getFather()
  {
    return $this->father;
  }
//   function getMomgrandMother(){
//     return $this->momgrandmother;
//   }
//   function getMomgrandFather(){
//     return $this->momgrandfather;
//   }
//   function getDadgrandMother(){
//     return $this->dadgrandmother;
//   }
//   function getDadgrandFather(){
//     return $this->dadgrandfather;
//   }

  function getInfo() {
    return "<b>Меня зовут - </b>" . $this->getName() . "&nbsp;" . $this->getSurname().  
      "<br><b> Моих папу и маму зовут: </b>" . $this->getFather()->getName() . "&nbsp;" . $this->getFather()->getSurname(). "&nbsp;и&nbsp;"  . $this->getMother()->getName() . "&nbsp;" . $this->getMother()->getSurname(). 
      "<br><b> Моих дедушку и бабушку по папе зовут: </b>" . $this->getFather()->getFather()->getName() . "&nbsp;" . $this->getFather()->getFather()->getSurname(). "&nbsp;и&nbsp;"  . $this->getFather()->getMother()->getName() . "&nbsp;" . $this->getFather()->getMother()->getSurname().
      "<br><b> Моих дедушку и бабушку по маме зовут: </b>" . $this->getMother()->getFather()->getName() . "&nbsp;" . $this->getMother()->getFather()->getSurname(). "&nbsp;и&nbsp;"  . $this->getMother()->getMother()->getName() . "&nbsp;" . $this->getMother()->getMother()->getSurname();
  }
}

$igor = new Person("Игорь", "Петров", 78); // Дедушка Валеры по  маме
$ivan = new Person("Иван", "Иванов", 68); // Дедушка Валеры по папе
$galina = new Person("Галина", "Петрова", 75);// Бабушка Валеры по маме
$alena = new Person("Алена", "Иванова", 65);// Бабушка Валеры по папе
$alex = new Person("Алексей", "Иванов", 42,$alena, $ivan); // Отец Валеры
$olga = new Person("Ольга", "Иванова", 41, $galina, $igor);// Мать Валеры
$valera = new Person("Валера", "Иванов", 12, $olga, $alex);

echo $valera->getInfo();
//echo $valera->getMother()->getFather()->getName();//Имя дедушки Валеры


//echo $alex->sayHi($igor->name);
// Здоровье не может быть более 100 

// $alex->setHp(-30); //Упал
// echo $alex->getHp() . "<br>";
// $alex->setHp($medKit); //Нашел аптечку
// echo $alex->getHp();
// $alex->name = "Alex";
// echo $alex->name;
// echo $igor->name;
?>