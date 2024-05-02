<?php
header('Content-Type: text/html; charset=utf-8');

//упрощенный вариант подключения базы, обычно делается сложнее
$host = "localhost";
$db = "fyadmbmr_base";
$user = "fyadmbmr_base";
$password = "ваш пароль ";


// $name = $_POST["name"];
// $surname = $_POST["surname"];
// $email = $_POST["email"];
// $pass = $_POST["pass"];

$mysqli = mysqli_connect($host, $user, $password, $db);


// используется дл того что бы посмотреть объект mysqli
// var_dump($mysqli);



// проверка подключения к базе
if ($mysqli == false) {
     print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
} else {
     //print("Соединение установлено успешно");
     $name = $_POST["name"];
     $surname = $_POST["surname"];
     $email = $_POST["email"];
     $pass = $_POST["pass"];

     $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'");
     if ($result->num_rows != 0) {
          print("Пользователь с такой почтой уже существует");
     } else {
          $mysqli->query("INSERT INTO `users`(`name`, `surname`, `email`, `pass`) VALUES ('$name', '$surname', '$email', '$pass')");
          print("Пользователь успешно зарегистрирован");
     }
     // $sql = "INSERT INTO `users`(`name`, `surname`, `email`, `pass`) VALUES (?,?,?,?)";
     // $stmt = $mysqli->prepare($sql);
     // $stmt->bind_param("ssss", $name, $surname, $email, $pass);
     // $stmt->execute();
}



// echo "<hr>Имя: $name<br>
//      Фамилия: $surname<br>
//      Почта: $email<br>
//      Пароль: $pass</hr>";



// mail('ваш адрес@mail.ru', 'Тестовое письмо',"Привет это я - $userName");
// echo "Hello, $userName";


