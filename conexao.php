<?php

$conn = mysqli_connect("localhost", "id6302690_vini", "senha");

if (!$conn) {
    echo "Não foi possível conectar ao banco de dados: " . mysql_error($conn);
    exit;
}

// Selecionando banco
if (!mysqli_select_db($conn,"id6302690_test")) {
    echo "Não foi possível selecionar a base de dados: " . mysqli_error($conn);
    exit;
}




?>