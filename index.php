<!DOCTYPE html>
<html>
<head>
	<title>Area de Login</title>
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>

<style type="text/css">
	
	.container {
		margin-top: 80px;
	}

	h3 {
		padding: 7px;
		margin: 5px;
		margin-top: 5px;
		margin-bottom: 10px;
	}

	.login {
		background-color: #1e88e5;
		border-collapse: collapse;
		color: white;
	}

	.row {
		margin-bottom: 0px;
	}

	form {
		margin-top: 15px;
	}

	.form {
		background: white;
	}

	button {
		float: right;
		margin-right: 3%;
		margin-bottom: 5%;
		margin-top: 5%;
	}

	.redirects {
		background-color: white;
	}

	hr {
		margin: 0px -12px;
		opacity: 0.2;
	}

	.esqueci {
		float: left;
	}

	.novo {
		float: right;
	}

	a {
		padding: 1.5%;
	}
</style>

<body class="grey lighten-4">
	<div class="container">
		<div class="row">
			<div class="col s12 m6 offset-m3 login z-depth-1">
				<h3>Login</h3>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m6 offset-m3 form z-depth-1">
				<form action="login.php" method="POST">
					<?php
						if (isset($_COOKIE["tentativa"])) {
							echo "<span class='helper-text' style='color: #d32f2f;' id='helper-auth'>Usuário ou senha incorretos</span>";
						}
					?>
					<div class="input-field">
						<input type="text" name="login" required id="login">
						<label for="login">Login</label>
						<span class="helper-text" data-error="O login deve ser preenchido!" id="helper-login"></span>
					</div>

					<div class="input-field">
				        <input type="password" name="senha" required id="senha">
				        <label for="senha">Senha</label>
				        <span class="helper-text" data-error="A senha deve ser preenchida!" id="helper-senha"></span>
			        </div>
					<button class="btn waves-effect waves-light" type="submit" name="action">Login</button>		
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m6 offset-m3 redirects z-depth-1">
				<hr>
				<a class="esqueci" href="retrieve.php">Esqueci minha senha</a> <a class="novo" href="newuser.html">Cadastrar novo usuario</a>
			</div>
		</div>
	</div>
</body>

</html>