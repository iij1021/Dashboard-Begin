<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- fonte -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:500' rel='stylesheet' type='text/css'> 
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
	            <h1 class="text-center login-title">LOGIN</h1>
	            <div class="account-wall">
	                <!-- <img class="profile-img" src="\Senha\maestro-amarelo.png"
	                    alt="">  -->
	                <form class="form-signin" action="login.php" method="post">
	                <input type="text" class="form-control" name="nome" placeholder="nome" required autofocus>
	                <input type="password" class="form-control" name="senha" placeholder="senha" required>
	                <button class="btn btn-lg btn-primary btn-block" type="submit">
	                    LOGIN</button>
	                <a href="#" class="pull-right need-help"> Prescisa de ajuda? </a><span class="clearfix"></span>
	                </form>
	            </div>
	            <a href="registrar.php" class="text-center new-account"> Criar uma conta </a>
	        </div>
	    </div>
	</div>
 </div>	
</body>
</html>

<?php 
	session_start();
	// $con = new mysqli('localhost','root','','maestro') or die(mysqli_error());
	$con = new mysqli('pontoxsistemas.com.br','pontoxsi','Maestro2013','pontoxsi_maestrocontadores') or die(mysqli_error());
	if(isset($_POST['senha']) || isset($_POST['nome'])){
		$nome = $_POST['nome'];
		$senha = $_POST['senha'];
		if(empty($senha) || empty($nome)){

		}else{
			$sql = "SELECT * FROM usuarios WHERE nome='$nome'  AND senha='$senha'";
			$qu = $con->query($sql);
			if($qu->num_rows > 0){
				$_SESSION['nome'] = $nome;
				$_SESSION['senha'] = $senha;
				header("location:gerarsenha.php");
				
			}else{
				echo "usuario não autorizado";
				header("location:login.php");
			}
		}
	}	
		
			
 		

		
	



