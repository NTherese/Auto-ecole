<!DOCTYPE html>

<?php
session_start();
?>
<?php
require './lib/php/admin_liste_include.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);

?>



<html>
    <head> <meta charset="UTF-8">        
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous"/>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" crossorigin="anonymous">
        <link rel="stylesheet" href="lib/css/Custom.css" />
        <link rel="stylesheet" type="text/css" href="lib/css/Style.css"/>
        <script src='./lib/js/FonctionsJqueryDA.js'></script>
         <title>Auto Ecole</title>
    </head>

    <body>
        <header>
            <div class ="container" style="background-color: #00BBF0;">
                
                <?php
                if (file_exists('./lib/php/a_menu.php')) {
                    require './lib/php/a_menu.php';
                }
                ?>
            </div>
        </header>
        <section>
            <div class="container">
                
            <?php 
            if (!isset($_SESSION['page'])) {
                $_SESSION['page'] = "Accueil.php"; // page par défaut 
            }
            if (isset($_GET['page'])) {
                $_SESSION['page'] = $_GET['page'];
            }
            $path = "./page/".$_SESSION['page'];

            if (file_exists($path)) {
                include ($path);
            } else {
                 include ('./Page/Page404.php');;
            }
           
            ?>
            </div>
        </section>

        <footer>
            
                
                <?php
                if (file_exists('./lib/php/footer.php')) {
                    require './lib/php/footer.php';
                }
                ?>
                
        </footer>

    </body>


</html> 
