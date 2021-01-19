<?php
/**
 * @author Susana Fabián Antón
 * @since 14/01/2021
 * @version 18/01/2021
 */

//incluimos la librería de validaciones
require_once "core/201130libreriaValidacion.php"; 

//incluimos las clases del modelo
require_once 'model/UsuarioDB.php';
require_once 'model/DB.php';
require_once "model/Usuario.php"; 
require_once "model/UsuarioPDO.php";
require_once "model/DBPDO.php";

$aControladores = [ //array que contiene las rutas de los distintos controladores
    "inicio" => "controller/cInicio.php",
    "login" => "controller/cLogin.php",
    "editarPerfil" => "controller/cEditarPerfil.php"
];

$aVistas = [ //array que contiene las rutas de las distintas vistas
    "layout" => "view/layout.php",
    "inicio" => "view/vInicio.php",
    "login" => "view/vLogin.php",
    "editarPerfil" => "view/vEditarPerfil.php"
];