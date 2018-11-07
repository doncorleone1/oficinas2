<html>
<head>
    <title>Upload de Arquivos</title>
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

    <?php
        $this->load->view('navbaradmin');
    ?>

    <?php echo $error;?>

    <?php echo form_open_multipart('upload/do_upload');?>

    <div class="input-field col s12 center">
        <input type="file" name="userfile" size="20" />

        <br /><br />

        <input type="submit" value="Upload" />
        </div>

    </form>

    <!--Import jQuery before materialize.js-->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
	    <script src="<?php echo base_url();?>js/materialize.min.js"></script>
	    <script type="text/javascript">
	    	$(document).ready(function() {
	        	$('select').material_select();
            });
        </script>

</body>
</html>