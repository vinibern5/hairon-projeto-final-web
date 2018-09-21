<?php

require_once("conexao.php");

$senha = $_POST["senha"];
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuario (Login, Senha, Email, PerguntaSecreta, Resposta) VALUES
		('".$_POST['login']."', '".$senha_hash."', '".$_POST['email']."', '".$_POST['perguntasec']."', '".$_POST['resposta']."')";



$result = mysqli_query($conn,$sql);

if ($result) {
	sleep(2);
	header("Location: index.php");
	echo $senha_hash;
} else {
    echo "Não foi possivel realizar o seu cadastro.";
}




?>