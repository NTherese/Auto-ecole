<?php

function autoload($nom_classe) {

    if (file_exists('./Admin/lib/php/classes/' . $nom_classe . '.class.php')) {
        require './Admin/lib/php/classes/' . $nom_classe . '.class.php';
    } else if (file_exists('./Admin/lib/php/classes/' . $nom_classe . '.class.php')) {
        require './Admin/lib/php/classes/' . $nom_classe . '.class.php';
    }
    
    else {
        print "Aucune classe chargée : ".$nom_classe;
    }
}

spl_autoload_register('autoload');
