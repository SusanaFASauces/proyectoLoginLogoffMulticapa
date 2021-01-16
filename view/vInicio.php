<!--
    Autor: Susana Fabián Antón
    Fecha creación: 15/01/2021
    Última modificación: 16/01/2021
-->
<div class="sesion">
    <p class=center style=font-size:1.2em>¡Bienvenido <?php echo $descUsuario ?>!</p>
      
    <div class="botones-sesion">
        <form class="inline-block" name="logoff" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="submit" value="Cerrar sesión" name="cerrarSesion">
        </form>
    </div>
</div>