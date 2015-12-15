<?php
/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 14.12.15
 * Time: 21:44
 */
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>
        SL4M
    </title>
    <link rel="stylesheet" type="text/css" href="css/deerPage.css">
</head>
<body>
<form method="post" action="index.php">
    <p>Greetings!</p>
    <p>Ебошь вопрос:</p>
    <p><textarea name="question"></textarea></p>
    <p>Ток шоб да или нет<input type="checkbox" name="simplify"></p>
    <br>
    <input type="submit" value="Отвечай ебана">
    <br>
    <p>
    <?
        $answers = array("да", "нет", "тебя это ебет что ли", "успокойся бля все норм будет чо ты", "толстота ебаная съеби нахуй", "Как бы да, но лучше бы нет", "нихуя", "100%", "я бы тебе сказал шансы, но ты расстроишься", "иди нахуй");
        if($_POST["question"]!=null){
            $question = trim($_POST["question"]);
            if (strtolower($question)=="сгенерируй число" or strtolower($question)=="сгенерируй мне число"){
                echo rand(0,10);
            } elseif($_POST["simplify"]){
                echo (rand(1,2)==2) ? "Да" : "Нет";
            } elseif (substr_count($question, " или ")>0) {
                if($question[count($question)-1]=='?'){ $question[count($question)-1]=''; }
                $dividedQuestion = explode(" или ", $question);
                echo $dividedQuestion[rand(-1,count($dividedQuestion)-1)];
            } else {
                echo $answers[rand(0,9)];
            }
        }
    ?>
    </p>
</form>
</body>
</html>

