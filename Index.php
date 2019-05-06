<!DOCTYPE html> 
<?php
session_start();
?>
<?php
require './admin/lib/php/admin_liste_include.php';
$cnx = Connexion:: getInstance($dsn, $user, $pass);

?>



<html>
    <head> <meta charset="UTF-8">        

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="./Admin/lib/css/Custom.css" />
        <link rel="stylesheet" type="text/css" href="./admin/lib/css/Style.css"/>
         <title>Auto Ecole</title>
    </head>

    <body>
        <header>
            <div class ="container" style="background-color: #00BBF0;">
                
                <?php
                if (file_exists('./lib/php/p_menu.php')) {
                    require './lib/php/p_menu.php';
                }
                ?>
                

            </div>
        </header>
        
        <section>
            <span style="color:white;">
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
                include ('Admin/Page/Page404.php');
            }
           
            ?>
            </div>
                </span>
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

