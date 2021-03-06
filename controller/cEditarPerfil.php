<?php
/**
 * @author Susana Fabián Antón
 * @since 18/01/2021
 * @version 19/01/2021
 */

if(!isset($_SESSION[usuarioDAW208LoginLogoffMulticapa])) { //si el usuario no ha iniciado sesión
    header('Location: index.php'); //enviamos al usuario de vuelta al index
    exit;
}
if(isset($_REQUEST['cancelar'])) { // si se ha pulsado el botón de cancelar
    $_SESSION[controladorEnCurso] = $aControladores['inicio']; //guardamos en la sesión el controlador que debe ejecutarse
    header('Location: index.php'); //enviamos al usuario de vuelta al index
    exit;
}

$oUsuario = $_SESSION[usuarioDAW208LoginLogoffMulticapa]; //recuperamos el usuario guardado en la sesión
$codUsuario = $oUsuario->__get(codUsuario); //recuperamos el código del usuario
$descUsuario = $oUsuario->__get(descUsuario); //recuperamos la descripción del usuario
$perfil = $oUsuario->__get(perfil); //recuperamos el perfil del usuario
$numAccesos = $oUsuario->__get(numAccesos); //recuperamos el número de accesos del usuario
$fechaHoraUltimaConexion = $oUsuario->__get(fechaHoraUltimaConexion); //recuperamos la fecha de última conexión del usuario

if(isset($_REQUEST['guardarCambios'])) { // si se ha pulsado el botón de guardar cambios
    $oUsuarioModificado = UsuarioPDO::modificarUsuario($codUsuario, $_REQUEST['descUsusario']); //modificamos los datos del usuario
    if(!is_null($oUsuarioModificado)) { //si la modificación se realiza correctamente
        $_SESSION[usuarioDAW208LoginLogoffMulticapa] = $oUsuarioModificado; //guardamos el nuevo objeto usuario en la sesión
    }
    $_SESSION[controladorEnCurso] = $aControladores['inicio']; //guardamos en la sesión el controlador que debe ejecutarse
    header('Location: index.php'); //enviamos al usuario de vuelta al index
    exit;
}

$vistaEnCurso = $aVistas['editarPerfil']; //variable que contiene la vista que va a ejecutarse
require_once $aVistas['layout']; //llamamos al layout