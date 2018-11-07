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

<h3 class='center'>Seu arquivo foi upado com sucesso!</h3>

<p><?php echo 
    "<div class='center'>";
    echo anchor('upload', 'Faça o upload de outro arquivo!');
    echo "</div>" ?></p>

</body>
</html>