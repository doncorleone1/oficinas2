<!DOCTYPE html>
<html>
	<head>
		<?php
			$iconSource = base_url("images/icons/despachama_favicon.ico");
			echo "<link rel='shortcut icon' href='". $iconSource ."'>";
		?>
		<meta charset="UTF-8">
		<title>Registro - Despachama</title>
		<!--Import Google Icon Font-->
  		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Let browser know website is optimized for mobile-->
		<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
	  	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/materialize.min.css" media="screen,projection">
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/register.css">
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/navbar.css">
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/footer.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<?php
			$this->load->view('navbarclient');
		?>

    	<form action="<?=base_url('ChangePassword/ChangePassword')?>"
			onsubmit="return validatePassword()" class="boxLogin container col s12 row"
			method="post" id="updateForm">

			<div class="row">
				<h1 class="center-align indigo-text accent-4 titleLogin">ALTERAR SENHA</h1>
			</div>

			<div class="row valign-wrapper">
                <div class="input-field col s12">
                    <?php
                        $currentCPF = $this->session->userdata('userCPF');
                        echo "<input id='cpfUser' name='CPF' type='text' class='disabled' value='$currentCPF' readonly>
                        <label for='cpfUser'>CPF</label>"
                    ?>
                </div>
            </div>

			<!-- New Password block -->
            <div class="row valign-wrapper">
                <div class="input-field col s12">
                    <input id='newPasswordUser' name='SENHA' type='password' class='validate'>
                    <label for='newPasswordUser'>Nova Senha</label>
                </div>
            </div>

			<!-- New Password block -->
            <div class="row valign-wrapper">
                <div class="input-field col s12">
                    <input id='repeatPasswordUser' name='NOVA_SENHA' type='password' class='validate'>
                    <label for='repeatPasswordUser'>Repita a Senha</label>
                </div>
            </div>

			<!-- Register the user -->
            <div class="center-align row">
				<input type="submit" value="Alterar" class="indigo accent-4 waves-effect waves-light btn"/>
			</div>

    	</form>

		<?php
			$this->load->view('footer');
		?>

    	<script type="text/javascript">
      		function validatePassword() {
				var newPasswordUser = document.getElementById("newPasswordUser").value;
                var repeatPasswordUser = document.getElementById("repeatPasswordUser").value;

        		if (newPasswordUser != "" && repeatPasswordUser != "") {
          			if (newPasswordUser.length < 6) {
            			Materialize.toast('Informe uma senha com no mínimo 6 caracteres', 3000, 'red black-text');
          			} else {
            			if (newPasswordUser != repeatPasswordUser) {
              				Materialize.toast('As senhas devem ser iguais', 3000, 'red black-text');
              				return false;
            			}
            			return true;
          			}
        		} else {
                    if (newPasswordUser == "") {
            			Materialize.toast('Informe a nova senha', 3000, 'red black-text');
          			} else if (repeatPasswordUser == "") {
            			Materialize.toast('Repita a senha', 3000, 'red black-text');
          			}
    			}
        		return false;
      		}
    	</script>

		<!--Import jQuery before materialize.js-->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
	    <script src="<?php echo base_url();?>js/materialize.min.js"></script>
	    <script type="text/javascript">
	    	$(document).ready(function() {
	        	$('select').material_select();
	        	var $fieldCPF = $("#cpfUser");
	        	$fieldCPF.mask('000.000.000-00', {reverse: true});
	      	});
		</script>
	</body>
</html>
