<?php
session_start();


class user {
    public static $prijavljeniKorisnik;

    public static function jePrijavljen(){
        global $conn;
        $id = $_SESSION["token"];
        $upit = "SELECT * FROM users WHERE ID=".$id;
        $rezultat = mysqli_query($conn, $upit);
        self::$prijavljeniKorisnik = mysqli_fetch_assoc($rezultat);
        if (self::$prijavljeniKorisnik) {
            return true;
        }
        return false;
    }
    public static function brisi($id){
        global $conn;
        $id = intval($id);
        $upit = "DELETE FROM users WHERE ID=" . $id;
        $upit = $conn->prepare($upit);

        return $upit->execute();
    }

    public static function edit($id,$uloga){
        global $conn;
        $id = intval($id);

        if($uloga == "admin"){
            $upit = "UPDATE users SET uloga = 'user' WHERE id = '$id'";
        }else{
            $upit = "UPDATE users SET uloga = 'admin' WHERE id = '$id'";
        }

        $upit = $conn->prepare($upit);

        return $upit->execute();
    }
}
    
    
    ?>