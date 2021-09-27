<?php
include ('header.php') ;
   session_start();
   if (!isset($_SESSION['kor_ime']) && !isset($_SESSION['id'])) {

?>

<div class="landing-page">
    <div class="logo-w">
       <img src="img/logo.png" alt="">
    </div>
    <div class="login-field">
    <form 
      	      action="check-login.php" 
      	      method="post" 
      	      style="width: 450px;">
      	      <h1 class="text-center p-3">LOGIN</h1>
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
		  <div class="mb-3">
		    <label for="username" 
		           class="form-label">Korisničko ime</label>
		    <input type="text" 
		           class="form-control" 
		           name="kor_ime" 
		           id="kor_ime">
		  </div>
		  <div class="mb-3">
		    <label for="password" 
		           class="form-label">Lozinka</label>
		    <input type="password" 
		           name="lozinka" 
		           class="form-control" 
		           id="lozinka">
		  </div>
		
		  <p>Nemate račun? Registrirajte se <a  href="registration.php">ovdje</a>.</p>
		 
		  <button type="submit" 
		          class="btn btn-primary">LOGIN</button>
		</form>
    </div>


      <span class = "copy">Copyright &copy; 2021 Movie Database | IMDb</span>

    </div> 
   
    <?php include('footer.php') ?>
    
	<?php }else{
	header("Location:pages/index.php");
} ?>  
