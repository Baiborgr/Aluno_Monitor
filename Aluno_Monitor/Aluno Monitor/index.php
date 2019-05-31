<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aluno Monitor</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/Resposivo.css">
    <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.mask.js"></script>
	<link rel="icon" href="img/escola.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
       <div class="center">
         <a href="index.php"><img src="img/logo.png" id="logo"></a>
        
        <div id="hubur">&#9776;
            <ul id="menuhubur">
           <li onclick="abrirCadastrar()"><img src="img/cadastro.png">CADASTRE-SE</li>
           <li onclick="abrirLogin()"><img src="img/acessar.png">ACESSAR MINHA CONTA</li>
           </ul>   
         </div>
                 <ul id="menu">
                   <li onclick="abrirCadastrar()"><img src="img/cadastro.png">CADASTRE-SE</li>
                   <li onclick="abrirLogin()"><img src="img/acessar.png">ACESSAR MINHA CONTA</li>
                </ul>
      </div>
    </header>
    
    <main>
        <img src="img/banner.jpg" id="banner">
        <div id="inf">Informações do Sistema</div>
        
        <section id="section-1">
              <div id="material">
               <img src="img/materia.png"><br>
                <h2>Material Didático</h2>
                <p>Receba materiais de estudo diariamente de
                seus monitores para auxiliar no seu
                aprendizado.</p>
              </div>

            <div id="monitor" class="munitor">
            <img src="img/monitor.png"><br>
            <h2>Monitoria</h2>
            <p>Orientar os alunos com dificuldades nas<br>	
            disciplinas da escola.</p>
            </div> 
            
      </section>
      <section id="section-2">
         <h2>Monitores do Mês</h2>
              <div class="aluno-mes">
                <img src="img/erick.jpg">
                <p>Erick<br>
                Matéria - Física<br>
                3ª Informática
                </p>
              </div>
                <div class="aluno-mes">
                    <img src="img/dulcy.jpg">
                    <p>Dulcy<br>
                    Matéria - História<br>
                    3ª Informática
                    </p>
                </div>
                <div class="aluno-mes" id="especial">
                    <img src="img/stefany.jpg">
                    <p>Stefany<br>
                    Matéria - Biologia<br>
                    3ª Informática
                    </p>
                </div>
      </section>
        <footer>
            
	<p>&copy Todos os Direitos Reservados</p>
	<a href="#"><img src="img/insta.png"></a>
	<a href="#"><img src="img/face.png"></a><br>
    <div id="logo-escola">
	<img src="img/escola.png" id="escola"><p> Escola Estadual de Educação Profissional Padre João Bosco de Lima</p>
        </div>
        </footer>
    </main>
     
<!--Area dos Pop-Ups-->
    <div id="login">
        <div class="pop-up">
             <img src="img/x.png" class="xx" onclick="fechar()">
             <div id="form">
                <img src="img/user-1.png">
                 <h2>ACESSAR MINHA CONTA</h2>
                  <form action="php/login.php" method="post">
                    <input type="email" placeholder="E-mail" riquered name="email" id="email1">
                    <input type="password" placeholder="Senha" riquered name="senha" id="senha1"><br>
                          <small><img src="img/unlock.png">Recuperar senha</small>
                    <input type="submit" value="Acessar">
                    <input type="reset" value="Cancelar" onclick="fechar()">
                
                  </form>
             </div>
        </div>
    </div>  
    
        <div id="cadastrar">
            <div class="pop-up">
                 <img src="img/x.png" class="xx" onclick="fechar()">
                <div id="esc">
                 <img src="img/user-1.png">
                 <h2>CADASTRE-SE</h2>
                    <form id="form" action="php/recebe_aluno.php" method="POST" enctype="multipart/form-data">
                      <input type="text" placeholder="Nome" name="nome" id="nome" required><br>
					  <input type="text" placeholder="Sobrenome" name="sobrenome" id="sobrenome" required>
						<select name="turma" id="turma" required >
                          <option>Turma</option>
						  <?php
								require_once('php/conexao.php');
			
								$sql = "SELECT * FROM turma";
			
								$r = mysqli_query($con, $sql);
										if($r){
												while($row = mysqli_fetch_row($r)){?>
						
									<option value="<?php echo $row[0] ?>" >  <?php echo $row[1]; ?>  </option>
						
						<?php
													  }
							}
			
				
							?>
                      </select><br>
                      <input type="email" placeholder="Email" name="email" id="email" required>
                      <input type="password" placeholder="Senha" name="senha" id="senha" required>
                      <input type="text" placeholder="Telefone" name="telefone" id="telefone" required>
                      <input type="file" value="insira uma foto" name="foto" id="foto" required>
                      <input type="submit" value="Cadastrar">
                      <input type="reset" value="Cancelar" onclick="fechar()" id="cancelar">
                 </form>
                </div>
            </div>
        </div>
         
    
     
<!--Fim dos Pop ups-->
    
    <!--Area dos Scripts-->
    
    <script type="text/javascript">
    function abrirLogin(){
    document.getElementById("login").style.display = "block";
    }
    function abrirCadastrar(){
    document.getElementById("cadastrar").style.display = "block";    
    }

    function fechar(){
    document.getElementById("login").style.display = "none";
    document.getElementById("cadastrar").style.display = "none";
    }
        
    /* Mascaras*/
   $(document).ready(function(){
    $('#telefone').mask('(00)# 0000-0000');
});
</script>
</body>
</html>