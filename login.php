<?php 

// ver https://stackoverflow.com/questions/5576619/php-redirect-with-post-data
require_once('conexao.php');
$sql = "SELECT * FROM usuario WHERE Login='".$_POST["login"]."'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) == 0) {
	setcookie("tentativa", "falhou", time() + 10);
	header("Location: index.php");
	echo "psdlfpsdfl";
}

$senha = $_POST["senha"];
while ($row = mysqli_fetch_assoc($result)) {
	$senha_hash = $row["Senha"];
    if (password_verify($senha, $senha_hash)) {
		echo "<form method='POST' action='https://luismatheuspereira.000webhostapp.com/session.php'>";
		foreach ($_POST as $a => $b) {
			echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
		}
		echo "</form>";
		echo "<script>";
		echo "document.querySelector('form').submit();";
		echo "</script>";
	}
	else{
		setcookie("tentativa", "falhou", time() + 10);
		header("Location: index.php");
	}
}
?>