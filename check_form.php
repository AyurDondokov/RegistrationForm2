<?php
session_start();
unset($_SESSION["error_name"]);
unset($_SESSION["error_secondname"]);
unset($_SESSION["error_email"]);
unset($_SESSION["error_phone"]);
function redirect(){
    header('Location: index.php');
    exit;
}

$name = htmlspecialchars(trim($_POST["name"]));
$secondname = htmlspecialchars(trim($_POST["secondname"]));
$email = htmlspecialchars(trim($_POST["email"]));
$phone = htmlspecialchars(trim($_POST["phone"]));
$theme = htmlspecialchars(trim($_POST["theme"]));
$pay_way = htmlspecialchars(trim($_POST["pay-way"]));
$mailing = $_POST["mailing"];

$_SESSION["name"] = $name;
$_SESSION["secondname"] = $secondname;
$_SESSION["email"] = $email;
$_SESSION["phone"] = $phone;
$_SESSION["theme"] = $theme;


if (empty($name) || strlen($name) < 1 || strpos($name, '|')){
    $_SESSION["error_name"] = "Введите корректное имя.";
    redirect();
}
if (empty($secondname) || strlen($secondname) < 1 || strpos($secondname, '|')){
    $_SESSION["error_secondname"] = "Введите корректную фамилию.";
    redirect();
}
if (empty($email) || strlen($email) < 1 || strpos($email, '|')){
    $_SESSION["error_email"] = "Введите корректный адрес эл. почты.";
    redirect();
}
if (empty($phone) || strlen($phone) < 1 || strpos($phone, '|')){
    $_SESSION["error_phone"] = "Введите корректный номер телефона.";
    redirect();
}

$data = date("d-m-o H-i-e");
$address = $_SERVER['REMOTE_ADDR'];

$new_str = implode("|", $_POST);
if (!empty($new_str)){
    if (empty($_POST["mailing"]))
        $new_str .= '|false';
    $new_str .= '|' . $address . '|active';
    if (file_exists("forms.txt"))
        file_put_contents("forms.txt", PHP_EOL . $new_str, FILE_APPEND);
    else
        fwrite(fopen("forms.txt", 'w'), $new_str);
}
$_SESSION["success"] = "Вы успешно отправили форму.";
redirect();