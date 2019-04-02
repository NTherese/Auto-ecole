<?php

//si on a cliqué sur le bouton "envoyé" du formulaire

if (isset($_POST['submit_login'])) {

    extract($_POST, EXTR_OVERWRITE);
    $log = new AdminDB($cnx);
    $admin = $log->getAdmin($admin, $password);
    var_dump($admin);
    if (is_null($admin)) {
        print "</br>Données incorrectes";
    } else {
        $_SESSION['admin'] = 1;
        unset($_SESSION['page']);
        print "<meta http-equiv=\"refresh\": Content=\"3;URL=./admin/index.php\">";
        
    }
}
?>
<form action="<?php print $_SERVER['PHP_SELF'];?>" method="post">
    Login : <input type="text" name="admin" id="admin"/></br>
    
    Mot de passe : <input type="password" name="password" id="password"/></br>
    
    <input type="submit" name="submit_login" id="submit_login" value="Se connecter"/>
</form>
