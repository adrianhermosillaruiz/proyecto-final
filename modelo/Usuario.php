<?php

    class Usuario {
        protected $usuario;
        protected $password;
        
        public function __construct($row) {
            $this->usuario=$row['usuario'];
            $this->password=$row['password'];
        }

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo,$valor) {
            return $this->$atributo=$valor;
        }

        // Constructor alternativo para crear usuarios sin necesidad de una array
        public static function nuevoVideojuego($usuario, $password) {
            return new Usuario([
                                   'usuario' => $usuario,
                                   'password' => $password
                                ]);
        }


        // Comprueba si hay un usuario logeado actualmente
        public static function usuarioLogeado() {
            if(isset($_SESSION['usuario'])) {
                return true;
            }
            return false;
        }

        public static function cerrarSesion() {
            session_unset();
        }
    }



?>