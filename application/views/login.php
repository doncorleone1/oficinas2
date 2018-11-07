<!DOCTYPE html>
<html>
	<head>
		<?php
			$iconSource = base_url("images/icons/despachama_favicon.ico");
			echo "<link rel='shortcut icon' href='". $iconSource ."'>";
		?>
		<meta charset="UTF-8">
		<title>Login - Despachama</title>
		<!--Import Google Icon Font-->
  		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
		<!--Let browser know website is optimized for mobile-->
  		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/materialize.min.css" media="screen,projection">
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/login.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>

	<body>
		<?php $this->load->view('navbarindex'); ?>
		<?php
			$this->load->helper(array('form', 'url'));

			$this->load->library('form_validation');
			
			echo validation_errors();
		?>
		<form action="<?=base_url('Login/Login')?>" id="loginForm"
			class="boxLogin container row" method="post">
			<!-- The title of login -->
			<div class="col s12">
				<h1 class="center-align indigo-text accent-4 titleLogin">Despachama</h1>
			</div>

			<!-- CPF block -->
            <div class="col s12 valign-wrapper">
				<div class="input-field col s12">
					<input id="cpfUserLogin" name="cpfUser" type="text" class="validate">
                    <label for="cpfUserLogin">CPF</label>
                </div>
            </div>

            <!-- Password block -->
            <div class="col s12 valign-wrapper">
                <div class="input-field col s12">
                    <input id="passwordUser" name="passwordUser" type="password" class="validate">
                    <label for="passwordUser">Senha</label>
                </div>
            </div>

			<!-- Login functionality -->
			<div class="center-align col s12">
				<input type="submit" value="Logar" class="indigo accent-4 waves-effect waves-light btn"/>
			</div>
	   </form>
	  <?php
	  	$this->load->view('footer');
	  ?>


	<!--Import jQuery before materialize.js-->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
	<script src="<?php echo base_url();?>js/materialize.min.js"></script>

	<script>
		$(document).ready(function() {
			$('select').material_select();
			$("#cpfUserLogin").mask('000.000.000-00', {reverse: true});;
		});

		function validateLoginForm() {
			let loginForm = document.getElementById("loginForm");
			let cpfUser = loginForm.cpfUser.value;
			let passwordUser = loginForm.passwordUser.value;
			if (cpfUser != "" && passwordUser != "") {
				if (passwordUser.length < 6) {
					Materialize.toast('Informe uma senha com no mínimo 6 caracteres', 3000, 'red black-text');
					return false;
				} else {
					if (cpfUser.length < 14) {
						Materialize.toast('Informe um CPF válido', 3000, 'red black-text');
						return false;
					}
					return true;
				}
			} else {
				if (cpfUser == "") {
					Materialize.toast('Informe o CPF', 3000, 'red black-text');
				} else if (passwordUser == "") {
					Materialize.toast('Informe a senha', 3000, 'red black-text');
				}
			}
			return false;
		}
	</script>
	</body>
</html>
