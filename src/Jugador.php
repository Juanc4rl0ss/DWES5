<?php
namespace Tarea5;
use PDO;

//Aquí lo que hacemos,es heredar de la clase Conexión
class Jugador extends Conexion{
    
    //Creamos una variable privada para la conexión
    private $conexion;

    
    //Constructor de clase, con el this, generamos la conexión
    public function __construct() {
        $this->conexion = $this->conectar();
    }
    
    //Éste método sirve para insertar jugadores en la base de datos, le pasamos 5 parámetros
    public function insertarJugador($nombre, $apellidos, $posicion, $dorsal, $barcode) {
        //En caso de que el dorsal o el código de barras existan, no inserta nada
        if ($this->existeDorsal($dorsal) || $this->existeBarcode($barcode)) {
            return false;
        }

        //Ponemos la Query necesaria,para insertar en la Tabla jugadores, una fila más.Lo hacemos con una consulta preparada
        $sql = "INSERT INTO jugadores (nombre, apellidos, posicion, dorsal, barcode) VALUES (:nombre, :apellidos, :posicion, :dorsal, :barcode)";
        
        
        $stmt = $this->conexion->prepare($sql);

        // Ahora vinculamos los parámetros a los valores que ha obtenido el método por parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':posicion', $posicion);
        $stmt->bindParam(':dorsal', $dorsal);
        $stmt->bindParam(':barcode', $barcode);

        // Lo que devuelve éste método,es una ejecución de la Query
        return $stmt->execute();
    }

    //Método desde el cual,verificamos si existe o no el dorsal, recibe un parámetro
    public function existeDorsal($dorsal) {
        
        //Variable que recoge una query, la cual es un contador , donde en caso de que haya algún dorsal existente,aumentará
        $sql = "SELECT COUNT(*) FROM jugadores WHERE dorsal = :dorsal";
        
        //Preparamos la consulta
        $stmt = $this->conexion->prepare($sql);
        
        //Vinculamos el parámetro al del parámetro del método
        $stmt->bindParam(':dorsal', $dorsal);
        
        //Ejecutamos
        $stmt->execute();
        
        //En éste caso, si es mayor que cero devolverá un true,y si no un false 
        return $stmt->fetchColumn() > 0;
    }

    //Éste método verifica si existe el código de barras, es igual que el anterior método en sistematología, cambiando la variable que se pasa como parámetro
    public function existeBarcode($barcode) {
        $sql = "SELECT COUNT(*) FROM jugadores WHERE barcode = :barcode";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':barcode', $barcode);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    //Y por último, éste método obtiene un listado de todos los jugarores existentes, devuelve toda la colección de datos incluidos
    public function obtenerJugadores() {
        $sql = "SELECT * FROM jugadores";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}