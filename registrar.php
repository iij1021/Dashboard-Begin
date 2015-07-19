<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<title>Login Contador</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
 <div class="centralizar">
	<div class="container">
	    <div class="row">
	        <div class="col-sm-6 col-md-4 col-md-offset-4">
	            <h1 class="text-center login-title">REGISTRAR</h1>
	            <div class="account-wall">
	                <!-- <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" -->
	                    <!-- alt=""> -->
	                <form class="form-signin" action="registrar.php" method="post">
	                <input type="text" class="form-control" name="nome" placeholder="nome" required autofocus>
	                <input type="password" class="form-control" name="senha" placeholder="senha" required>
	                <button class="btn btn-lg btn-primary btn-block" type="submit">
	                    LOGIN</button>
	                <a href="#" class="pull-right need-help">Prescisa de ajuda? </a><span class="clearfix"></span>
	                </form>
	           <!--  </div>
	            <a href="#" class="text-center new-account">Criar uma conta </a>
	        </div> -->
	    </div>
	</div>
 </div>	
</body>
</html>


<?php 
	
	// $con = new mysqli('localhost','root','','maestro') or die(mysqli_error());
	$con = new mysqli('pontoxsistemas.com.br','pontoxsi','Maestro2013','pontoxsi_maestrocontadores') or die(mysqli_error());
	if(isset($_POST['senha']) || isset($_POST['nome'])){
		$nome = $_POST['nome'];
		$senha = $_POST['senha'];
		if(empty($senha) || empty($nome)){

		}else{	

				$consulta = "SELECT * FROM usuarios WHERE nome ='$nome' AND senha='$senha'";
				$quer = $con->query($consulta);
				if($quer->num_rows > 0){
					echo "<h2> Esse usuario já existe </h2>";
				}else{
					$sq = "INSERT INTO usuarios (nome,senha) VALUES('$nome','$senha')";
					$qu = $con->query($sq);
				if($qu){
					header("location:login.php");
				}else{
					echo "<h2> erro ao gravar usuario</h2>";
				}
			}
		}
	}	



