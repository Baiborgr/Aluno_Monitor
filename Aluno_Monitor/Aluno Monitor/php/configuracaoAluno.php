<!DOCTYPE html>
<html>
<head>
	<title>Aluno</title>
	<link rel="stylesheet" type="text/css" href="../css/styleAluno.css">
    <link rel="icon" href="../img/escola.png">
	  <script type="text/javascript" src="../js/jquery-3.4.0.min.js"></script>
    <script type="text/javascript" src="../js/jquery.mask.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
	require_once('conexao.php');
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
		
       
	}else{
		header('Location:../index.php');
	}


?>	
	<div id="cabeca">
	<div class="center">
		<img src="../img/logo.png" id="logo">
	</div>
		<div class="clear"></div>
	</div><!--Cabeçalho-->
	<div id="conteudo">
		<div id="area-conteudo-configuracao">
        <form id="edit" action="editarAluno.php" method="post">
          <h1>Informações Pessoais</h1>
          
           <input type="text" name="nome" placeholder="Nome" disabled value="<?php echo $_SESSION['NOME']?>">
           
           <input type="text" name="sobrenome" placeholder="Sobrenome" disabled value="<?php echo $_SESSION['SOBRE']?>"><br>
          
           <input type="text" name="turma"  placeholder="Turma" value="<?php echo $_SESSION['CURSO']?>" disabled>
           
           <input type="text" name="telefone" id="telefone" placeholder="Telefone" value="<?php echo $_SESSION['TEL']?>" required>
          <h1>Informações Adicionais</h1>
          
           <input type="text" name="email"  placeholder="Email" disabled value="<?php echo $_SESSION['EMAIL']?>">
           
           <input type="text" name="novoEmail"  placeholder="Novo Email" required>
            <br>
           <input type="password" name="senha"  placeholder="Senha" disabled value="<?php echo $_SESSION['SENHA']?>">
           <input type="password" name="novaSenha"  placeholder="Nova Senha" required>
           <br>
           <input type="submit" name="enviar" value="EDITAR">
           <input type="reset" name="enviar" value="CANCELAR" onclick="voltar()">
        </form>
    </div>
    </div>
    <div id="rodape">
    	<p>&copy Todos os Direitos Reservados</p>
	<a href="#"><img src="../img/insta.png"></a>
	<a href="#"><img src="../img/face.png"></a><br>
        <div id="logo-escola">
	      <img src="../img/escola.png" id="escola"><p> Escola Estadual de Educação Profissional Padre João Bosco de Lima</p>
        </div>
    </div><!--Rodapé-->
    <script type="text/javascript">
      function voltar() {
          window.location.href = "aluno.php";
      }
		/* Mascaras*/
   $(document).ready(function(){
    $('#telefone').mask('(00)# 0000-0000');
});
    </script>
</body>
</html>