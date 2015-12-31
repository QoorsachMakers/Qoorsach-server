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

/**
 * @param $dataLink
 * @param $id
 * @return array|null возвращает массив с тестами и результатами
 */
function getCurrentStudentTestResults($dataLink, $id){
    $currentStudentTestResults = mysqli_fetch_all(mysqli_query($dataLink,"SELECT Test_Name, Result FROM Tests_English, Test_Results WHERE Student_ID = '".$id."' AND Test_Results.Test_ID = Tests_English.Test_ID;"));
    return $currentStudentTestResults;
}
?>