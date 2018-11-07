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
                    $adminURL = base_url('AdminConfig');
                    $loginURL = base_url('Login');
                    $logoutURL = base_url('Logout');
                    $mainURL = base_url('Main');
                    $registerURL = base_url('Register');
                    $usersURL = base_url('Users');

                    echo "<a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>";

                    echo "<ul class='hide-on-med-and-down'>";
                        echo "<li><a href='". $mainURL ."'>Início</a></li>";
                        echo "<li><a href='". $adminURL ."'>Administração</a></li>";
                        echo "<li><a href='". $usersURL ."'>Usuários</a></li>";
                        echo "<li><a href='". $registerURL ."'>Registro</a></li>";
                        echo "<li><a href='". $loginURL ."'>Login</a></li>";
                    echo "</ul>";
                ?>
            </div>
        </nav>
        <script>
            $(".button-collapse").sideNav();
        </script>
    </body>

</html>
