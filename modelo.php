<?php
    class Modelo{
        private $clienteMongoDB; // referido al cliente MONGODB
        private $bd;    // referido a EQUIPO

        public function __construct(){
            require "vendor/autoload.php";
            try{
                $this->clienteMongoDB = new MongoDB\Client("mongodb://localhost:27017");
                $this->bd = $this->clienteMongoDB->equipo;  // se crea cuando se añada
            } catch (Exception $e){
                print($e);
            }
        }
        ///// METODOS   ////////
        public function listarEquipo(){
            // devuelve todos los jugadores del equipo
            echo "<h2>Todos los futbolistas del equipo: </h2><br>";
            $equipo = $this->bd->MadridFC->find();  // Madrid es el nombre de la tabla
            return $equipo;
        }

        public function insertarFutbolista($nombre, $dorsal, $edad){
            $res = $this->bd->MadridFC->insertOne( [  "nombre" => $nombre, "dorsal" => $dorsal, "edad" => $edad ] );
            return $res->getinsertedId();   // retorno el ID creado por defecto , o si retorno $res, es un Array lo que retorno 
        }

        public function eliminarFutbolista($id) {
            // Elimino un futbolista de la coleccion
            $usuarioEliminado = $this->bd->MadridFC->deleteOne( [ "_id" => new MongoDB\BSON\ObjectId($id)] );  // asi es como se emte el _id
            return $usuarioEliminado;       
        }

        public function pedirUnFutbolista($id) {
            $buscar = $this->bd->MadridFC->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
            return $buscar; // lo guardo aqui todo
        }

        public function editarFutbolista($id, $nombre, $dorsal, $edad) {
            try {
                $this->bd->MadridFC->updateOne(
                    [ '_id' => new MongoDB\BSON\ObjectId($id) ],
                    [ '$set'   => [ 'nombre' => $nombre, 'dorsal' => $dorsal, 'edad' => $edad ] ]
                );    
            }catch (Exception $e) {
                print($e);
            }
        }


    }