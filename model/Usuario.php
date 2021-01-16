<?php
/**
 * @author Susana Fabián Antón
 * @since 12/01/2021
 * @version 12/01/2021
 */
class Usuario {
    private $codUsuario;
    private $password;
    private $descUsuario;
    private $numAccesos;
    private $fechaHoraUltimaConexion;
    private $perfil;
    private $imagenUsuario;

    public function __construct($codUsuario, $password, $descUsuario, $perfil, $imagenUsuario) {
        $this->codUsuario = $codUsuario;
        $this->password = $password;
        $this->descUsuario = $descUsuario;
        $this->numAccesos = 0;
        $this->perfil = $perfil;
        $this->imagenUsuario = $imagenUsuario;
    }
    
    public function __get($atributo) {
        return $this->$atributo;
    }
    
    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
}