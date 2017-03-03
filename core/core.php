<?php
/*
  Nucleo de la aplicacion
*/

session_start();
date_default_timezone_set('America/Bogota');

#Constantes de conexión
define('DB_HOST','127.0.0.1');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','foro');

#Constantes de la APP
define('HTML_DIR','html/');
define('APP_TITLE','Skripted SEC - Informatic-Death');
define('APP_COPY','Copyright &copy ' . date('Y',time()) . ' Create By Dead_*88 & BL0CK_LT3 - informatic-Death - Skripted SEC');
define('APP_URL','http://127.0.0.1/foro/');

#Constantes de PHPMailer
define('PHPMAILER_HOST','p3plcpnl0173.prod.phx3.secureserver.net');
define('PHPMAILER_USER','public@ocrend.com');
define('PHPMAILER_PASS','Prinick2016');
define('PHPMAILER_PORT',465);

#Constantes básicas de personalización
define('MIN_TITULOS_TEMAS_LONGITUD',9);
define('MIN_CONTENT_TEMAS_LONGITUD',10);

#Estructura
require('vendor/autoload.php');
require('core/models/class.Conexion.php');
require('core/bin/functions/Encrypt.php');
require('core/bin/functions/Users.php');
require('core/bin/functions/Categorias.php');
require('core/bin/functions/Foros.php');
require('core/bin/functions/EmailTemplate.php');
require('core/bin/functions/LostpassTemplate.php');
require('core/bin/functions/UrlAmigable.php');
require('core/bin/functions/BBcode.php');
require('core/bin/functions/OnlineUsers.php');
require('core/bin/functions/GetUserStatus.php');
require('core/bin/functions/IncreaseVisita.php');

$_users = Users();
$_categorias = Categorias();
$_foros = Foros();