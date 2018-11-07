<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
    </head>

    <body>
    	<!-- Insert a new user -->
    	<form action="<?=base_url('AdminConfig/InsertUser')?>" name="InsertUser" id="insertUser"
            onsubmit="return validateInsertUser()" class="row" method="post" enctype="multipart/form-data">

    		<!-- The ID of the user -->
    		<div class="input-field col s12">
    			<input name="CPF" id="user_cpf_insert" type="text" class="validate">
                <label for="user_cpf_insert">CPF</label>
    		</div>

			<!-- The password of the user -->
			<div class="input-field col s12">
				<input name="SENHA" id="user_password_insert" type="password" class="validate">
                <label for="user_password_insert">Senha</label>
			</div>

			<!-- The name of the user -->
			<div class="input-field col s12">
				<input name="NOME" id="user_name_insert" type="text" class="validate">
                <label for="user_name_insert">Nome</label>
			</div>

    		<div class="center-align col s12">
    			<button class="btn green waves-effect waves-light" type="submit" name="InsertUser">
    				CADASTRAR <i class="material-icons right">create</i>
    			</button>
    		</div>

    	</form>

		<!-- Update a specific user -->
		<form action="<?=base_url('AdminConfig/UpdateUser')?>" name="updateUser" id="updateUser" class="row" method="post">
			<div class="input-field col s12">
			<?php
    			echo "<select name='CPF'>
					<option value='' disabled selected>Escolha o usuário</option>";
					foreach($users as $actualUser) {
						echo "<option value='". $actualUser["CPF"] ."'>". $actualUser["CPF"] . " - " . $actualUser["NOME"] . "</option>";
					}
					echo "</select>";
					echo "<div class='input-field col s12'>
						<input type='text' placeholder='Nome' name='NOME'><br>
						</div class='input-field col s12'>";
				?>
			</div>

			<div class="center-align col s12">
				<button class="btn blue waves-effect waves-light" type="submit" name="updateUser">
    				ATUALIZAR <i class="material-icons right">create</i>
    			</button>
  			</div>
		</form>

		<!-- Delete a specific user -->
		<form action="<?=base_url('AdminConfig/DeleteUser')?>" name="deleteUser" id="deleteUser" class="row" method="post">
			<div class="input-field col s12">
    			<select name="CPF">
					<option value="" disabled selected>Escolha o usuário</option>
					<?php
						foreach($users as $actualUser) {
							echo "<option value='". $actualUser["CPF"] ."'>". $actualUser["CPF"] . " - " . $actualUser["NOME"] . "</option>";
						}
					?>
				</select>
			</div>
			<div class="center-align col s12">
				<button class="btn red waves-effect waves-light" type="submit" name="deleteUser">
    				REMOVER <i class="material-icons right">delete</i>
    			</button>
  			</div>
		</form>

        <script>
			$(document).ready(function() {
				$('select').material_select();
	        	$("#user_cpf_insert").mask('000.000.000-00', {reverse: true});
	      	});

			function validateInsertUser() {
				let user_cpf_insert, user_password_insert, user_name_insert, insertUser = document.getElementById("insertUser");
				user_cpf_insert = insertUser.user_cpf_insert.value;
				user_password_insert = insertUser.user_password_insert.value;
				user_name_insert = insertUser.user_name_insert.value;
        		if (user_cpf_insert != "" && user_password_insert != "" && user_name_insert !="") {
          			if (user_password_insert.length < 6) {
            			Materialize.toast('Informe uma senha com no mínimo 6 caracteres', 3000, 'red black-text');
          			} else {
            			if (user_cpf_insert.length < 14) {
              				Materialize.toast('Informe um CPF válido', 3000, 'red black-text');
              				return false;
            			}
            			return true;
          			}
        		} else {
          			if (user_cpf_insert == "") {
						Materialize.toast('Informe o CPF', 3000, 'red black-text');
          			} else if (user_password_insert == "") {
            			Materialize.toast('Informe a senha', 3000, 'red black-text');
          			} else if (user_name_insert == "") {
            			Materialize.toast('Informe o nome', 3000, 'red black-text');
          			}
    			}
        		return false;
      		}
        </script>
    </body>
</html>
