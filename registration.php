<?php
require('db_conn.php');
include ('header.php');


if ( !empty($_POST["ime"])&&!empty($_POST["prezime"])&&!empty($_POST["kor_ime"])&&!empty($_POST["email"])&&!empty($_POST["lozinka"])){
    $lozinka = md5($_POST['lozinka']);
    $role = "user";

    $sql = "INSERT INTO users VALUES (null, ?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    // $stmt->bind_param("ssssss",$role, $_POST['ime'], $_POST['prezime'], $_POST['kor_ime'], $_POST['email'], $lozinka);
    $stmt->execute([$role, $_POST['ime'], $_POST['prezime'], $_POST['kor_ime'], $_POST['email'], $lozinka]);
}
?>

<div class="landing-page">
    <div class="logo-w">
       <img src="img/logo.png" alt="">
    </div>
    <div class="login-field">
        <form method="POST" action="registration.php">
            <div class="form-group">
                <label for="username">Ime</label>
                <input type="name" class="form-control" name="ime" placeholder="Ime " required>
            </div>
            <div class="form-group">
                <label for="username">Prezime</label>
                <input type="name" class="form-control" name="prezime" placeholder="Prezime" required>
            </div>
            <div class="form-group">
                <label for="username">Korisničko ime</label>
                <input type="name" class="form-control" name="kor_ime" placeholder="Korisničko ime" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            <div class="form-group">
                <label for="password">Lozinka</label>
                <input type="password" class="form-control" name="lozinka" placeholder="Lozinka" required>
            </div>

            <p>Imate račun? Prijavite se <a  href="index.php">ovdje</a>.</p>
            <button type="submit" name="create" class="btn btn-primary">Submit</button>
        </form>



      <span class = "copy">Copyright &copy; 2021  Movie Database | IMDb</span>

    </div> 
   
    <?php include('footer.php') ?>
    
    
