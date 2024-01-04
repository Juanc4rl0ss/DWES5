
<!-- Clase inicial de la Tarea 5, que consiste en un proyecto de jugadores de futbol

<?php

//Apuntamos a el autoload,para poder tener acceso tal y como está configurado, a las clases de la carpeta src
require_once __DIR__ . '/../vendor/autoload.php';


//Apuntamos a la conexión
use Tarea5\Conexion;


// Creamos una nueva conexión usando la clase Conexion
$conexion = new Conexion();

//Le damos a conectar,para que se genere la conexión con la base de datos, en éste caso, 'Conectar()' es un método de la clase recién instanciada
$pdo = $conexion->conectar();

// Comprobamos si hay jugadores en la base de datos
$sql = "SELECT COUNT(*) FROM jugadores";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Si la cuenta es 0, redirigir a instalacion.php
if ($stmt->fetchColumn() == 0) {
    header("Location: instalacion.php");
    exit;
} else {
    // Si hay datos, incluir o redirigir a jugadores.php
    header("Location: jugadores.php");
    exit;
}