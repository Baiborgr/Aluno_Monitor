<!DOCTYPE html>
<html>
<head>
	<title>Aluno</title>
	<link rel="stylesheet" type="text/css" href="../css/styleAluno.css">
    <link rel="icon" href="../img/escola.png">
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
		<div id="area-conteudo-form">
           <h1>Formulário para se tornar monitor</h1>
           <h4>Para se tornar monitor, preencha os campos que<br>estão liberados abaixo de acordo com o que se pede.</h4>

           <form action="recebe_monitor.php" method="POST">	
           		<input type="text" name="nome" required placeholder="Nome" disabled value="<?php echo($_SESSION['NOME'])?>">
           		<input type="text" name="sobre" required placeholder="Sobrenome" disabled value="<?php echo($_SESSION['SOBRE'])?>">
			    <input type="text" name="tel" required placeholder="Telefone" disabled value="<?php echo($_SESSION['TEL'])?>">
           		<select>
           			<option>Turma</option>
           			<?php
								require_once('conexao.php');
			
								$sql = "SELECT * FROM turma";
			
								$r = mysqli_query($con, $sql);
										if($r){
												while($row = mysqli_fetch_row($r)){?>
						
									<option value="<?php echo $row[0] ?>" >  <?php echo $row[1]; ?>  </option>
						
						<?php
													  }
							}
			
				
							?>
           		</select>
           		<div id="checked">
           			<p>Disciplina(s)</p>
                    <?php
								require_once('conexao.php');
			
								$sql = "SELECT * FROM disciplina";
			
								$r = mysqli_query($con, $sql);
										if($r){
												while($row = mysqli_fetch_row($r)){?>
						          <input type="checkbox" name="op1" value="<?php echo $row[0] ?>"><?php echo $row[1]; ?>  
						<?php
													  }
							}
			
				
							?>
           			
           			
           		</div>
			   
           		<input type="email" name="email" required placeholder="Email" disabled value="<?php echo($_SESSION['EMAIL'])?>">
           		<input type="password" name="senha" required placeholder="Senha" disabled value="<?php echo($_SESSION['S'])?>">
           		<input type="text" name="horario" required placeholder="Horario Livre">
              <input type="submit" name="enviar" value="Enviar">
              <input type="reset" name="cancelar" value="cancelar" onclick="voltar()">
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
    </script>
</body>
</html>