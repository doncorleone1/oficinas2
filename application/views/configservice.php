<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
    </head>
    <body>
    	<!-- Insert a new service -->
    	<form action="<?=base_url('AdminConfig/InsertService')?>" name="InsertService" id="insertService"
            onsubmit="return validateInsertService()" class="row" method="post" enctype="multipart/form-data">
    		
    		<div class="input-field col s12">
    			<select name="TIPO" id="service_type_insert">
                    <option value="" disabled selected>Selecione o serviço desejado</option>
                    <option value=1>1 - Transferência de Veículo</option>
                    <option value=2>2 - Pagamento IPVA</option>
                    <option value=3>3 - Pagamento DPVAT</option>
                    <option value=4>4 - Pagamento Licenciamento</option>
                    <option value=5>5 - Mudança de Cor</option>
                    <option value=6>6 - Emplacamento Carro</option>
                    <option value=7>7 - Emplacamento Moto</option>
                    <option value=8>8 - Alteração de Dados</option>
                    <option value=9>9 - 2ª Via Recibo</option>
                    <option value=10>10 - 2ª Via Documento</option>
                </select>
    		</div>

			<div class="input-field col s12">
                <select name="CLIENTE_CPF" id="service_client_insert">
                    <option value="" disabled selected>Selecione o cliente</option>
                    <?php
						foreach($users as $actualUser) {
							echo "<option value='". $actualUser["CPF"] ."'>". $actualUser["CPF"] . " - " . $actualUser["NOME"] . "</option>";
						}
					?>
                </select>
			</div>

			<div class="input-field col s12">
				<input name="REFERENCIA" id="referencia_service_insert" type="text" class="validate">
                <label for="referencia_service_insert">Referência do serviço</label>
			</div>

    		<div class="center-align col s12">
    			<button class="btn green waves-effect waves-light" type="submit" name="InsertService">
    				CADASTRAR <i class="material-icons right">create</i>
    			</button>
    		</div>
    	</form>

		<!-- Update a specific service -->
		<form action="<?=base_url('AdminConfig/UpdateService')?>" name="updateService" id="updateService" class="row" method="post">
			<div class="input-field col s12">
				<?php
					echo "<select name='CPF'>
						<option value='' disabled selected>Escolha o serviço</option>";
						foreach($services as $actualService) {
							echo "<option value='". $actualService["CLIENTE_CPF"] ."'>". $actualService["CLIENTE_CPF"]. " - " . $actualService["REFERENCIA"] . "</option>";	
						}
					echo "</select>";
					?>
					<select name='STATUS' id='service_type_insert'>
						<option value="" disabled selected>Selecione o novo status</option>
						<option value=1>1 - Iniciado</option>
						<option value=2>2 - Em andamento</option>
						<option value=3>3 - Aguardando vistoria</option>
						<option value=4>4 - Aguardando DETRAN</option>
						<option value=5>5 - Em vistoria</option>
						<option value=6>6 - Cancelado</option>
						<option value=7>7 - Finalizado</option>
					</select>
			</div>

			<div class="center-align col s12">
				<button class="btn blue waves-effect waves-light" type="submit" name="updateService">
    				ATUALIZAR <i class="material-icons right">create</i>
    			</button>
  			</div>
		</form>

		<!-- Delete a specific service -->
		<form action="<?=base_url('AdminConfig/DeleteService')?>" name="deleteService" id="deleteService"
			onsubmit="return validateRemoveService()" class="row" method="post">
			<div class="input-field col s12">
    			<select name="serviceIdRemove">
					<option value="" disabled selected>Escolha o serviço</option>
					<?php
						foreach($services as $actualService) {
							echo "<option value='". $actualService["ID"] ."'>". $actualService["REFERENCIA"] . "</option>";
						}
					?>
				</select>
			</div>
			<div class="center-align col s12">
				<button class="btn red waves-effect waves-light" type="submit" name="deleteService">
    				REMOVER <i class="material-icons right">delete</i>
    			</button>
  			</div>
		</form>

        <script>
			function validateInsertService() {
				let formService = document.getElementById("insertService");
				let tipo = formService.TIPO.value, clienteCPF = formService.CLIENTE_CPF.value, referencia = formService.REFERENCIA.value;
				if (tipo !== "" && clienteCPF !== "" && referencia !== "") return true;
				else {
					if (tipo === "") Materialize.toast('Informe o tipo do serviço!', 3000, 'red black-text');
					if (clienteCPF === "") Materialize.toast('Informe o CPF do cliente!', 3000, 'red black-text');
					if (referencia === "") Materialize.toast('Informe a referência do serviço!', 3000, 'red black-text');
				}
				return false;
      		}

			function validateRemoveService() {
				let formService = document.getElementById("deleteService");
				let serviceIdRemove = formService.serviceIdRemove.value;
				if (serviceIdRemove !== "") return true;
				else Materialize.toast('Selecione o serviço que será deletado!', 3000, 'red black-text')
				return false;
			}
        </script>
    </body>
</html>
