<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$descricao = $_POST['descricao'];
include "connect.php";

$sql = mysqli_query($link,"SELECT * FROM tb_formulario WHERE email='$email'");
while($line = mysqli_fetch_array($sql)){
	$email = $line['email'];
	$nome = $line['nome'];
	$descricao = $line['descricao'];
}

$sqlinsert =  "INSERT INTO tb_formulario (nome, email, descricao) 
				VALUES ('$nome', '$email', '$descricao')";


$contar = mysqli_num_rows($sql);

	if($contar != 0){
		echo "Seu email ja esta cadastrado";
		

	}
	else{
		 mysqli_query($link, $sqlinsert);
     	 echo "Email cadastrado com sucesso";

	}
?>