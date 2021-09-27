<?php  

if (isset($_SESSION['kor_ime']) && isset($_SESSION['id'])) {
    
    $sql = "SELECT * FROM users ORDER BY id ASC";
    $upit = $conn->prepare($sql);
    $upit->execute();
    $res = $upit->fetch();
    return $res;

    //$res = mysqli_query($conn, $sql);
}else{
	header("Location: index.php");
} 