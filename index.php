<?php
	header("Content-Type: text/html;charset=utf-8");
    session_start();

    if(isset($_SESSION['sesionUsuario'])){
	
		require'helpers.php';
		require 'template/header.php';
		require 'template/footer.php';
		require 'template/menu.php';
		require 'clases/Usuario.php';
		require 'bd/db.php';
	
        if(isset($_GET['url'])){

            controller($_GET['url']);
        }
        else{
            $_GET['url']='escritorio';

            controller($_GET['url']);
        }

    }
    else{
        echo"<script>alert(' No ha iniciado sesión.');
			location.href = 'login.php';
			</script>";
    }