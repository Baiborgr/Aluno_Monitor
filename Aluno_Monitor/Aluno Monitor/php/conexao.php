<?php

$con = mysqli_connect("localhost","root","","monitoria");
mysqli_set_charset($con, 'utf8');

if ($con) {
	echo "";
}else{
	echo "falhar ao conectar";
}


?>