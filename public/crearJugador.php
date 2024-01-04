<?php


// Incluir el autoloader de Composer y tus clases
require_once __DIR__ . '/../vendor/autoload.php';

use Tarea5\Jugador;

// Verificar si el formulario ha sido enviado
if(isset($_POST['crear'])){ 
    // Obtener datos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $posicion = $_POST['posicion'] ?? '';
    $dorsal = $_POST['dorsal'] ?? '';
    $barcode = $_POST['barcode'] ?? '';

    // Validaciones básicas
    if (empty($nombre) || empty($apellidos)) {
        echo "Error: El nombre y los apellidos son obligatorios.";
        exit;
    }

    // Crear una instancia de tu clase Jugador
    $jugador = new Jugador();

    // Comprobar si el dorsal ya existe
    if ($jugador->existeDorsal($dorsal)) {
        echo "Error: El dorsal ya está en uso.";
        exit;
    }

    // Intentar insertar el jugador
    $exito = $jugador->insertarJugador($nombre, $apellidos, $posicion, $dorsal, $barcode);

    if ($exito) {
        echo "Jugador agregado con éxito.";
    } else {
        echo "Error al agregar jugador.";
    }
} else {
    echo "Error: Método de solicitud no válido.";
}
echo "<br><a href='fcrear.php'>Volver</a>";