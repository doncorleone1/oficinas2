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
        <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/navbar.css">
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/footer.css">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="<?php echo base_url();?>js/materialize.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>

    <body>
        <?php
            $typeUser = $this->session->userdata('userType');
            if($typeUser == 'admin') {
                $this->load->view('navbaradmin');
                echo "<script type='text/javascript'>
                        google.charts.load('current', {'packages': ['corechart']});
                        google.charts.setOnLoadCallback(drawChart);";
                    echo "function drawChart() {
                            var options = {
                                'title': 'Serviços por categoria',
                                'width': 800,
                                'height': 300
                            };
                            var data = google.visualization.arrayToDataTable([
                                ['Tipo', 'Quantidade de serviços'],";
                            foreach ($relationServices as $actualService) {
                                echo "['". $actualService['Tipo'] ."', ". $actualService['Quantidade'] ."],";
                            }
                            echo "]);
                            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
                            chart.draw(data, options);
                        }
                    </script>";
                echo "<div id='chart_div'></div>";
            } else {
                $this->load->view('navbarclient');
                echo "<div class='box'>";
                echo "<h4 class='border-bottom'>Meus serviços</h4>";
                $status = "";
                $tipo = "";
                foreach ($myService as $actualService) {
                    switch ($actualService['STATUS']) {
                        case 1:
                            $status = "Iniciado";
                            break;
                        case 2:
                            $status = "Em andamento";
                            break;
                        case 3:
                            $status = "Aguardando vistoria";
                            break;
                        case 4:
                            $status = "Aguardando DETRAN";
                            break;
                        case 5:
                            $status = "Em vistoria";
                            break;
                        case 6:
                            $status = "Cancelado";
                            break;
                        case 7:
                            $status = "Finalizado";
                            break;
                        default:
                            $status = "error";;
                            break;
                    }

                    switch ($actualService['TIPO']) {
                        case 1:
                            $tipo = "Transferência de veículo";
                            break;
                        case 2:
                            $tipo = "Pagamento IPVA";
                            break;
                        case 3:
                            $tipo = "Pagamento DPVAT";
                            break;
                        case 4:
                            $tipo = "Pagamento Licenciamento";
                            break;
                        case 5:
                            $tipo = "Mudança de Cor";
                            break;
                        case 6:
                            $tipo = "Emplacamento Carro";
                            break;
                        case 7:
                            $tipo = "Emplacamento Moto";
                            break;
                        case 8:
                            $tipo = "Alteração de Dados";
                            break;
                        case 9:
                            $tipo = "2ª Via de Recibo";
                            break;
                        case 10:
                            $tipo = "2ª Via de Documento";
                            break;
                        default:
                            $tipo = "error";;
                            break;
                    }
                    echo "<div class='row-client'>
                    <label class='label-client'>" . "Serviço: ". $tipo ." <br> ". "Descrição: " . $actualService['REFERENCIA'] . " <br> " ."Status: ". $status ."</label> <br>
                    </div>";
                }
                echo "</div>";
            }
            $this->load->view('footer');
        ?>
    </body>
</html>
