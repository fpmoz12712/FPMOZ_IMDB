<?php
session_start();
include ("dbh.inc.php");



function korisničko_ime(){
   echo($_SESSION['kor_ime']);
}





?>



