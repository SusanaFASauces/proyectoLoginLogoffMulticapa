<?php
/**
 * @author Susana Fabián Antón
 * @since 14/01/2021
 * @version 14/01/2021
 */
interface DB {
    public function ejecutarConsulta($sentenciaSQL, $parametros);
}
