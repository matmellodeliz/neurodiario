<?php
include 'connect_db.php';

?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<script src="https://kit.fontawesome.com/bf55efcdc5.js" crossorigin="anonymous"></script>
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<style>
	@media only screen and (max-width: 600px) {
		section {
			height: 100vh !important;
		}
	}

	.error {

		background: #F2DEDE;

		color: #0c0101;

		padding: 10px;

		width: 95%;

		border-radius: 5px;

		margin: 20px auto;

	}
    .logo{
        width: 250px;
    }
    @media only screen and (max-width: 600px) {
        .logo{
        width: 200px;
        }
    }
</style>
<body>
	<section>
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center">
						<img src="img/logo.png" alt="logo" class="logo">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h4 class="fs-4 card-title fw-bold">Registrar</h4>
							<form method="POST" class="needs-validation" method="post" action="nova_conta.php" novalidate="" autocomplete="off">
								<div>
									<p style="color:red;"><?php if (isset($_GET['error'])) {
																if ($_GET['error'] == 'nome') echo 'O nome de usuário deve ter pelo menos 3 caracteres.';
																if ($_GET['error'] == 'email') echo 'Por favor, insira um email válido.';
																if ($_GET['error'] == 'senha') echo 'A senha deve ter pelo menos 6 caracteres.';
																if ($_GET['error'] == 'ja_registrado') echo 'Email já registrado.';
																$_GET['error'] = '';
															}  ?></p>
									<label class="mb-2 text-muted" for="nome">Nome</label>
									<input id="nome" type="text" class="form-control" name="novo_nome" value="" autocomplete="off" required autofocus>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Email</label>
									<input id="email" type="email" class="form-control" name="email" autocomplete="off" value="" required>


								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="senha">Senha</label>
									<input id="senha" type="password" class="form-control" name="nova_senha" autocomplete="off" required>
									<div class="invalid-feedback">
										Senha é necessária.
									</div>
								</div>

								<button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Já possui uma conta? <a href="index.php" class="text-dark">Login</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		function validarEmail() {
			const nome = document.getElementById('nome').value;
			const email = document.getElementById('email').value;
			const senha = document.getElementById('senha').value;

			if (nome.length < 3) {
				alert("O nome de usuário deve ter pelo menos 3 caracteres.");
				return false;
			}

			const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
			if (!regex.test(email)) {
				alert("Por favor, insira um email válido.");
				return false;
			}

			if (senha.length < 6) {
				alert("A senha deve ter pelo menos 6 caracteres.");
				return false;
			}

			return true;
		}
	</script>
</body>

</html>