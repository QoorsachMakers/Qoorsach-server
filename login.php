<?php
session_start();
include_once('scripts/global.php');
function generateCode($length=6){
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars)-1;
    while (strlen($code) <$length){
        $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

if (isset($_POST['submit'])) {
    $captcha = $_SESSION['code'];

    if($_POST['captcha_code']==$captcha){
        $query = mysqli_query($databaseLink, "SELECT Student_ID, Student_Password FROM Students WHERE Student_Login='".mysqli_real_escape_string($databaseLink, $_POST['login'])."' LIMIT 1");
        $data = mysqli_fetch_assoc($query);

        if($data['Student_Password'] === $_POST['password']){
            $hash = md5(generateCode(10));
            mysqli_query($databaseLink, "UPDATE Students SET Student_Hash='".$hash."' WHERE Student_ID='".$data['Student_ID']."'");
            setcookie("id", $data['Student_ID'], time()+60*60*24*30,"/");
            setcookie("hash", $hash, time()+60*60*24*30,"/");
            header("Location: main.php"); exit();
        } else {
            print "<div class='feed'>"."Неверный логин/пароль"."</div><br>";
        }
    } else {
        print "<div class='feed'>Код капчи неправильный".
            "<br><span style='color:#c2c2c2'>Ты точно не бот?</span></div><br>";
    }


}

if ($_GET['cookie']=='off'){
    print "<div class='feed'>Залогиниться не получилось:".
        "<br>У вас отключены куки, или ты пытался зайти на страницу не залогинившись</div><br>";
} elseif ($_GET['cookie']=='corrupted'){
    print "<div class='feed'>Залогиниться не получилось:".
        "<br>Что-то пошло не так.<br>Hash:".$_COOKIE['hash']."<br> ID:".$_COOKIE['id']
        ."</div><br>";
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <link rel=stylesheet href="css/registrationForm.css">
    <title>Вход</title>
</head>
<body>
<form method="post" class="feed">
    <p>
        Уже <a href="registration.php">зарегистрировались?</a> <br>
        Введите свои данные:
    </p>
    <table>
        <tr>
            <td>Логин <span style='color: firebrick'>*</span></td>
            <td><input name="login"></td>
        </tr>
        <tr>
            <td>Пароль <span style='color: firebrick'>*</span></td>
            <td><input type="password" name="password"></td>
        </tr>
    </table>
    <img class="captcha" onclick="this.src = 'scripts/captcha.php?' + Math.random();" src="scripts/captcha.php"/>
    <p>Введи код:<br><input type="text" name="captcha_code"></p>
    <input class="btn" name="submit" type="submit" value="Войти">
</form>
</body>
</html>
