<?php
/**
 * @author Susana Fabián Antón
 * @since 13/01/2021
 * @version 15/01/2021
 */

class UsuarioPDO {
    /**
     * Comprueba en la base de datos que exista un usuario cuyas credenciales coincidan con los datos pasados
     * como parámetro. Si existe, devuelve sus datos.
     *  
     * @param type $codUsuario el código del usuario que deseamos validar.
     * @param type $password la contraseña del usuario que deseamos validar.
     * @return \Usuario $oUsuario variable que contendrá una instancia de Usuario con datos del usuario que deseamos validar.
     * Si no existe un usuario con esas credenciales, devolverá null.
     */
    public static function validarUsuario($codUsuario, $password) {
        $oUsuario = null; //variable en la que almacenaremos el usuario que estamos buscando
        $selectUsuario = "SELECT * FROM T01_Usuario WHERE T01_CodUsuario=? AND T01_Password=?"; //creamos la consulta
        $resultadoUsuario = DBPDO::ejecutarConsulta($selectUsuario, [$codUsuario, hash("sha256",($codUsuario.$password))]); //ejecutamos la consulta
        if($resultadoUsuario->rowCount() > 0) { //si se ha encontrado un usuario con esas credenciales
            $fetchUsuario = $resultadoUsuario->fetchObject(); //recogemos los datos del usuario de la base de datos
            //instanciamos un objeto de la clase Usuario con esos datos
            $oUsuario = new Usuario($fetchUsuario->T01_CodUsuario, $fetchUsuario->T01_Password, $fetchUsuario->T01_DescUsuario, $fetchUsuario->T01_Perfil, $fetchUsuario->T01_ImagenUsuario);         
        }
        return $oUsuario;
    }
}
