<?php

if (file_exists('./Admin/lib/php/pgConnect.php')){
    require './Admin/lib/php/pgConnect.php';
    require './Admin/lib/php/Autoload.php';
}
else if (file_exists('./Admin/lib/php/Autoload.php')){
    require './Admin/lib/php/pgConnect.php';
    require './Admin/lib/php/Autoload.php';
}