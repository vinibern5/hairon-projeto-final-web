<?php

require_once('conexao.php');
$sql = "SELECT * FROM usuario WHERE Login='".$_GET["login"]."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	echo "true";
} else {
	echo "false";
}

?>