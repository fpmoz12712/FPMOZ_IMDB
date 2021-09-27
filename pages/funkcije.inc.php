<?php 

include("../backend/includes/dbh.inc.php");
//include ("../db_conn.php");


function dodaj_imdbid ($kor_ime, $movie_id, $kor_id, $conn){
    $sql = "INSERT INTO imdbid VALUES (null, ?, ?, ?)";
    $upit = $conn->prepare($sql);
    $upit->execute([$kor_ime, $movie_id,$kor_id]);
}

function update_imdbid ( $movie_id,$kor_ime, $konekcija){
    $sql = "UPDATE imdbid SET movie_id= ? WHERE kor_ime = ?";
    $upit = $konekcija->prepare($sql);
    return $upit->execute([ $movie_id,$kor_ime]);
}

//Dobavi
function dobavi_favorite($kor_id,$konekcija){
    $sql = "SELECT movie_id FROM imdbid WHERE kor_id =?" ;
    $upit = $konekcija->prepare($sql);
    $upit->execute([$_SESSION['id']]);
    $favoriti = $upit->fetchAll();
    return $favoriti;
}

function delete_favorite ($movie_id,$kor_id, $konekcija){
    $sql = "DELETE FROM imdbid WHERE movie_id = ? AND kor_id =?";
    $upit = $konekcija->prepare($sql);
    $upit->execute([$movie_id,$_SESSION['id']]);
}


function provjeri_korisnika2($konekcija){
    $sql = "SELECT id FROM imdbid WHERE kor_ime =?" ;
    $upit = $konekcija->prepare($sql);
    $upit->execute([$_SESSION['kor_ime']]);
    $korisnik = $upit->fetch();
    return $korisnik;
    
}

function provjeri_id($konekcija){
    $checkID = provjeri_korisnika2($konekcija);
    if($checkID >= 1){
    $sql = "SELECT movie_id FROM imdbid WHERE kor_ime =?" ;
    $upit = $konekcija->prepare($sql);
    $upit->execute([$_SESSION['kor_ime']]);
    $id = $upit->fetch();
    
   return $id[0];
    }else{
        return 'noID';
    }
   
    
}

function provjeriDuplikat($id,$str){
    
    return $pos=strpos($str,$id);

    
}

?>