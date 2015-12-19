/**
 * Created by iSosnitsky on 15.12.15.
 */

function fgsfds(){
    if(document.forms.diceForm1.question.value){
        question = "";
        question = document.forms.diceForm1.question.value;
        question = question.trim();
        if (question[question.length-1]=="?") {
            question = question.substring(0, question.length - 1);
        }
        answerPool = ["да", "нет", "тебя это ебет что ли", "успокойся бля все норм будет чо ты", "толстота ебаная съеби нахуй", "Как бы да, но лучше бы нет", "нихуя", "100%", "я бы тебе пояснил за шансы, но ты расстроишься", "иди нахуй"];
        answer = '';

        if (question.toLowerCase()=="сгенерируй число" || question.toLowerCase()=="сгенерируй мне число"){
            answer = getRandomInt(0,10);
        } else if (document.forms.diceForm1.simplify.checked){
            answer = (Math.random() >= 0.5) ? "Да" : "Нет";
        } else if(question.toLowerCase().indexOf(" или ")>0){
            questionPool = question.toLowerCase().split(" или ");
            answer = questionPool[getRandomInt(0,questionPool.length-1)];
        } else {
            answer = answerPool[getRandomInt(0,9)];
        }
        document.getElementById('answer').innerText = answer;
    } else {
        document.getElementById('answer').innerText = "Бля ты хоть спросил бы чо-нибудь";
    }
}


function getRandomInt(min, max)

{
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
