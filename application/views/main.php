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
                // foreach ($myNewServices as $actualService) {
                //     echo "<label>". $actualService['STATUS'] ." - ". $actualService['REFERENCIA'] ."</label>";
                // }
                echo "</div>";
            }
            $this->load->view('footer');
        ?>
    </body>
</html>
