<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrador</title>
</head>

<body>
	
	<?php
	session_start();
	if($_SESSION['ativa'] == true){
		
	}else{
		header('Location:../index.php');
	}


?>	
	
	
	<a href="logout.php" title="Sair da conta">Sair</a>
	
	
</body>
</html>