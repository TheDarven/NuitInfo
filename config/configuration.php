<?php
const DEBUG = true; // production : false; dev : true

const BD_HOST = 'iutdoua-web.univ-lyon1.fr';
const BD_DBNAME = 'p1804884';
const BD_USER = 'p1804884';
const BD_PWD = '368022';

define("PATH_CONTROLLER", "../controllers/");
define("PATH_VIEWS", "../views/v_");
define('PATH_ENTITY','../entities/');
define('PATH_ASSETS','../../../../../../assets/');
define('PATH_MODELS','../models/');

//sous dossiers
define('PATH_CSS', PATH_ASSETS.'css/');
define('PATH_IMAGES', PATH_ASSETS.'images/');
define('PATH_SCRIPTS', PATH_ASSETS.'scripts/');

//fichiers
define('PATH_LOGO', PATH_IMAGES.'logo.png');
define('PATH_MENU', PATH_VIEWS.'menu.php');