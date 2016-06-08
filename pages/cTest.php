<?php
include_once('../scripts/global.php');
include_once("../scripts/check.php");
include_once('../scripts/head.php');

if ($_POST) {
    echo '<div class="feed">';
    if (getTestResults($databaseLink, $_COOKIE['id'], 'cTest')) {
        echo 'Вы уже проходили этот тест и не можете пройти его снова<br>';
    } else {
        $correctAnswers = ['makeup', 'everyother', 'headbrilliant', 'majorityopposed', 'raisepermission', 'agreeprivate', 'injuries', 'feet', 'comply', 'swing'];
        $maxResult = 10;
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
            setTestResults($databaseLink, $_COOKIE['id'], 'cTest', round($result * 10 / $maxResult));
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>Тест: глаголы</title>
    <link rel="stylesheet" href="/css/commonStylesheet.css">
    <link rel="stylesheet" href="/css/hint.base.css">
</head>
<body>
<form name="fgsfds" method="post" class="feed">
    <h1>Лексический тест по английскому языку</h1>
    <div class="question">
        <p>1. All these colleges together ______ the university of Cambridge. </p>
        <div class="answer">
            <label>
                <input name="q1" type="radio" value="takeup" required>
                take up
            </label>
            <label>
                <input name="q1" type="radio" value="setup" required>
                set up
            </label>
            <label>
                <input name="q1" type="radio" value="makeup" required>
                make up
            </label>
            <label>
                <input name="q1" type="radio" value="bringup" required>
                bring up
            </label>
        </div>
    </div>
    <div class="question">
        <p>2. I visit my Granny __________ day - on Tuesdays, Thursdays and Saturdays. </p>
        <div class="answer">
            <label>
                <input name="q2" type="radio" value="everyother" required>
                every other
            </label>
            <label>
                <input name="q2" type="radio" value="eachother" required>
                each other
            </label>
            <label>
                <input name="q2" type="radio" value="allother" required>
                all other
            </label>
            <label>
                <input name="q2" type="radio" value="thisandtheother" required>
                this and the other
            </label>
        </div>
    </div>
    <div class="question">
        <p>3. Nick has a good _____ for physics. They say he is so _______ at it that, he will win a Nobel prize some
            day. </p>
        <div class="answer">
            <label>
                <input name="q3" type="radio" value="mindkeen" required>
                mind, keen
            </label>
            <label>
                <input name="q3" type="radio" value="brainhopeful" required>
                brain, hopeful
            </label>
            <label>
                <input name="q3" type="radio" value="headbrilliant" required>
                head, brilliant
            </label>
            <label>
                <input name="q3" type="radio" value="thoughtproud" required>
                thought, proud
            </label>
        </div>
    </div>
    <div class="question">
        <p>4. The _______ of the <span class="hint--top-right hint" data-hint="Staff - Персонал">staff</span> agreed to
            the proposal but Mr. Blake ______ to it. </p>
        <div class="answer">
            <label>
                <input name="q4" type="radio" value="mostargued" required>
                most, argued
            </label>
            <label>
                <input name="q4" type="radio" value="greaterpartdiffered" required>
                greater part, differed
            </label>
            <label>
                <input name="q4" type="radio" value="majorityopposed" required>
                majority, opposed
            </label>
            <label>
                <input name="q4" type="radio" value="biggerpartresisted" required>
                bigger part, resisted
            </label>
        </div>
    </div>
    <div class="question">
        <p>5. _____ your hand and ask ______ to go there. </p>
        <div class="answer">
            <label>
                <input name="q5" type="radio" value="arisepermin" required>
                Arise, permin
            </label>
            <label>
                <input name="q5" type="radio" value="riseagreement" required>
                Rise, agreement
            </label>
            <label>
                <input name="q5" type="radio" value="raisepermission" required>
                Raise, permission
            </label>
            <label>
                <input name="q5" type="radio" value="liftallowance" required>
                Lift, allowance
            </label>
        </div>
    </div>
    <div class="question">
        <p>6. My parents ______ to my taking ______ lessons at home. </p>
        <div class="answer">
            <label>
                <input name="q6" type="radio" value="allowparticular" required>
                allow, particular
            </label>
            <label>
                <input name="q6" type="radio" value="approvepersonal" required>
                approve, personal
            </label>
            <label>
                <input name="q6" type="radio" value="agreeprivate" required>
                agree, private
            </label>
            <label>
                <input name="q6" type="radio" value="permitadditional" required>
                permit, additional
            </label>
        </div>
    </div>
    <div class="question">
        <p>7. He collided with another car and had multiple _______ </p>
        <div class="answer">
            <label>
                <input name="q7" type="radio" value="injuries" required>
                injuries
            </label>
            <label>
                <input name="q7" type="radio" value="damages" required>
                damages
            </label>
            <label>
                <input name="q7" type="radio" value="stabs" required>
                stabs
            </label>
            <label>
                <input name="q7" type="radio" value="strike" required>
                strike
            </label>
        </div>
    </div>
    <div class="question">
        <p>8. The dog lay at her _____ snoring. </p>
        <div class="answer">
            <label>
                <input name="q8" type="radio" value="legs" required>
                legs
            </label>
            <label>
                <input name="q8" type="radio" value="heels" required>
                heels
            </label>
            <label>
                <input name="q8" type="radio" value="tiptoes" required>
                tiptoes
            </label>
            <label>
                <input name="q8" type="radio" value="feet" required>
                feet
            </label>
        </div>
    </div>
    <div class="question">
        <p>9. All visitors to our museum are requested to ______ with the regulations. </p>
        <div class="answer">
            <label>
                <input name="q9" type="radio" value="obey" required>
                obey
            </label>
            <label>
                <input name="q9" type="radio" value="obtain" required>
                obtain
            </label>
            <label>
                <input name="q9" type="radio" value="comply" required>
                comply
            </label>
            <label>
                <input name="q9" type="radio" value="yield" required>
                yield
            </label>
        </div>
    </div>
    <div class="question">
        <p>10. When they arrived, the party was in full ______. </p>
        <div class="answer">
            <label>
                <input name="q10" type="radio" value="order" required>
                order
            </label>
            <label>
                <input name="q10" type="radio" value="meal" required>
                meal
            </label>
            <label>
                <input name="q10" type="radio" value="load" required>
                load
            </label>
            <label>
                <input name="q10" type="radio" value="swing" required>
                swing
            </label>
        </div>
    </div>
    <p style="clear: both; text-align: center"><input type="submit" class="btn" value="Отправить">
</form>
</body>
</html>