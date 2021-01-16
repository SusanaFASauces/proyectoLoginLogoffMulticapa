<?php
/**
 * @author Susana Fabián Antón
 * @since 13/01/2021
 * @version 13/01/2021
 */
interface UsuarioDB {
    public function validarUsuario($codUsuario, $password);
}
