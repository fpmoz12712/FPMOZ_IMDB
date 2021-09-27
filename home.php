<?php 
   //session_start();
   include ('header.php') ;
   include ("user.php");
   include ("db_conn.php");
   if(isset($_GET['akcija']) && $_GET['akcija'] == 'brisi')  {
	user::brisi($_GET['id']);
} 

if(isset($_GET['akcija']) && $_GET['akcija'] == 'edit')  {
	user::edit($_GET['id'],$_GET['uloga']);
} 
   if (isset($_SESSION['kor_ime']) && isset($_SESSION['id'])) {  
 
	?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<script src="https://kit.fontawesome.com/57c3439383.js" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<div class="landing-page">
    <div class="logo-w">
        <a href="pages/index.php"><img src="img/logo.png"/></a>
    </div>
      <div class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh">
	  <?php if ($_SESSION['uloga'] == 'admin') {?>
      		<!--Admin -->
      		<div class="card" style="width: 16rem;">
			  <img src="img/admin-default.png" 
			       class="card-img-top img-fluid" 
				   class="card-block"
			       alt="admin image">
			  <div class="card-body text-center">
			    <h5 class="card-title">
			    	<?=$_SESSION['ime']?>
			    </h5>
			    <a href="pages/index.php" class="btn btn-dark">Return</a>
			  </div>
			</div>
			<div class="p-3">
				<?php include 'clanovi_t.php';
                 if (count($res) > 0) {?>
                  
				<h1 class="display-4 fs-1" style= background-color:rgba(190,192,255,0.83)><b>Registrirani članovi</b></h1>
				<table class="table table-striped"
				       style="width: 32rem; background-color:rgba(190, 192, 255, 0.83);">
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Ime</th>
				      <th scope="col">Prezime</th>
				      <th scope="col">Email</th>
					  <th scope="col">Uloga</th>
				    </tr>
				  	<?php 
				  	$i =1;
				  	while ($rows = $upit->fetch()) {?>
				    <tr>
				      <th scope="row"><?=$i?></th>
				      <td><?=$rows['ime']?></td>
				      <td><?=$rows['prezime']?></td>
				      <td><?=$rows['email']?></td>
					  <td><?=$rows['uloga']?></td>
					  <td>	
							<div class="btn-group" role="group" aria-label="Basic example">
								<a title="Uredi korisnika"  type="button" class="btn btn-sm btn-info " href="home.php?akcija=edit&id=<?= $rows["id"]?>&uloga=<?= $rows["uloga"]?>">
									<i class="fas fa-edit"></i></a>
								<a title="Ukloni korisnika" type="button"  class="btn btn-sm btn-danger delete-user" href="home.php?akcija=brisi&id=<?= $rows["id"] ?>">
									<i class="fas fa-trash"></i></a>
							</div>
              			</td>
				    </tr>

				    <?php $i++; }?>
				  </tbody>
				</table>
				<?php }?>
			</div>
      	<?php }else {
	header("Location:pages/index.php");
} ?>
      </div>
</body>
</html>
<?php }else{
	header("Location: index.php");
} ?>
</div>
<?php include('footer.php') ?>