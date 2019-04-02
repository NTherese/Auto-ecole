<?php

if (file_exists('./Admin/lib/php/pgConnect.php')){
    require './Admin/lib/php/pgConnect.php';
    require './Admin/lib/php/Autoload.php';
}
else if (file_exists('./lib/php/Autoload.php')){
    require './lib/php/pgConnect.php';
    require './lib/php/Autoload.php';
}