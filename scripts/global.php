<?php
/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 20.12.15
 * Time: 20:07
 */
$databaseLink = mysqli_connect('db.radiushost.net', 'isosnitsky1_php', 'Fgsfds12#', 'isosnitsky1_isos', '3306');

function getCurrentStudentData($dataLink, $id, $hash)
{
    $currentStudentData = mysqli_fetch_assoc(mysqli_query($dataLink, "SELECT * FROM Students WHERE Student_ID='" . intval($id) . "' AND Student_Hash='" . $hash . "' LIMIT 1"));
    return $currentStudentData;
}

function setStudentTestResult($dataLink, $id, $testName){
    mysqli_query($dataLink,"");
}

/**
 * @param $dataLink
 * @param $id
 * @return array|null возвращает массив с тестами и результатами
 */
function getCurrentStudentTestResults($dataLink, $id){
    $currentStudentTestResults = mysqli_fetch_all(mysqli_query($dataLink,"SELECT Test_Name, Result FROM Tests, Test_Results WHERE Student_ID = '".$id."' AND Test_Results.Test_ID = Tests.Test_ID;"));
    return $currentStudentTestResults;
}

function getTestResults($dataLink, $id, $testName){
    $currentTestResults = mysqli_fetch_all(mysqli_query($dataLink,"SELECT Test_Name, Result FROM Tests, Test_Results WHERE Student_ID = '".$id."' AND Test_Results.Test_ID = Tests.Test_ID AND Tests.Test_Name='".$testName."' LIMIT 1;"));
    return $currentTestResults;
}

function setTestResults($dataLink, $id, $testName, $result){
    mysqli_query($dataLink,"INSERT INTO Test_Results VALUE (".$result.",".$id.",(SELECT Test_ID FROM Tests WHERE Test_Name = '".$testName."' LIMIT 1));");
}

//function getCurrentStudentTestResults($dataLink, $id){
//    $currentStudentTestResults = mysqli_fetch_all(mysqli_query($dataLink,"SELECT Test_Name, Result FROM Tests, Test_Results WHERE Test_Results.Test_ID = Tests.Test_ID;"));
//    return $currentStudentTestResults;
//}
?>