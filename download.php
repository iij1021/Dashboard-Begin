<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Contador</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<link rel="stylesheet" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

</head>
<body>

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

	<div class="posicaolabel">
	 <label> Digite a sua senha </label> <h2> Duvidas ! 3659 - 4020 </h2>;
	</div>	
	<div class="centralizarButton">
		<form class="pure-form" action= "download.php" method="post">
    		<input type="text" placeholder="Senha" name="senharandomica" required>
    		<button class="pure-button">
    		<i class="fa fa-key fa-3x"></i> 	
			</button>
		</form>
	</div>	
	
</body>
</html>


<?php

class Dowload 
{
	function Baixar()
	{
		// $con = new mysqli('localhost','root','','maestro') or die(mysqli_error());
		$con = new mysqli('pontoxsistemas.com.br','pontoxsi','Maestro2013','pontoxsi_maestrocontadores') or die(mysqli_error());
		if(isset($_POST['senharandomica'])){
			$senhacontador = $_POST['senharandomica'];
			if(empty($senhacontador)){

			}else{
				$SQ = "SELECT senharandom FROM usuarios WHERE senharandom = '$senhacontador'";
				$qu = $con->query($SQ);
				if($qu->num_rows > 0){
					 // header("location:gerarsenha.php");
					 $sql2 = "DELETE FROM usuarios WHERE senharandom = '$senhacontador'";
					 $qu = $con->query($sql2);
					 if($qu){
					 	 header('Location: https://www.dropbox.com/s/1xaj6xzuyw6a2cd/Sistema%20Maestro.exe?raw=1');
					 	exit();
					 }else{
					 	echo "<h2> erro a deletar   </h2>".$qu->error();
					 }
				} else{
					echo "<h2> senha incorreta  </h2>";
				   	
				}
			}
		}
	}
}

$ins = new Dowload;
$ins->Baixar();
