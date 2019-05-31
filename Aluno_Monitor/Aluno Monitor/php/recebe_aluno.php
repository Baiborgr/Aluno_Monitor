<?php
    include_once('conexao.php');


	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$turma = $_POST['turma'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$telefone = $_POST['telefone'];
	if(isset($_FILES['foto'])){
    	$extensao = strtolower(substr($_FILES['foto']['name'], -4)); //pega a extensao do arquivo
    	$novo_nome = md5(time()) . $extensao; //define o nome do arquivo
    	$diretorio = "../fotos/"; //define o diretorio para onde enviaremos o arquivo
   
		move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
	}

	
	$sql1 = "INSERT INTO usuario(email, senha)values('$email', '$senha');";
	$sql2 = "INSERT INTO aluno (nome, sobrenome, curso, telefone, foto, USUARIO) VALUES ('$nome', '$sobrenome', $turma, '$telefone','$novo_nome', (select max(codigo) from usuario))";
	$p = mysqli_query($con, $sql1);
	 
	$r = mysqli_query($con, $sql2);
		if($r){
			echo("<script>alert('Cadastrado com sucesso');
				window.location.href='../index.php';</script>");   
		}else{
			echo("<script>alert('Erro ao cadastrar! Por favor tente novamente.');
				window.location.href='../index.php';</script>");
		}
?>