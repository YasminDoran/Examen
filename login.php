<?php

    //Incluímos librerías y archivos necesarios.
    require 'template/header.php';
    require 'template/footer.php';

	echo"<form action='login.php' method='POST' name = 'frmdo' id = 'frmdo' target = '_self'>";
	echo"<input type='text' name='user' placeholder='Usuario'>";
	echo"<input type='password' name='pass' placeholder='Contraseña'>";
	echo"<input type='submit' value='Acceder'>";
	echo"</form>";
	echo"<div id = 'msg' class='ajax_login'></div>";


?>

<script type = "text/JavaScript">
    //Funcion la cual detiene el submit, manda llamar al archivo valida.php.
    $(function (e) {
        $('#frmdo').submit(function (e) {
            e.preventDefault()
            $('.ajax_login').load('valida.php?' + $('#frmdo').serialize())
        })
    })
</script>