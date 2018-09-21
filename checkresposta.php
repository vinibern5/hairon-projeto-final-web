<?php
require_once("conexao.php");
$sql = "SELECT * FROM usuario WHERE Login='".$_POST["login"]."'";
$result = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_assoc($result)) {

	if ($_POST["resposta"] == $row["Resposta"]) {
		echo "true";
	} else {
		echo "false";
	}
}
?>