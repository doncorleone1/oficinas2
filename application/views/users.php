<!DOCTYPE html>
<html>
	<head>
		<?php
			$iconSource = base_url("images/icons/despachama_favicon.ico");
			echo "<link rel='shortcut icon' href='". $iconSource ."'>";
		?>
		<meta charset="UTF-8">
		<title>Usuários - Despachama</title>
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
		<?php $this->load->view('navbar'); ?>
		<form action="<?=base_url('Login/Login')?>" onsubmit="return validateLoginForm()" class="boxLogin container row" method="post">
			<!-- The title of login -->
			<div class="col s12">
				<h1 class="center-align indigo-text accent-4 titleLogin">Filtros</h1>
			</div>

			<!-- Name block -->
            <div class="col s12 valign-wrapper">
				<div class="input-field col s12">
					<input id="name" name="name" type="text" class="validate">
                    <label for="name">Nome</label>
                </div>
            </div>

            <!-- Email block -->
            <div class="col s12 valign-wrapper">
				<div class="input-field col s12">
					<input id="email" name="EMAIL" type="email" class="validate">
                    <label for="email" data-error="E-mail informado inválido" data-success="E-mail informado válido">E-mail</label>
                </div>
            </div>

            <!-- CPF block -->
            <div class="col s12 valign-wrapper">
				<div class="input-field col s12">
					<input id="cpfUserAdmin" name="CPF" type="text" class="validate">
                    <label for="cpfUserAdmin">CPF</label>
                </div>
            </div>

			<!-- Login functionality -->
			<div class="right-align col s12">
				<input type="submit" value="Aplicar" class="indigo accent-4 waves-effect waves-light btn"/>
			</div>
	   </form>
	  <?php
	  	$this->load->view('footer');
	  ?>
    <script>
		$(document).ready(function() {
			$('select').material_select();
			$("#cpfUserAdmin").mask('000.000.000-00', {reverse: true});
		});
	</script>
	</body>
</html>
