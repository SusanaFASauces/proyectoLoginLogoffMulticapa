<!--
    Autor: Susana Fabián Antón
    Fecha creación: 14/01/2021
    Última modificación: 14/01/2021
-->
<form class="formulario" name="login" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <p> <!-- Usuario -->
        <label for="lblUsuario">Usuario</label>
        <input type="text" id="lblUsuario" name="usuario">
    </p>
    <p> <!-- Contraseña -->
        <label for="lblPassword">Contraseña</label>
        <input type="password" id="lblPassword" name="password">
    </p>
    <p>
        <input type="submit" value="Iniciar sesión" name="iniciarSesion">
    </p>
</form>