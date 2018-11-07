<!DOCTYPE html>
<html>
	<head>
        <?php
			$iconSource = base_url("images/icons/despachama_favicon.ico");
			echo "<link rel='shortcut icon' href='". $iconSource ."'>";
		?>
        <meta charset="utf-8">
        <title>Início - Despachama</title>
		
    	<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<!--Let browser know website is optimized for mobile-->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/materialize.min.css" media="screen,projection">
      	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/main.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
		<script src="<?php echo base_url();?>js/materialize.min.js"></script>
    </head>
	<body>
		<?php 
			$this->load->view('navbaradmin'); 
		?>
		
		<div class="container">
    		<ul class="collapsible" data-collapsible="accordion">

      			<li>
        			<div class="collapsible-header">
          					Usuários
          			</div>
        			<div class="collapsible-body">
        				<ul class="row tabs">
        					<li class="col s4 tab">
        						<a href="#insertUser">Cadastrar</a>
    						</li>
    						<li class="col s4 tab">
        						<a href="#updateUser">Atualizar</a>
    						</li>
    						<li class="col s4 tab">
        						<a href="#deleteUser">Remover</a>
    						</li>
        				</ul>
        				<?php $this->load->view('configuser', $users)?>
        			</div>
      			</li>

              	<li>
                	<div class="collapsible-header">
                  		Serviços
                  	</div>
					<div class="collapsible-body">
						<ul class="row tabs">
        					<li class="col s4 tab">
        						<a href="#insertService">Cadastrar</a>
    						</li>
    						<li class="col s4 tab">
        						<a href="#updateService">Atualizar</a>
    						</li>
    						<li class="col s4 tab">
        						<a href="#deleteService">Remover</a>
    						</li>
        				</ul>
        				<?php $this->load->view('configservice', $services)?>
        			</div>
				</li>
    		</ul>
		</div>
	</body>
</html>
