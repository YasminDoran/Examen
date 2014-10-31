<?php

    if(isset($_REQUEST['respuestas'])){
        $correcto = 0;
        for($i = 0; $i < 10; $i++){
            $id = $_REQUEST['id'.$i];
            if(isset($_REQUEST['p'.$i])){
                $res_usu = $_REQUEST['p'.$i];
            }
            else{
                $res_usu = "SIN RESPUESTA";
            }
            $sql = "SELECT * FROM preguntas WHERE id = $id";
            $consulta = mysql_query($sql)or die("Error de consulta");
            $res_base = mysql_result($consulta, 0, 'respuesta');

            if($res_base == $res_usu){
                $correcto++;
            }
        }

        $id_usu = $_COOKIE['id'];

        $sql2 = "SELECT * FROM usuario WHERE id = $id_usu";
        $consulta2 = mysql_query($sql2)or die("Error de consulta");
        $promedio_usu = mysql_result($consulta2, 0, 'Promedio');

        if($promedio_usu < $correcto){
            $sql3 = "UPDATE usuario SET Promedio='$correcto' WHERE id = $id_usu";
            $consulta3 = mysql_query($sql3)or die("Error al actualizar");
        }

    }

	$examen = new Usuario();

?>

<html>
    <head>
	</head>
    <body>
        <div><?=$bienvenida?></div>
        <div>
            <?php
                $id_usu = $_COOKIE['id'];
                $promedio = $examen->consultaPromedio($id_usu);
                echo"$promedio";
            ?>
        </div>
        <div><?php $examen->muestraPreguntas();?></div>

    </body>
</html>