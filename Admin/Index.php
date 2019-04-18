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
            <div class ="container red">
                
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
            <section id="footer">
		<div class="container red">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
                            <ul class="list-unstyled quick-links"><a href="./index.php?page=Accueil.php"><i class="fa fa-angle-double-right"></i>Accueil</a> </ul>
                            <ul><a href="./index.php?page=Apropos.php"><i class="fa fa-angle-double-right"></i>A propos de nous</a></ul>
                            <ul><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></ul>
                            
                            
                        </div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-google-plus"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center ">
                                    <p><u><a href="#">Auto-école TI</a></u> Propriété de NT &REG;</p>
					<p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="#" >N.Thérèse.M</a></p>
				</div>
			</div>	
		</div>
	</section>
        </footer>

    </body>


</html> 
