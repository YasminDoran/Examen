<?php

    class Usuario{

        public function consultaUsuario(){

            $sql0 = "Select * From usuario where estatus = 1 ORDER BY id ASC";
            $consulta0 = mysql_query($sql0)or die("Error de conexión");

            echo"<div class='table-responsive'>";
            echo"<table class='table table-striped'>";
            echo"<tr><td colspan='5' align='center'><strong>Lista de Usuarios</strong></td></tr>";
            echo"<tr><th>Id</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Nivel</th>";

            while($field = mysql_fetch_array($consulta0)){
                $this->Id = $field['id'];
                $this->Nombre = $field['Nombre'];
                $this->ApellidoPaterno = $field['ApellidoPaterno'];
                $this->ApellidoMaterno = $field['ApellidoMaterno'];
                $this->Nivel = $field['Nivel'];
                switch($this->Nivel){
                    case 1:
                        $type = "Administrador";
                        break;
                    case 2:
                        $type = "Maestro";
                        break;
                    case 3:
                        $type = "Alumno";
                        break;
                }
                echo"<tr><td>$this->Id</td><td>$this->Nombre</td><td>$this->ApellidoPaterno</td><td>$this->ApellidoMaterno</td><td>$this->Nivel</td></tr></tr>";
            }
            echo"</table>";
            echo"</div>";

        }
		
		public function muestraPreguntas(){

            echo"<form method='POST' action='index.php'>";
            echo"<div class='table-responsive'>";
            echo"<table class='table table-striped'>";
            echo"<tr><td colspan='2' align='center'><strong>Examen de Programación</strong></td></tr>";
            echo"<tr><th>Pregunta</th><th>Respuesta</th></tr>";
			
            for($i = 0; $i < 10; $i++){
				
				$num = rand(1, 20);
				
				$sql = "Select * From preguntas WHERE id=$num ORDER BY id ASC";
				$consulta = mysql_query($sql)or die("Error de consulta");
				$id = mysql_result($consulta, 0, 'id');
				$pregunta = mysql_result($consulta, 0, 'pregunta');
                echo"<tr><td>$pregunta</td><td><input type='radio' name='p$i' value='SI'> SI
											   <input type='radio' name='p$i' value='NO'> NO</td></tr></tr>";
				echo"<input type='hidden' name='id$i' value='$id'>";
            }
            echo"<input type='hidden' name='respuestas'>";
            echo"<tr><td colspan=2 align=center><input type='submit' value='Enviar' class='button_sok'></td></tr>";
            echo"</table>";
            echo"</div>";
            echo"</form>";

        }

        public function consultaPromedio($id){
            $sql = "Select * From usuario WHERE id=$id";
            $consulta = mysql_query($sql)or die("Error de consulta");
            $promedio = mysql_result($consulta, 0, 'Promedio');
            return $promedio;
        }
    }