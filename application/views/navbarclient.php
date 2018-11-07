<!DOCTYPE html>
<html>
    <head>
        <!-- CSS Files -->
        <link rel="stylesheet" type="text/css "href="css/navbar.css">
        <meta charset="UTF-8">
    </head>

    <body>
        <nav class="indigo darken-4 nav-center" role="navigation">
            <div class="nav-wrapper container">
                <?php
                    // The URLs and routes
                    $logoutURL = base_url('Logout');
                    $mainURL = base_url('Main');
                    $updateURL = base_url('UpdateDataClient');
                    $changePasswordURL = base_url('ChangePassword');

                    echo "<a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>";

                    echo "<ul class='hide-on-med-and-down'>";
                        echo "<li><a href='". $mainURL ."'>Início</a></li>";
                        echo "<li><a href='". $updateURL ."'>Alterar Dados</a></li>";
                        echo "<li><a href='". $changePasswordURL ."'>Alterar Senha</a></li>";
                        echo "<li><a href='". $logoutURL ."'>Logout</a></li>";
                    echo "</ul>";
                ?>
            </div>
        </nav>
        <script>
            $(".button-collapse").sideNav();
        </script>
    </body>

</html>
