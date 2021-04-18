<?php

    class Videojuego {
        protected $id;
        protected $titulo;
        protected $descripcion;
        protected $precio;
        protected $edad_recomendada;
        protected $fecha_lanzamiento;
        protected $trailer;
        
        public function __construct($row) {
            $this->id=$row['id'];
            $this->titulo=$row['titulo'];
            $this->descripcion=$row['descripcion'];
            $this->precio=$row['precio'];
            $this->edad_recomendada=$row['edad_recomendada'];
            $this->fecha_lanzamiento=$row['fecha_lanzamiento'];
            $this->trailer=$row['trailer'];
        }

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo,$valor) {
            return $this->$atributo=$valor;
        }

        // Constructor alternativo para crear videojuegos sin necesidad de una array
        public static function nuevoVideojuego($id, $titulo, $descripcion, $precio, $edad_recomendada, $fecha_lanzamiento, $trailer) {
            return new Videojuego([
                                   'id' => $id,
                                   'titulo' => $titulo,
                                   'descripcion' => $descripcion,
                                   'precio' => $precio,
                                   'edad_recomendada' => $edad_recomendada,
                                   'fecha_lanzamiento' => $fecha_lanzamiento,
                                   'trailer' => $trailer
                                ]);
        }

    }

?>