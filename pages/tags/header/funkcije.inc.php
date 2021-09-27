<?php
session_start();
include ("../../../backend/includes/dbh.inc.php.php");


function dodaj_korisnika ($ime, $prezime,$kor_ime, $email, $lozinka, $konekcija){
    $sql = "INSERT INTO users VALUES (null,?,?, ?, ?, ?)";
    $upit = $konekcija->prepare($sql);
    
    return $upit->execute([$ime, $prezime,$kor_ime, $email, md5($lozinka)]);
}

function prijavi_korisnika ($kor_ime, $lozinka, $konekcija) {
    $sql = "SELECT * FROM users WHERE kor_ime=? AND lozinka=?";
    $upit = $konekcija->prepare($sql);
    $upit->execute([$kor_ime, md5($lozinka)]);
    $korisnik = $upit->fetch();
    if(!isset($korisnik["kor_ime"])) return false;
    $_SESSION["kor_ime"] = $kor_ime;
    $_SESSION["lozinka"] = md5($lozinka);
   
    return true;
}

function provjeri_korisnika($konekcija){
    $sql = "SELECT * FROM users WHERE korisnicko_ime=? AND lozinka=?";
    $upit = $konekcija->prepare($sql);
    if (!isset($_SESSION["lozinka"])) return false;
    $upit->execute(
        [$_SESSION["korisnicko_ime"], $_SESSION["lozinka"]]
    );
    $korisnik = $upit->fetch();
    if(!isset($korisnik["kor_ime"])) return false;
    return $korisnik;
}

function korisničko_ime(){
   echo($_SESSION['kor_ime']);
   
}

/*
    function provjeri_korisnika($konekcija){
    $sql = "SELECT * FROM users WHERE email=? AND lozinka=?";
    $upit = $konekcija->prepare($sql);
    if (!isset($_SESSION["email"])) return false;
    $upit->execute(
        [$_SESSION["email"], $_SESSION["lozinka"]]
    );
    $korisnik = $upit->fetch();
    if(!isset($korisnik["kor_ime"])) return false;
    return $korisnik;
}

*/





?>



