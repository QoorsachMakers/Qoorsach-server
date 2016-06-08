<?php
include_once('../scripts/global.php');
include_once("../scripts/check.php");
include_once('../scripts/head.php');

if ($_POST) {
    $testName = 'nounTest';
    echo '<div class="feed">';
    if (getTestResults($databaseLink, $_COOKIE['id'], $testName)) {
        echo 'Вы уже проходили этот тест и не можете пройти его снова<br>';
    } else {
        $correctAnswers = ['tour', 'error', 'slip', 'cost', 'worth', 'head', 'chief', 'manager', 'manager', 'head', 'job', 'job'];

        $maxResult = 12;
        $result = 0;
        for ($iter = 0; $iter < $maxResult; $iter++) {
            if ($_POST['q' . strval($iter + 1)] == $correctAnswers[$iter]) {
                $result++;
            }
        }
        echo 'Ваш результат:' . $result . ' из ' . $maxResult . ', что есть ' . round($result * 10 / $maxResult) . ' баллов из 10';
        if (round($result * 10 / $maxResult) > 5) {
            echo '<br>
            Вы успешно сдали тест.';
            setTestResults($databaseLink, $_COOKIE['id'], $testName, round($result * 10 / $maxResult));
        } else {
            echo '<br>
            Вы набрали слишком мало баллов и не сдали этот тест.<br>
            Рекомендуется повторно ознакомиться с материалом по этому тесту';
        }
    }
    echo '<br><a href="/main.php">На главную</a></div>';


}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>Тест: существительные</title>
    <link rel="stylesheet" href="/css/commonStylesheet.css">
    <link rel="stylesheet" href="/css/hint.base.css">
</head>
<body>
<form name="fgsfds" method="post" class="feed">
    <h1>Тест по существительным в английском языке</h1>
    <div class="question">
        <p>1. Our _____ included England, France and Germany. </p>
        <div class="answer">
            <label>
                <input name="q1" type="radio" value="travel" required>
                travel
            </label>
            <label>
                <input name="q1" type="radio" value="journey" required>
                journey
            </label>
            <label>
                <input name="q1" type="radio" value="voyage" required>
                voyage
            </label>
            <label>
                <input name="q1" type="radio" value="trip" required>
                trip
            </label>
            <label>
                <input name="q1" type="radio" value="tour" required>
                tour
            </label>
        </div>
    </div>
    <div class="question">
        <p>2. it was not her fault; It was her _____ of <span class="hint--top-right" data-hint="Judgement - Суждение">judgement</span>
        </p>
        <div class="answer">
            <label>
                <input name="q2" type="radio" value="mistake" required>
                mistake
            </label>
            <label>
                <input name="q2" type="radio" value="slip" required>
                slip
            </label>
            <label>
                <input name="q2" type="radio" value="error" required>
                error
            </label>
        </div>
    </div>
    <div class="question">
        <p>3. ______ is an idea, answer or act that is wrong. </p>
        <div class="answer">
            <label>
                <input name="q3" type="radio" value="mistake" required>
                A mistake
            </label>
            <label>
                <input name="q3" type="radio" value="slip" required>
                A slip
            </label>
            <label>
                <input name="q3" type="radio" value="error" required>
                An error
            </label>
        </div>
    </div>
    <div class="question">
        <p>4. Higher production ____ usually lead to higher prices. </p>
        <div class="answer">
            <label>
                <input name="q4" type="radio" value="price" required>
                prices
            </label>
            <label>
                <input name="q4" type="radio" value="cost" required>
                costs
            </label>
            <label>
                <input name="q4" type="radio" value="value" required>
                values
            </label>
            <label>
                <input name="q4" type="radio" value="worth" required>
                worth
            </label>
        </div>
    </div>
    <div class="question">
        <p>5. The <span class="hint--top-right" data-hint="Noun - Имя существительное">noun</span> _______ means the
            value of a thing in money or in other goods. </p>
        <div class="answer">
            <label>
                <input name="q5" type="radio" value="price" required>
                'price'
            </label>
            <label>
                <input name="q5" type="radio" value="cost" required>
                'cost'
            </label>
            <label>
                <input name="q5" type="radio" value="value" required>
                'value'
            </label>
            <label>
                <input name="q5" type="radio" value="worth" required>
                'worth'
            </label>
        </div>
    </div>
    <div class="question">
        <p>6. The _____ of some local educational <span class="hint--top-right" data-hint="Authorities – Власти">authorities</span>
            is called director of education. </p>
        <div class="answer">
            <label>
                <input name="q6" type="radio" value="director" required>
                director
            </label>
            <label>
                <input name="q6" type="radio" value="manager" required>
                manager
            </label>
            <label>
                <input name="q6" type="radio" value="chief" required>
                chief
            </label>
            <label>
                <input name="q6" type="radio" value="boss" required>
                boss
            </label>
            <label>
                <input name="q6" type="radio" value="head" required>
                head
            </label>
        </div>
    </div>
    <div class="question">
        <p>7. Recently Paul has been promoted to ______ engineer.</p>
        <div class="answer">
            <label>
                <input name="q7" type="radio" value="director" required>
                director
            </label>
            <label>
                <input name="q7" type="radio" value="manager" required>
                manager
            </label>
            <label>
                <input name="q7" type="radio" value="chief" required>
                chief
            </label>
            <label>
                <input name="q7" type="radio" value="boss" required>
                boss
            </label>
            <label>
                <input name="q7" type="radio" value="head" required>
                head
            </label>
        </div>
    </div>
    <div class="question">
        <p>8. The stage ______ in the commercial theater <span class="hint--top-right"
                                                               data-hint="to supervise – Надзирать, заведовать">supervises </span>the
            arrangement of <span class="hint--top-right" data-hint="Scenery - Декорации">scenery</span> and <span
                class="hint--top-right" data-hint="Props – Реквизит">props</span> on the
            stage</p>
        <div class="answer">
            <label>
                <input name="q8" type="radio" value="director" required>
                director
            </label>
            <label>
                <input name="q8" type="radio" value="manager" required>
                manager
            </label>
            <label>
                <input name="q8" type="radio" value="chief" required>
                chief
            </label>
            <label>
                <input name="q8" type="radio" value="boss" required>
                boss
            </label>
            <label>
                <input name="q8" type="radio" value="head" required>
                head
            </label>
        </div>
    </div>
    <div class="question">
        <p>9. Peter has been made _______ of the <span class="hint--top-right"
                                                       data-hint="Plant – станция. Напр. Power plant - электростанция."> plant</span>
            where he works</p>
        <div class="answer">
            <label>
                <input name="q9" type="radio" value="director" required>
                director
            </label>
            <label>
                <input name="q9" type="radio" value="manager" required>
                manager
            </label>
            <label>
                <input name="q9" type="radio" value="chief" required>
                chief
            </label>
            <label>
                <input name="q9" type="radio" value="boss" required>
                boss
            </label>
            <label>
                <input name="q9" type="radio" value="head" required>
                head
            </label>
        </div>
    </div>
    <div class="question">
        <p>10. The ______ of the <span class="hint--top-right" data-hint="Band – группа">band</span> was a young
            promising musician</p>
        <div class="answer">
            <label>
                <input name="q10" type="radio" value="director" required>
                director
            </label>
            <label>
                <input name="q10" type="radio" value="manager" required>
                manager
            </label>
            <label>
                <input name="q10" type="radio" value="chief" required>
                chief
            </label>
            <label>
                <input name="q10" type="radio" value="boss" required>
                boss
            </label>
            <label>
                <input name="q10" type="radio" value="head" required>
                head
            </label>
        </div>
    </div>
    <div class="question">
        <p>11. When a man tells you that he got rich through hard _____, ask him, "Whose?"</p>
        <div class="answer">
            <label>
                <input name="q11" type="radio" value="work" required>
                work
            </label>
            <label>
                <input name="q11" type="radio" value="job" required>
                job
            </label>
            <label>
                <input name="q11" type="radio" value="post" required>
                post
            </label>
            <label>
                <input name="q11" type="radio" value="position" required>
                position
            </label>
        </div>
    </div>
    <div class="question">
        <p>12. There was no _____ to be found and whole families were starving</p>
        <div class="answer">
            <label>
                <input name="q12" type="radio" value="work" required>
                work
            </label>
            <label>
                <input name="q12" type="radio" value="job" required>
                job
            </label>
            <label>
                <input name="q12" type="radio" value="post" required>
                post
            </label>
            <label>
                <input name="q12" type="radio" value="position" required>
                position
            </label>
        </div>
    </div>
    <p style="clear: both; text-align: center"><input type="submit" class="btn" value="Отправить">
</form>
</body>
</html>