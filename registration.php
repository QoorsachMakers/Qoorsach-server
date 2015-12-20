<?php
include_once ('global.php');
if(isset($_POST['submit'])){
    $err = array();
    $captcha = $_SESSION['code'];
    if($_POST['captcha_code']!=$captcha){
        $err[] = '– Капча введена неправильно';
    } else{
        #проверяем логин
        if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['user_login'])) #я это честно спиздил
        {
            $err[] = "– Логин может состоять только из букв английского алфавита и цифр";
        }

        if(strlen($_POST['user_login']) < 3 or strlen($_POST['user_login']) > 30)
        {
            $err[] = "– Логин должен быть не меньше 3-х символов и не больше 30";
        }

        if(strlen($_POST['user_password']) < 6 or strlen($_POST['user_password']) > 20)
        {
            $err[] = "– Пароль должен быть не меньше 6-и символов и не больше 20";
        }

        # проверяем, не сущестует ли пользователя с таким именем
        $query = mysqli_query($databaseLink, "SELECT * FROM Students WHERE Student_Login='".mysqli_real_escape_string($databaseLink, $_POST['user_login'])."'");
        if(mysqli_num_rows($query) > 0)
        {
            $err[] = "– Пользователь с таким логином уже существует в базе данных";
        }

        $query = mysqli_query($databaseLink, "SELECT * FROM Students WHERE Student_Email='".mysqli_real_escape_string($databaseLink, $_POST['user_email'])."'");
        if(mysqli_num_rows($query) > 0)
        {
            $err[] = "– Пользователь с таким мылом уже существует в базе данных";
        }


        $email = $_POST["user_email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $err[] = "– Некорректный Email";
        }
    }

    if(count($err) == 0)
    {

        $login = $_POST['user_login'];
        $email = $_POST['user_email'];
        # Убераем лишние пробелы
        $password = trim($_POST['user_password']);
        $hash = md5($password);

        $subject = 'Ваша регистрация на моем сайтике';
        $message = 'Ваш логин:'.$login."\r\n".
            'Ваш пароль:'.$password;
        mail($email,$subject,$message);

        mysqli_query($databaseLink,"INSERT INTO Students SET Student_Login='".$login."', Student_Password='".$password."', Student_Email='".$email."', Student_Hash='".$hash."'");
        print   "<div class='feed'>"
            ."Успешная регистрация"."<br>".
            "</div><br>";

    }
    else
    {
        print "<div class='feed'>";
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
        print "</div><br>";
    }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <link rel=stylesheet href="css/registrationForm.css">
</head>
<body>
<form method="post" class="feed">
    <p>
        Введите свои данные >:)))0
    </p>
    <table>
        <tr>
            <td>Логин <span style='color: firebrick'>*</span> </td>
            <td><input name="user_login"></td>
        </tr>
        <tr>
            <td>Пароль <span style='color: firebrick'>*</span> </td>
            <td><input type="password" name="user_password"></td>
        </tr>
        <tr>
            <td>E-Mail <span style='color: firebrick'>*</span></td>
            <td><input type="email" name="user_email"></td>
        </tr>
    </table>
    <img class="captcha" src="scripts/captcha.php"/>
    <p>Введи капчу:<input type="text" name="captcha_code"></p>
    <input class="btn" name="submit" type="submit"  value="Зарегаться">
</form>
</body>
</html>


