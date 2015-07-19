<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Usuario</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<link rel="stylesheet" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

</head>
<body>
	<div class="posicaolabel">
		<?php
		$keyrandom = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
		echo " <label> Senha para contador </label> <h3>".$keyrandom."</h3>";
		?>
	</div>	
	<div class="centralizarButton">
		<form class="pure-form" "action= gerarsenha.php" method="post">
    		<input type="text" placeholder="Senha" name="senha" required>
    		<button class="pure-button">
    		<i class="fa fa-key fa-3x"></i> 	
			</button>
		</form>
	</div>	

	<div class="logout">
		<form action="logout.php">
			<?php 
			session_start();
			if(isset($_SESSION['nome'])){
			echo "<label>".$_SESSION['nome']."</label>";
			}else{
				unset($_SESSION['nome']);
				header("location:login.php");
			}
		?>
	    	<button type="submit" class="pure-button pure-button-primary"> Sair</button>
	    </form>	
	</div>	
</body>
</html>


<?php

class Inserir 
{
	function InserirChave()
	{
		// $con = new mysqli('localhost','root','','maestro') or die(mysqli_error());
		$con = new mysqli('pontoxsistemas.com.br','pontoxsi','Maestro2013','pontoxsi_maestrocontadores') or die(mysqli_error());
		if(isset($_POST['senha'])){
			$senhacontador = $_POST['senha'];

			if(empty($senhacontador)){

			}else{
				$SQ = "INSERT INTO usuarios	 (senharandom) VALUES ('$senhacontador')";
				$qu = $con->query($SQ);
				if($qu){
					header("location:gerarsenha.php");
				}else{
					echo "<h2> erro ao gravar </h2>";
				}
			}
		}
	}
}

$ins = new Inserir;
$ins->InserirChave();
