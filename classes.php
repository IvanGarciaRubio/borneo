<?php

include 'config.php';

class test{

/*---------------------------------------LISTADO DE PROPIEDADES-------------------------------------------------------------------*/
    public function GetAll() {
        $sql = "SELECT * FROM addpropiedad ORDER BY id ASC;";
        try {
            $mysql= mysqli_query($GLOBALS["db_link"],$sql);
            $productos=array();
            while ($producto = $mysql->fetch_assoc()) {
                $productos[] = $producto;
            }
            return $productos;
       } catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}';
       }
    }

/*---------------------------------------LISTADO DE PROPIEDADES POR ID-------------------------------------------------------------*/
    public function IdPropiedad($id) {
        $sql = "SELECT * FROM addpropiedad WHERE id= ".$id;
        try {
            $mysql= mysqli_query($GLOBALS["db_link"],$sql);
            if($mysql->num_rows == 1){
			    $usuario = $mysql->fetch_assoc();
                $resultado = array($usuario);
            }
            return $resultado;
       } catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}';
       }
    }

/*---------------------------------------AÑADIR PROPIEDADES-----------------------------------------------------------------------*/
    public function AddPropiedades($nombre, $descripcion, $personas, $acceso, $salasReuniones, $recepcion, $eventosNetwork,
    $terraza, $cafeRelax, $seguridad, $limpieza, $tarifa, $tipoPropiedad, $imagen, $direccion, 
    $ciudad, $comunidadAutonoma) {
        if(!isset($imagen)){
			$imagen=""; 
		}
        if(!isset($nombre) and !isset($descripcion) and !isset($personas) and !isset($acceso) and !isset($salasReuniones) and !isset($recepcion)
        and !isset($eventosNetwork) and !isset($terraza) and !isset($cafeRelax) and !isset($seguridad) and !isset($limpieza)
        and !isset($tarifa) and !isset($tipoPropiedad) and !isset($direccion) and !isset($ciudad) and !isset($comunidadAutonoma)){
			$nombre="";
            $descripcion="";
            $personas="";
            $acceso="";
            $salasReuniones="";
            $recepcion="";
            $eventosNetwork="";
            $terraza="";
            $cafeRelax="";
            $seguridad="";
            $limpieza="";
            $tarifa="";
            $tipoPropiedad="";
            $direccion="";
            $ciudad="";
            $comunidadAutonoma="";
		}

        $sql = "INSERT INTO addpropiedad (nombre, descripcion, personas, access, salas_reuniones, reception, eventos_network, terraza, cafe_relax, seguridad, limpieza, tarifa, tipo_propiedad, imagen, direccion, ciudad, comunidad_autonoma) VALUES('$nombre','$descripcion','$personas','$acceso','$salasReuniones','$recepcion', '$eventosNetwork','$terraza','$cafeRelax','$seguridad','$limpieza','$tarifa','$tipoPropiedad','$imagen','$direccion','$ciudad','$comunidadAutonoma');";
        
        try {
            $mysql= mysqli_query($GLOBALS["db_link"],$sql);
            return $sql;
        } catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

/*---------------------------------MODIFICAR PROPIEDADES---------------------------------------------------------------------------*/
    public function ModifyPropiedades($nombre, $descripcion, $personas, $acceso, $salasReuniones, $recepcion, $eventosNetwork,
    $terraza, $cafeRelax, $seguridad, $limpieza, $tarifa, $tipoPropiedad, $imagen, $direccion, 
    $ciudad, $comunidadAutonoma, $id) {

        $sql = "UPDATE addpropiedad SET nombre = '$nombre', descripcion = '$descripcion', personas = '$personas', 
        access = '$acceso', salas_reuniones = '$salasReuniones',reception = '$recepcion', 
        eventos_network = '$eventosNetwork', terraza = '$terraza', cafe_relax = '$cafeRelax', seguridad = '$seguridad', 
        limpieza = '$limpieza', tarifa = '$tarifa',tipo_propiedad = '$tipoPropiedad', imagen = '$imagen', 
        direccion = '$direccion',ciudad = '$ciudad', comunidad_autonoma = '$comunidadAutonoma' WHERE id= ".$id;
        
        try {
            $mysql= mysqli_query($GLOBALS["db_link"],$sql);
        } catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

/*---------------------------------------BORRADO DE CLIENTES----------------------------------------------------------------------*/
    public function DeletePropiedades($id) {
        $sql = "DELETE FROM addpropiedad WHERE id= ".$id;
        try {
            $mysql= mysqli_query($GLOBALS["db_link"],$sql);
       } catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}';
       }
    }

/*---------------------------------------LISTADO DE CONTACTOS-------------------------------------------------------------------*/
    public function GetContact() {
        $sql = "SELECT * FROM contactos ORDER BY id ASC;";
        try {
            $mysql= mysqli_query($GLOBALS["db_link"],$sql);
            $contactos=array();
            while ($contacto = $mysql->fetch_assoc()) {
                $contactos[] = $contacto;
            }
            return $contactos;
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
    }

/*---------------------------------------LISTADO DE CONTACTOS POR ID------------------------------------------------------------*/
    public function IdContact($id) {
        $sql = "SELECT * FROM contactos WHERE id= ".$id;
        try {
            $mysql= mysqli_query($GLOBALS["db_link"],$sql);
            if($mysql->num_rows == 1){
                $usuario = $mysql->fetch_assoc();
                $resultado = array($usuario);
            }
            return $resultado;
        } catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

/*---------------------------------------BORRADO DE CONTACTOS----------------------------------------------------------------------*/
    public function DeleteContact($id) {
        $sql = "DELETE FROM contactos WHERE id= ".$id;
        try {
            $mysql= mysqli_query($GLOBALS["db_link"],$sql);
        } catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

/*---------------------------------------AÑADIR Contactos-----------------------------------------------------------------------*/
    public function AddContacto($nombre, $email, $asunto, $mensaje, $fecha) {
        if(!isset($nombre)){
            $nombre="";
        }
        if(!isset($email)){
            $email="";
        }
        if(!isset($asunto)){
            $asunto="";
        }
        if(!isset($mensaje)){
            $mensaje="";
        }
        if(!isset($fecha)){
            $fecha="";
        }

        $sql = "INSERT INTO contactos (id,nombre, email, asunto, mensaje, fecha) VALUES(NULL,'$nombre','$email','$asunto','$mensaje','$fecha');";
        
        try {
            $mysql= mysqli_query($GLOBALS["db_link"],$sql);
            return $sql;
        } catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
            
}



?>