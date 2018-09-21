<?php

if (!isset($_COOKIE["login"], $_COOKIE["email"])) {
    header("Location: index.php");
}

$secret_hash = password_hash("Thequickbrownfoxjumpedoverthelazydog", PASSWORD_DEFAULT);

$login = $_COOKIE["login"];
$email = $_COOKIE["email"];

$assunto = 'Redefinir sua senha';

$mensagem = '
<html>
<head>
 <title>Redefinir sua senha</title>
</head>
<body>
<p>Olá '.$login.'! Você solicitou uma senha nova, clique <a href="https://cadvinihiago.000webhostapp.com/redefinir_senha.php?login='.$login.'&email='.$email.'&t='
.time().'&h='.$secret_hash.'">aqui</a> para redefinir a sua senha. Esse link expira em 1 hora, a partir de quando foi gerado.</p>
</body>
</html>
';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

mail($email, $assunto, $mensagem, $headers);
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <p>Email enviado... Redirecionando</p>
    <script type="text/javascript">
        window.setTimeout(function() {
         window.location = "index.php"; 
     }, 3000)
    </script>
</body>
</html>