<?php
    include_once('conexao.php');
session_start();
		
	if($_SESSION['ativa'] == true){
		$codigo = $_SESSION['CODIGO'];
       
	}else{
		header('Location:../index.php');
	}

$telefone = $_POST['telefone'];
$novoEmail = $_POST['novoEmail'];
$novaSenha = $_POST['novaSenha'];

	$sql1 = "UPDATE usuario set email='$novoEmail', senha='$novaSenha' where codigo= $codigo";
	$sql2 = "UPDATE aluno set telefone='$telefone'where USUARIO=$codigo";

	$p = mysqli_query($con, $sql1);
	$r = mysqli_query($con, $sql2);
    if($p & $r){
        echo("<script>alert('Dados Editados com sucesso! Faça login novamente com suas novas credenciais.');
        window.location.href='logout.php';</script>"); 
    }else{
			echo("<script>alert('Erro ao editar! Por favor tente novamente.');
				window.location.href='../configuracaoAluno.php';</script>");
		} 
?>