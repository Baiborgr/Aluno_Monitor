<?php

include_once('conexao.php');

$usuario = $_POST['email'];
$senha = $_POST['senha'];

	
$sql = "SELECT codigo, email, senha, privilegio from usuario where senha='$senha' and email = '$usuario'";

$r = mysqli_query($con, $sql);
	if(mysqli_num_rows($r) > 0){
		while($row = mysqli_fetch_assoc($r)){
			session_start();
			$_SESSION['CODIGO'] = $row['codigo'];
			$_SESSION['EMAIL'] = $row['email'];
			$_SESSION['S'] = $row['senha'];
			$_SESSION['P'] = $row['privilegio'];
			$_SESSION['ativa'] = true;
			if($_SESSION['EMAIL'] == true & $_SESSION['P'] == 1){
				header('Location:aluno.php');
			}else if($_SESSION['P'] == 2){
				header('Location:monitor.php');
			}elseif($_SESSION['P'] == 3){
				header('Location:administrador.php');
			}
			
		}
	}else{
		echo("<script>alert('Usuario ou senha incorreta!');
				window.location.href='../index.php';</script>");
	}

?>
