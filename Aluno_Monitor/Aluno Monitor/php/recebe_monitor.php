<?php
    include_once('conexao.php');
	session_start();
		
	if($_SESSION['ativa'] == true){
		$codigo = $_SESSION['CODIGO'];
		
		$sql = "Select * from aluno where USUARIO = $codigo";

		$r = mysqli_query($con, $sql);
		if(mysqli_num_rows($r) > 0){
			while($row = mysqli_fetch_assoc($r)){
				$_SESSION['NOME'] = $row['nome'];
				$_SESSION['SOBRE'] = $row['sobrenome'];
				$_SESSION['CURSO'] = $row['curso'];
				$_SESSION['TEL'] = $row['telefone'];
				$_SESSION['FOTO'] = $row['foto'];
			}
		}
		$disciplinas = $_POST['op1'];
		$horario = $_POST['horario'];
		
	}else{
		header('Location:../index.php');
	}
	

	
	$sql = "INSERT INTO monitores(codigo_aluno, codigo_disciplina, disponibilidade)values($codigo, $disciplinas, $horario)";
	$r = mysqli_query($con, $sql);
		if($r){
			echo('TESTE');
		}else{
			echo('erro0');
		}
	
	//$sql = "INSERT INTO monitor(nome, sobrenome,  ano, email, senha, telefone, horariolivre, MATERIA_id,)
		// VALUES ('$nome', '$sobrenome', $ano, '$email', '$senha', '$telefone', '$horario', $especialidade, '$novo_nome')";
	 
	 //* $r = mysqli_query($con, $sql);
		//if($r){
			//echo("<script>alert('Dados Cadastrados com sucesso!');
				//window.location.href='../index.php';</script>");
		//}else{
			//echo("<script>alert('Erro ao cadastrar! Por favor tente novamente.');
			//window.location.href='../index.php';</script>");
		//}
?>