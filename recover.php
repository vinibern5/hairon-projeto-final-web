<?php 

if (!isset($_COOKIE["login"], $_COOKIE["pergunta_sec"])) {
	header("Location: index.php");
}

$login = $_COOKIE["login"];
$pergunta_sec = $_COOKIE["pergunta_sec"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Recuperação de Senha</title>
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
				<?php echo "<h3>".$pergunta_sec."</h3>";?>
			</div>
		</div>

		<div class="row">
			<div class="col s12 m6 offset-m3 form z-depth-1">
				<form action="resultadorecup.php" method="POST">
					<div class="input-field">
						<input type="text" name="resposta" required id="resposta">
						<label for="resposta">Resposta</label>
						<span class="helper-text" data-error="Resposta deve ser preenchida!" id="helper-resposta"></span>
					</div>

			        <div class="input-field">
			          <input type="password" name="novasenha" required id="novasenha">
			          <label for="novasenha">Nova Senha</label>
			          <span class="helper-text" data-error="Senha deve ser preenchida!" id="helper-novasenha"></span>
			        </div>

					<button class="btn waves-effect waves-light" type="submit" name="action">Recuperar a senha</button>	
				</form>
			</div>
		</div>
	</div>
</body>

<script>
	$("#resposta").on("change", function() {
		$("#helper-resposta").attr("data-error", "Resposta deve ser preenchida!")

		var inputElement = this;

		if (!this.validity.valueMissing) {
			$.ajax({
			  type: "POST",
			  url: "checkresposta.php",
			  data: {
			  	resposta: inputElement.value,
			  	login: "<?php echo $login; ?>"
			  },
			  success: function(data) {
				var rightAnswer = (data === 'true');

				if (rightAnswer) {
					$(inputElement).removeClass("invalid");
					inputElement.setCustomValidity("");
				} else {
					$(inputElement).addClass("invalid");
					$("#helper-resposta").attr("data-error", "Resposta incorreta!")
					inputElement.setCustomValidity("Resposta incorreta!");
				}
			  }
			});
		}
	});
</script>
</html>