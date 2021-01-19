<?php
/**
 * @author Susana Fabián Antón
 * @since 14/01/2021
 * @version 18/01/2021
 */
//constantes que contienen datos que necesitan las funciones de la libreria de validacion
define('OBLIGATORIO', 1);
define('OPCIONAL', 0);
$entradaOK = true; // creamos una variable que indicará que el formulario está bien rellenado
$aErrores = [ // creamos un array para guardar los errores que surjan durante la validación
    'usuario' => null,
    'password' => null
]; 
$aFormulario = [ // creamos un array para guardar los valores correctos de los campos del formulario
    'usuario' => null,
    'password' => null
];

if (isset($_REQUEST['iniciarSesion'])) { // si se ha pulsado el botón de iniciar sesión
    // VALIDACIÓN DE LOS DATOS -> utilizando los métodos de la librería de validaciones
    $aErrores['usuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'], 100, 1, OBLIGATORIO); // maximo, mínimo y obligatoriedad
    $aErrores['password'] = validacionFormularios::validarPassword($_REQUEST['password'], 64, 1, 1, OBLIGATORIO); //máximo, mínimo, tipo y obligatoriedad
    foreach ($aErrores as $campo => $error) { // recorremos el vector en busca de errores
        if ($error != null) { // si encontramos errores
            $entradaOK = false;
        }
    }
}
else { // si NO se ha pulsado enviar
    $entradaOK = false;
}

if ($entradaOK) { // si el formulario se ha rellenado y los datos son correctos
    // guardamos los datos en el $aFormulario
    $aFormulario['usuario']=$_REQUEST['usuario'];
    $aFormulario['password']=$_REQUEST['password'];
    
    //pedimos a la clase UsuarioPDO que valide las credenciales de usuario MODIFICACIONES PENDIENTES
    $oUsuario = UsuarioPDO::validarUsuario($aFormulario['usuario'], $aFormulario['password']);
    if(!is_null($oUsuario)) { //si existe un usuario con esas credenciales
        $_SESSION[usuarioDAW208LoginLogoffMulticapa] = $oUsuario; //guardamos en la sesión el objeto usuario
        $_SESSION[controladorEnCurso] = $aControladores['inicio']; //guardamos en la sesión el controlador que debe ejecutarse
        header('Location: index.php'); //enviamos al de vuelta al index
        exit;
    }
}
$vistaEnCurso = $aVistas['login']; //variable que contiene la vista que va a ejecutarse
require_once $aVistas['layout']; //llamamos al layout
