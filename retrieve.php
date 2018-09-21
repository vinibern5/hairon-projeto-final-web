<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Recuperar Senha</title>
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
		margin-top: 30px;
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
				<h3>Recuperar senha</h3>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m6 offset-m3 form z-depth-1">
				<form action="check_login_email.php" method="POST">
					<?php
						if (isset($_COOKIE["recover"])) {
							echo "<span class='helper-text' style='color: #d32f2f;' id='helper-auth'>O usuário e o email não coincidem</span>";
						}
					?>
					<div class="input-field">
						<input type="text" name="login" required id="login">
						<label for="login">Login</label>
						<span class="helper-text" data-error="Login incorreto!" id="helper-login"></span>
					</div>

			        <div class="input-field">
			          <input type="email" name="email" required id="email">
			          <label for="email">Email</label>
			          <span class="helper-text" data-error="Informe um email válido!" id="helper-email"></span>
			        </div>

			        <p>Método para redefinir senha</p>
			        <p>
				      <label>
				        <input name="metodo" type="radio" checked value="email">
				        <span>Email</span>
				      </label>
				    </p>

				    <p>
				      <label>
				        <input name="metodo" type="radio" value="pergunta">
				        <span>Pergunta</span>
				      </label>
				    </p>

					<button class="btn waves-effect waves-light" type="submit" name="action">Recuperar a senha</button>	
				</form>
			</div>
		</div>
	</div>
</body>

<script>
	$("#login").on("change", function() {
		var inputElement = this;

		if (!this.validity.valueMissing) {
			$.ajax({
			  type: "GET",
			  url: "checklogin.php",
			  data: {
			  	login: inputElement.value
			  },
			  success: function(data) {
				var loginExists = (data === 'true');

				if (loginExists) {
					$(inputElement).removeClass("invalid");
					inputElement.setCustomValidity("");
				} else {
					$(inputElement).addClass("invalid");
					inputElement.setCustomValidity("Login incorreto!");
				}
			  }
			});
		}
	});

	$("#email").on("change", function() {
		$("#helper-email").attr("data-error", "Informe um email válido!");
		var inputElement = this;

		if (!this.validity.valueMissing && !this.validity.typeMismatch) {
			$.ajax({
			  type: "GET",
			  url: "checkemail.php",
			  data: {
			  	email: inputElement.value
			  },
			  success: function(data) {
				var emailExists = (data === 'true');

				if (emailExists) {
					$(inputElement).removeClass("invalid");
					inputElement.setCustomValidity("");
				} else {
					$(inputElement).addClass("invalid");
					$("#helper-email").attr("data-error", "O email informado não existe!")
					inputElement.setCustomValidity("O email informado não existe!");
				}
			  }
			});
		}
	});
</script>

</html>