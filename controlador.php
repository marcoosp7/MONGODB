<?php
    require_once("modelo.php");

    class Controlador{
        // creo el modelo
        private $modelo;
        public function __construct(){
            $this->modelo = new Modelo;
        }
    
        public function handler(){
            if (isset($_GET["accion"])) {
                $action = $_GET["accion"];
            } else {
                $action = "";
            }
            switch ($action){
                case 'listarEquipo':
                    $this->listarEquipo();
                    break;

                case 'insertarFutbolista':
                    $this->insertarFutbolista();
                    break;

                case 'insertandoFutbolista':
                    $this->insertandoFutbolista();
                    break;

                case 'eliminarFutbolista':
                    $this->eliminarFutbolista();
                    break;

                case 'editarFutbolista':
                    $this->editarFutbolista();
                    break;

                case "editandoFutbolista":
                    $this->editandoFutbolista();
                    break;

                default:
                $this->listarEquipo();
                break;
            }
        }

        public function listarEquipo(){
            $equipo = $this->modelo->listarEquipo();
            include('listar.php');
        }
        
        public function insertarFutbolista(){
            include("agregar.php");
        }

        public function insertandoFutbolista(){
            // el id lo va a generar mongodb
            $nombre = $_POST["nombre"];
            $dorsal = $_POST["dorsal"];
            $edad = $_POST["edad"];

            $this->modelo->insertarFutbolista($nombre,$dorsal, $edad);
            $this->listarEquipo();
        }

        public function eliminarFutbolista(){
            $id = $_GET["id"]; // deberia acceder al id del url
            $this->modelo->eliminarFutbolista($id);
            $this->listarEquipo();
        }
        

        public function editarFutbolista(){
            $id = $_GET["id"];
            $futbolista = $this->modelo->pedirUnFutbolista($id);
            if (is_array($futbolista) || !null) {
                include("modificar.php");
            }else{
                echo "ERROR";
            }
        }
        public function editandoFutbolista(){
            $id = $_POST["_id"];
            $nombre = $_POST["nombre"];
            $dorsal = $_POST["dorsal"];
            $edad = $_POST["edad"];
            $this->modelo->editarFutbolista($id, $nombre, $dorsal, $edad);
            $this->listarEquipo();
        }
    

    }

    $controlador = new Controlador();
    $controlador->handler();