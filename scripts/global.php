<?php
/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 20.12.15
 * Time: 20:07
 */
$databaseLink = mysqli_connect('db.radiushost.net', 'isosnitsky1_php', 'Fgsfds12#', 'isosnitsky1_isos', '3306');

function getCurrentStudentData($dataLink, $id, $hash){
    $currentStudentData = mysqli_fetch_assoc(mysqli_query($dataLink, "SELECT * FROM Students WHERE Student_ID='".intval($id)."' AND Student_Hash='".$hash."' LIMIT 1"));
    return $currentStudentData;
}
?>