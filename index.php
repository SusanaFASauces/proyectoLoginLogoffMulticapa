<?php
/**
 * @author Susana Fabián Antón
 * @since 14/01/2021
 * @version 14/01/2021
 */

//incluimos los ficheros de configuración
require_once 'config/confAplicacion.php';
require_once 'config/confDB.php';

session_start(); //iniciamos la sesión

if(isset($_SESSION["usuarioDAW208LoginLogoffMulticapa"])) { //si se ha iniciado sesión
    require_once $aControladores["inicio"]; //mandamos al usuario a la página de inicio
}
else { //si no
    require_once $aControladores["login"]; //mandamos al usuario al login
}