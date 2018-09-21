<?php
require_once("conexao.php");
$sql = "SELECT * FROM usuario WHERE Login='".$_COOKIE["login"]."'";
$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result)) {
	$update_sql="UPDATE usuario SET Senha='".password_hash($_POST["novasenha"], PASSWORD_DEFAULT)."' WHERE Login='".$row["Login"]."'";
	$update_query = mysqli_query($conn, $update_sql);
	if ($update_query) {
		sleep(2);
		header("Location: index.php");
	}
}
 ?>

