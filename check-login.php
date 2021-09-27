<?php  
session_start();
include "db_conn.php";

if (isset($_POST['kor_ime']) && isset($_POST['lozinka'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$kor_ime = test_input($_POST['kor_ime']);
	$lozinka2 = test_input($_POST['lozinka']);
	//$uloga = test_input($_POST['uloga']);

	if (empty($kor_ime)) {
		header("Location: index.php?error=Unesite korisničko ime");
	}else if (empty($lozinka2)) {
		header("Location: index.php?error=Unesite lozinku");
	}else {

		// Hashing the password
		$lozinka = md5($lozinka2);

        
        $sql = "SELECT * FROM users WHERE korisnicko_ime=? AND lozinka=?";
        // $rezultat = mysqli_query($conn, $sql);

        $upit = $conn->prepare($sql);
	    $upit->execute([$kor_ime, $lozinka]);
		//$rezultat = $upit->fetch();

		while ($row = $upit->fetch()) {
			$_SESSION['uloga'] = $row['uloga'];
			$_SESSION['id'] = $row['id'];
			$_SESSION['ime'] = $row['ime'];
			$_SESSION['prezime'] = $row['prezime'];
			$_SESSION['kor_ime'] = $row['korisnicko_ime'];
			$_SESSION['email'] = $row['email'];

			 
		 }

		 header("Location: index.php");

	
        // if ($rezultat) {
        // 	// the user name must be unique

        // 	// if ($rezultat['lozinka'] === $lozinka) {

			
        // 		//header("Location: index.php");
        		

        // 	// }else {
        // 	// 	header("Location: index.php?error=Netočna lozinka ili korisničko ime");
        // 	// }
        // }else {
        // 	header("Location: index.php?error=Netočna lozinka ili korisničko ime");
        // }

	}
	
}else {
	header("Location: index.php");
}