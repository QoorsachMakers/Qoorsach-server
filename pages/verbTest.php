<?php
include_once('../scripts/global.php');
include_once("../scripts/check.php");
include_once('../scripts/head.php');//Это шапка. Она по умолчанию ведет на МОЙ сайт. Измени ссылки в скрипте /scripts/head.php на свой сайт

if ($_POST) {
    echo '<div class="feed">';
    if (getTestResults($databaseLink, $_COOKIE['id'], 'verbTest')) {
        //verbTest ты меняешь на название того теста, который есть в базе данных
        //и который пользователю нужно пройти. Перед этим создай название этого теста в БД
        echo 'Вы уже проходили этот тест и не можете пройти его снова<br>';
    } else {
        $correctAnswers = ['tell', 'talk', 'told', 'say', 'tell', 'made', 'done', 'made', 'did', 'study', 'study', 'teach', 'demand', 'demand', 'demonstrate'];
        //Сверху создается массив с правильными ответами. Кол-во правильных ответов должно быть строго равно максимальному результату
        $maxResult = 15;
        //Это сам максимальный результат. Изменяй его в зависимости от кол-ва вопросов, 1 вопрос - 1 балл - 1 правильный ответ
        $result = 0;
        //Это результат пользователя, он пока что ноль, но ниже будет увеличиваться, смотря на сколько вопросов он ответил правильно
        for ($iter = 0; $iter < $maxResult; $iter++) {// магия
            if ($_POST['q' . strval($iter + 1)] == $correctAnswers[$iter]) {//моар магии
                $result++;//Если магия, то результат пользователя увеличивается на 1
            }//вообще не магия, но я просто забыл что оно делает. Просто не трогай
        }
        echo 'Ваш результат:' . $result . ' из ' . $maxResult . ', что есть ' . round($result * 10 / $maxResult) . ' баллов из 10';//Не трогай
        if (round($result * 10 / $maxResult) > 5) {
            echo '<br>
            Вы успешно сдали тест.';
            setTestResults($databaseLink, $_COOKIE['id'], 'verbTest', round($result * 10 / $maxResult));
            //Так же, verbTest нужно заменить на название существующего в базе данных теста
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
    <title>Тест: глаголы</title>
    <link rel="stylesheet" href="/css/commonStylesheet.css">
</head>
<body>
<form name="fgsfds" method="post" class="feed">
    <h1>Тест по глаголам в английском языке</h1>
    <div class="question">
        <p>1. I hate you ____ a lie; never do it. Do you hear? </p>
        <div class="answer">
            <!--            Радиокнопки объединяются в группу, если имеют одинаковый name. Т.Е. если ты нажмешь на одну, все другие сбросятся-->
            <!--            Одновременно можно выбрать только одну радиокнопку из её группы. -->
            <!--            name должен называться последовательно, начиная с q1, заканчивая qN. Иначе работать не будет.-->
            <!--            value в правильном ответе должно равняться правильному ответу в массиве. Первый(Он же нулевой) элемент в массиве-->
            <!--            соответствует первому вопросу, q1. Можно конечно поставить везде value 0 и в правильном ответе 1 и так же в массиве-->
            <!--            Но тогда пользователь сможет открыть исходный код страницы и увидеть всю логику.-->
            <label>
                <input name="q1" type="radio" value="say" required>
                to say
            </label>
            <label>
                <input name="q1" type="radio" value="tell" required>
                to tell
            </label>
            <label>
                <input name="q1" type="radio" value="speak" required>
                to speak
            </label>
            <label>
                <input name="q1" type="radio" value="talk" required>
                to talk
            </label>
        </div>
    </div>
    <div class="question">
        <p>
            2. Who did you you ____ over the phone with late last night?
        </p>
        <div class="answer">
            <label>
                <input name="q2" type="radio" value="say" required>
                say
            </label>
            <label>
                <input name="q2" type="radio" value="tell" required>
                tell
            </label>
            <label>
                <input name="q2" type="radio" value="speak" required>
                speak
            </label>
            <label>
                <input name="q2" type="radio" value="talk" required>
                talk
            </label>
        </div>
    </div>
    <div class="question">
        <p>
            3. The teacher _____ her class about a man who used to swim five times across a river before breakfast.
        </p>
        <div class="answer">
            <label>
                <input name="q3" type="radio" value="said" required>
                said
            </label>
            <label>
                <input name="q3" type="radio" value="told" required>
                told
            </label>
            <label>
                <input name="q3" type="radio" value="spoke" required>
                spoke
            </label>
            <label>
                <input name="q3" type="radio" value="talked" required>
                talked
            </label>
        </div>
    </div>
    <div class="question">
        <p>
            4. I _______ it once more and then I will ask you to repeat it.
        </p>
        <div class="answer">
            <label>
                <input name="q4" type="radio" value="say" required>
                will say
            </label>
            <label>
                <input name="q4" type="radio" value="tell" required>
                will tell
            </label>
            <label>
                <input name="q4" type="radio" value="speak" required>
                will speak
            </label>
            <label>
                <input name="q4" type="radio" value="talk" required>
                will talk
            </label>
        </div>
    </div>
    <div class="question">
        <p>
            5. I don't know what _______ you about the film; I haven't seen it yet.
        </p>
        <div class="answer">
            <label>
                <input name="q5" type="radio" value="say" required>
                to say
            </label>
            <label>
                <input name="q5" type="radio" value="tell" required>
                to tell
            </label>
            <label>
                <input name="q5" type="radio" value="speak" required>
                to speak
            </label>
            <label>
                <input name="q5" type="radio" value="talk" required>
                to talk
            </label>
        </div>
    </div>
    <div class="question">
        <p>
            6. He ______ a good speech at the meeting.
        </p>
        <div class="answer">
            <label>
                <input name="q6" type="radio" value="do" required>
                do
            </label>
            <label>
                <input name="q6" type="radio" value="make" required>
                make
            </label>
            <label>
                <input name="q6" type="radio" value="did" required>
                did
            </label>
            <label>
                <input name="q6" type="radio" value="made" required>
                made
            </label>
        </div>
    </div>
    <div class="question">
        <p>
            7. It is easier said than ______ .
        </p>
        <div class="answer">
            <label>
                <input name="q7" type="radio" value="done" required>
                done
            </label>
            <label>
                <input name="q7" type="radio" value="make" required>
                make
            </label>
            <label>
                <input name="q7" type="radio" value="did" required>
                did
            </label>
            <label>
                <input name="q7" type="radio" value="made" required>
                made
            </label>
        </div>
    </div>
    <div class="question">
        <p>
            8. He has ____ an effort to understand this problem.
        </p>
        <div class="answer">
            <label>
                <input name="q8" type="radio" value="done" required>
                done
            </label>
            <label>
                <input name="q8" type="radio" value="made" required>
                made
            </label>
            <label>
                <input name="q8" type="radio" value="did" required>
                did
            </label>
            <label>
                <input name="q8" type="radio" value="make" required>
                make
            </label>
        </div>
    </div>
    <div class="question">
        <p>
            9. Mrs. Simons ____ all the work about the house; There was nobody to help her
        </p>
        <div class="answer">
            <label>
                <input name="q9" type="radio" value="do" required>
                do
            </label>
            <label>
                <input name="q9" type="radio" value="made" required>
                made
            </label>
            <label>
                <input name="q9" type="radio" value="did" required>
                did
            </label>
            <label>
                <input name="q9" type="radio" value="make" required>
                make
            </label>
        </div>
    </div>
    <div class="question">
        <p>
            10. _______ means to try to learn by reading and thinking.
        </p>
        <div class="answer">
            <label>
                <input name="q10" type="radio" value="study" required>
                To study
            </label>
            <label>
                <input name="q10" type="radio" value="learn" required>
                To learn
            </label>
            <label>
                <input name="q10" type="radio" value="teach" required>
                To teach
            </label>
        </div>
    </div>
    <div class="question">
        <p>
            11. They _________ the problem of pollution at present.
        </p>
        <div class="answer">
            <label>
                <input name="q11" type="radio" value="study" required>
                Are studying
            </label>
            <label>
                <input name="q11" type="radio" value="learn" required>
                Are learning
            </label>
            <label>
                <input name="q11" type="radio" value="teach" required>
                Are teaching
            </label>
        </div>
    </div>
    <div class="question">
        <p>
            12. To experience ______ him a good lesson.
        </p>
        <div class="answer">
            <label>
                <input name="q12" type="radio" value="study" required>
                Studied
            </label>
            <label>
                <input name="q12" type="radio" value="learn" required>
                Learnt
            </label>
            <label>
                <input name="q12" type="radio" value="teach" required>
                Taught
            </label>
        </div>
    </div>
    <div class="question">
        <p>
            13. Jim was stopped by a policeman who _____ his name and address.
        </p>
        <div class="answer">
            <label>
                <input name="q13" type="radio" value="ask" required>
                asked
            </label>
            <label>
                <input name="q13" type="radio" value="inquire" required>
                inquired
            </label>
            <label>
                <input name="q13" type="radio" value="question" required>
                questioned
            </label>
            <label>
                <input name="q13" type="radio" value="demand" required>
                demanded
            </label>
        </div>
    </div>
    <div class="question">
        <p>
            14. Mr. Railly always speaks with authority and ______ immediate attention.
        </p>
        <div class="answer">
            <label>
                <input name="q14" type="radio" value="ask" required>
                asks
            </label>
            <label>
                <input name="q14" type="radio" value="inquire" required>
                inquires
            </label>
            <label>
                <input name="q14" type="radio" value="question" required>
                questions
            </label>
            <label>
                <input name="q14" type="radio" value="demand" required>
                demands
            </label>
        </div>
    </div>
    <div class="question">
        <p>
            15. Paul was a personage who all his feelings with the greatest vigor.
        </p>
        <div class="answer">
            <label>
                <input name="q15" type="radio" value="show" required>
                showed
            </label>
            <label>
                <input name="q15" type="radio" value="demonstrate" required>
                demonstrated
            </label>
            <label>
                <input name="q15" type="radio" value="exhibit" required>
                exhibited
            </label>
            <label>
                <input name="q15" type="radio" value="reveal" required>
                revealed
            </label>
        </div>
    </div>
    <p style="clear: both; text-align: center"><input type="submit" class="btn" value="Отправить">
</form>
</body>
</html>
