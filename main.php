<?php
include_once('scripts/global.php');
include_once ('scripts/check.php');

$currentStudentData = getCurrentStudentData($databaseLink,$_COOKIE['id'],$_COOKIE['hash']);
print "<div class='feed' > <p style='text-align: center'>Привет, ".$currentStudentData['Student_Login']."<br>
 <a href='scripts/logoff.php'>Разлогин</a></p></div>"
/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 21.12.15
 * Time: 23:54
 */?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Система обучения</title>
    <link rel="stylesheet" href="css/qoorsachPage.css" >
</head>
<body>
<div class="feed">
    <h1>Курс иностранного языка</h1>
    <h2>Часть 1. Тестовые страницы.</h2>
    <ul>
        <li>
            <a href="qoorsachPattern.html">
                Страница-шаблон.
            </a>
        </li>
    </ul>

</div>

</body>
</html>
