<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/styleAluno.css">
<link rel="icon" href="../img/escola.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Aluno Monitor</title>
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
		<a href="aluno.php"><img src="../img/logo.png" id="logo"></a>
		<div id="infor-usu">
		  <div id="text">
			<p><?php echo($_SESSION['NOME'].' ' . $_SESSION['SOBRE']) ?><p>
			<p class="small">EEEP Padre João Bosco de Lima</p>
			<a href="javascript:sairAluno();"><img src="../img/logoff.png"></a>
              <a href="configuracaoAluno.php"><img src="../img/configurações.png"></a>
		  </div>
		  <img src="../fotos/<?php echo($_SESSION['FOTO'])?>">
		</div>
	</div>
		<div class="clear"></div>
	</div><!--Cabeçalho-->
	<div id="conteudo">
		<div id="menu-lateral">
			<ul>
				<li onclick="inicio()"><img src="../img/inicio-1.png">Início
					<p>Informações do site</p>
				</li>
				<li onclick="monitores()"><img src="../img/monitores-1.png">Monitores
					<p>Monitores disponíveis</p>
				</li>
				<li onclick="materias()"><img src="../img/materias-1.png">Matérias
					<p>Matérias em dificuldade</p>
				</li>
				<li onclick="quiz()"><img src="../img/quiz.png">Quiz
					<p>Melhore seu desempenho</p>
				</li>
			</ul>
		</div><!--menu lateral-->
		<div class="area-conteudo" id="area-1">
		   <div class="lado-esquerdo">
		   	<img src="../img/inicio-1.png">
		    <p>Início</p>
		    <p id="ser">Deseja ser monitor?<button onclick="cMonitor()">Clique Aqui!</button></p>
		   </div><!--Cabeçalho do Conteudo-->

		   <div class="cont">
		   		<img src="../img/Banner-2.png">

		   		<p>Informações relevantes:</p>
		   		<div id="infor">
		   			<div class="card">
		   				<img src="../img/card-1.png">
		   				<a href="#">#ENEM 2019,inserção 01/08/2019</a><br>
		   				<a href="#">#ENEM 2019,inserção 25/08/2019</a><br>
		   				 <small>27/07/2019 ás 11h e 19min</small>
		   			</div>
		   			<div class="card">
		   				<img src="../img/card-2.jpg">
		   				<a href="#">#ENEM 2019,inserção 01/08/2019</a><br>
		   				<a href="#">#ENEM 2019,inserção 25/08/2019</a><br>
		   				<small>27/07/2019 ás 11h e 19min</small>
		   			</div>
		   			<div class="card">
		   				<img src="../img/card-3.jpg">
		   				<a href="#">#ENEM 2019,inserção 01/08/2019</a><br>
		   				<a href="#">#ENEM 2019,inserção 25/08/2019</a><br>
		   				<small>27/07/2019 ás 11h e 19min</small>
		   			</div>
		   			<div class="card">
		   				<img src="../img/card-4.png">
		   				<a href="#">#ENEM 2019,inserção 01/08/2019</a><br>
		   				<a href="#">#ENEM 2019,inserção 25/08/2019</a><br>
		   				<small>27/07/2019 ás 11h e 19min</small>
		   			</div>
		   			<div class="clear"></div>
		   		</div>
		   </div>
		</div><!--Area do conteudo-->
		<div class="area-conteudo" id="area-2">
		   <div class="lado-esquerdo">
		   	<img src="../img/monitores-1.png">
		    <p>Monitores Disponiveis</p>
		   </div><!--Cabeçalho do Conteudo-->
		   	<div class="clear"></div>
		   <div id="cont">
		   		<div class="mo-card">
		   			<div class="card" style="background-image: url(../fotos/sem-nome-2.jpg.jpg)"></div>
		   			<p>Diego Furtado</p>
		   			<p>Matéria: Biologia</p>
		   			<p>3° Informatica</p>
		   		</div>
		   		
		   </div>

		</div><!--Area do conteudo 2-->

		<div class="area-conteudo" id="area-3">
		   <div class="lado-esquerdo">
		   	<img src="../img/materias-1.png">
		    <p>Suas Matérias</p>
		   </div><!--Cabeçalho do Conteudo-->
		   	<div class="clear"></div>
		   <div id="cont">
		   		<table id="lista">
		   			<?php
								require_once('conexao.php');
			
								$sql = "SELECT * FROM disciplina";
			
								$r = mysqli_query($con, $sql);
										if($r){
												while($row = mysqli_fetch_row($r)){?>
								<tr>
									<td value="<?php echo $row[0] ?>"><?php echo $row[1]; ?></td>
									<a href="#" class="mate"><td>Monitores</td></a>
								</tr>
						<?php
													  }
							}
			
				
							?>
		   		</table>
		   </div>

		</div><!--Area do conteudo 3-->
		<div class="area-conteudo" id="area-4">
		   <div class="lado-esquerdo">
		   	<img src="../img/quiz.png">
		    <p>Quiz</p>
		   </div><!--Cabeçalho do Conteudo-->
		   	<div class="clear"></div>
		   <div id="cont">
		   	 <h1>Essa Aba esta Indísponivel no momento!<br><button onclick="inicio()">Click Aqui!!</button></h1>
		   </div>

		</div><!--Area do conteudo 4-->
		<div class="clear"></div>
	</div><!--Conteudo-->
    <div id="rodape">
    	<p>&copy Todos os Direitos Reservados</p>
	<a href="#"><img src="../img/insta.png"></a>
	<a href="#"><img src="../img/face.png"></a><br>
        <div id="logo-escola">
	      <img src="../img/escola.png" id="escola"><p> Escola Estadual de Educação Profissional Padre João Bosco de Lima</p>
        </div>
    </div><!--Rodapé-->

    <div id="area-5">
		 <div id="confirma">
		 	 <img src="../img/x.png" onclick="fecharCMonitor()">
		 	 <p>Deseja ser realmente monitor?<br><button id="green" onclick="ir()">Sim</button><button id="red" onclick="fecharCMonitor()">Não</button></p>
		 </div>
	</div>
	<div id="area-6">
		 <div id="confirma">
		 	 <img src="../img/x.png" onclick="fechar()">
		 	 <p>Deseja realmente sair?<br>
            <button id="green" onclick="ir2()">Sim</button>
            <button id="red" onclick="fechar()">Não</button></p>
		 </div>
	</div>

	<script type="text/javascript">
		function inicio() {
			var a = document.getElementById('area-1').style.display = "block";
			var b = document.getElementById('area-2').style.display = "none";
			var c = document.getElementById('area-3').style.display = "none";
			var d = document.getElementById('area-4').style.display = "none";
		}
		function monitores() {
			var a = document.getElementById('area-1').style.display = "none";
			var b = document.getElementById('area-2').style.display = "block";
			var c = document.getElementById('area-3').style.display = "none";
			var d = document.getElementById('area-4').style.display = "none";
		}
		function materias() {
			var a = document.getElementById('area-1').style.display = "none";
			var b = document.getElementById('area-2').style.display = "none";
			var c = document.getElementById('area-3').style.display = "block";
			var d = document.getElementById('area-4').style.display = "none";
		}
		function quiz() {
			var a = document.getElementById('area-1').style.display = "none";
			var b = document.getElementById('area-2').style.display = "none";
			var c = document.getElementById('area-3').style.display = "none";
			var d = document.getElementById('area-4').style.display = "block";
		}
		function cMonitor() {
			var a = document.getElementById('area-5').style.display = "block";
		}
		function sairAluno() {
			var a = document.getElementById('area-6').style.display = "block";
		}
		function ir(){
			window.location.href = "cadastromonitor.php";
		}
		function ir2(){
			window.location.href = "logout.php";
		}
		function fecharCMonitor() {
			var a = document.getElementById('area-5').style.display = "none";
		}
        function fechar(){
        document.getElementById('area-6').style.display = "none";
       
    }
	</script>
</body>
</html>