<?php
    require_once("Videojuego.php");

    class Conexion {
        static private $host = "localhost";
        static private $usuario = "getgames";
        static private $passwd = "getgames2021";
        static private $bd = "getgames";

        static function consulta($sql) {
            $host = self::$host;
            $usuario = self::$usuario;
            $passwd = self::$passwd;
            $bd = self::$bd;
            
            // Se crea una conexión por cada consulta
            try {
                $conexion = new PDO("mysql:host=$host;dbname=$bd;charset=utf8",$usuario,$passwd);
            } catch (Exception $e) {
                exit("Error: ".$e->getMessage());
            }

            // Distinguir si es SELECT u otra operación para PDO
            $operacion = strtoupper(explode(" ",trim($sql))[0]);

           if ($operacion == "SELECT") {
               $resultado = $conexion->query($sql);
           } else {
                $resultado = $conexion->exec($sql);
           }

           if (!$resultado) exit("Error ejecutando la consulta: $sql");

           return $resultado;
        }

        static function getVideojuegos($inicio = 0, $cantidad = 57) {
            $sql = "SELECT * FROM VIDEOJUEGO LIMIT $inicio,$cantidad";
            $resultado = self::consulta($sql);
            $videojuegos = [];

            if($resultado) {
                while($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    array_push($videojuegos, new Videojuego($row));
                }
            }

            return $videojuegos;
        }

        static function getVideojuego($id) {
            $sql = "SELECT * FROM VIDEOJUEGO WHERE id = '$id'";
            $resultado = self::consulta($sql);

            if($resultado) {
                $videojuego = $resultado->fetch(PDO::FETCH_ASSOC);
                return new Videojuego($videojuego);
            }

            return -1;
        }

        // Cantidad de videojuegos, usuarios, plataformas...
        static function getCantidad($tabla = "VIDEOJUEGO") {
            $sql = "SELECT count(*) as cantidad FROM $tabla";
            $resultado = self::consulta($sql);
            
            $cantidad = intval($resultado->fetch(PDO::FETCH_ASSOC)['cantidad']);

            return $cantidad;
        }
        
    }

?>