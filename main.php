<?php
include_once('scripts/global.php');
include_once('scripts/check.php');
include_once('scripts/head.php');

$currentStudentData = getCurrentStudentData($databaseLink, $_COOKIE['id'], $_COOKIE['hash']);
print "<div class='feed' > <p style='text-align: center'>Привет, " . $currentStudentData['Student_Login'] . "<br>
 <a href='scripts/logoff.php'>Выйти</a></p></div>"
/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 21.12.15
 * Time: 23:54
 */ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Система обучения</title>
    <meta name=viewport content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/commonStylesheet.css">
</head>
<body>
<div class="feed">
    <h1>Курс иностранного языка</h1>
    <!--    <h2>Часть 0. Тестовые страницы.</h2>-->
    <!--    <ol>-->
    <!--        <li>-->
    <!--            <a href="qoorsachPattern.html">-->
    <!--                Страница-шаблон.-->
    <!--            </a>-->
    <!--        </li>-->
    <!--        <li>-->
    <!--            <a href="pages/hearthstoneText.php">-->
    <!--                Тест по харстоуну-->
    <!--            </a>-->
    <!--        </li>-->
    <!--    </ol>-->
    <h2>Часть 1. Глаголы в английском языке</h2>
    <ol class="content-list">
        <li>
            <a href="pages/verbTheory.php">
                Классификация глаголов в английском языке
            </a>
        </li>
        <li>
            <a href="pages/toBeTheory.php">
                Глагол to be в английском языке
            </a>
        </li>
        <li>
            <a href="pages/toHaveTheory.php">
                Глагол to have в английском языке
            </a>
        </li>
        <li>
            <a href="pages/modalTheory.php">
                Модальные глаголы
            </a>
        </li>
        <li>
            <a href="pages/verbTable.php">
                Неправильные глаголы
            </a>
        </li>
        <li>
            <a href="pages/verbTest.php">
                Тест по глаголам
            </a>
        </li>
    </ol>
    <h2>Часть 2. Существительные в английском языке.</h2>
    <ol class="content-list">
        <li>
            <a href="pages/nounTheory.php">
                Определение, классификация
            </a>
        </li>
        <li>
            <a href="pages/nounWordsGender.php">
                Род
            </a>
        </li>
        <li>
            <a href="pages/nounPlural.php">
                Множественное число
            </a>
        </li>
        <li>
            <a href="pages/nounCases.php">
                Падеж
            </a>
        </li>
        <li>
            <a href="pages/nounFunctions.php">
                Функции в предложении
            </a>
        </li>
        <li>
            <a href="pages/nounTest.php">
                Тест по существительным
            </a>
        </li>
    </ol>
    <h2>Часть 3. Артикль</h2>
    <ol class="content-list">
        <li>
            <a href="pages/articleTheory.php">
                Определение, происхождение
            </a>
        </li>
        <li>
            <a href="pages/articleDefined.php">
                Определенный артикль
            </a>
        </li>
        <li>
            <a href="pages/articleUndefined.php">
                Неопределенный артикль
            </a>
        </li>
        <li>
            <a href="pages/noArticle.php">
                Отсутствие артикля
            </a>
        </li>
    </ol>
    <h2>
        Часть 4. Лексический тест
    </h2>
    <ol class="content-list">
        <li>
            <a href="pages/cTest.php">
                Пройти лексический тест
            </a>
        </li>
    </ol>
</div>
<?php
$testsAndResults = getCurrentStudentTestResults($databaseLink, $_COOKIE['id']);
if ($testsAndResults) {
    echo '<div style="text-align:center;" class="feed">
    <h1>Сданные тесты</h1>';
    echo "<table class='test-table'> <tr>
    <th>Название теста</th><th>Результат</th>
    </tr> ";
    foreach ($testsAndResults as $testResult) {
        echo "<tr>" . "<td>" . $testResult[0] . "</td>" .
            "<td>" . $testResult[1] . "</td>" .
            "</tr>";
    }
    echo '</div>';
}
?>

</body>
</html>
