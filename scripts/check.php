<?php
/**
 * Created by PhpStorm.
 * User: iSosnitsky
 * Date: 21.12.15
 * Time: 23:26
 */
include_once('global.php');
if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])){
    $query = mysqli_query($databaseLink, "SELECT * FROM Students WHERE Student_ID='".intval($_COOKIE['id'])."' LIMIT 1");
    $studentData = mysqli_fetch_assoc($query);
    if($studentData['Student_Hash'] !== $_COOKIE['hash'] or $studentData['Student_ID'] !== $_COOKIE['id']){
        setcookie("id","", time()-3600*24*30*12,"/");
        setcookie("hash", "", time()-3600*24*30*12, "/");
        header("Location: login.php?cookie=corrupted");
        #print "<div class='feed'><p>Что-то не получилось.</p></div><br>";
    }
} else {
    header("Location: login.php");
}
?>
