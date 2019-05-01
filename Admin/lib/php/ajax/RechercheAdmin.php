<?php
header('Content-Type: application/json');
require '../pgConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Admin.class.php';
require '../classes/AdminDB.class.php';

$cnx = Connexion::getInstance($dsn,$user,$pass);

try{       
    $search = new AdminDB($cnx);
    $retour = $search->getAdmin;   
    print json_encode($retour);    
}
catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace();
}
