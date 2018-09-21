<?php

require_once("conexao.php");
$sql = "SELECT * FROM usuario WHERE Login='".$_POST["login"]."'";
setcookie("login",$_POST["login"]);
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) == 0) {
    setcookie("recover", "fail", time() + 10);
    header("Location: retrieve.php");
}

while ($row = mysqli_fetch_assoc($result)) {
    if ($_POST["email"] == $row["Email"]) {
    	setcookie("login", $_POST["login"]);
    	setcookie("email", $_POST["email"], time() + 20);

        if ($_POST["metodo"] == "email") {
        	header("Location: email.php");
        } else {
    		setcookie("pergunta_sec", $row["PerguntaSecreta"], time() + 20);
        	header("Location: recover.php");
        }
    } else {
    	setcookie("recover", "fail", time() + 10);
        header("Location: retrieve.php");
    }
}
?>