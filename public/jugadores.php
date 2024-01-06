<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';
use Philo\Blade\Blade;
use Tarea5\Conexion;
use Tarea5\Jugador;

//Añadimos ésta libreria,para poder crear imágenes html, para el código de barras, con la que pedía la tarea no lo he logrado
use Picqer\Barcode\BarcodeGeneratorHTML;

//Confiuramos la librería Blade
$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

// Inicializamos con una variable vacía '$aviso'
$aviso = '';

// En caso de que llegue algún valor en la sesión de 'jugadorCreado', se lo asignamos a la variable '$aviso'
if (isset($_SESSION['jugadorCreado'])) {
    $aviso = $_SESSION['jugadorCreado'];
    unset($_SESSION['jugadorCreado']);
} elseif (isset($_SESSION['mensaje'])) {
    $aviso = $_SESSION['mensaje'];
    unset($_SESSION['mensaje']);
}

// Ahora vamos a obtener la lista de los jugadores para pasar después a la vista
$conexion = new Conexion();
$pdo = $conexion->conectar();
$jugador = new Jugador();
$jugadores = $jugador->obtenerJugadores();

// Instanciamos el generador de imágenes de códigos de barras para cada jugador
$generator = new BarcodeGeneratorHTML();
//Este for each recorre todos los jugadores existentes
foreach ($jugadores as $j => $jugador) {
        //Empleamos un método de Barcode,para pasar el valor númerico del código de barras, y una imagen html
        $jugadores[$j]['imagenCodigoBarras'] = $generator->getBarcode($jugador['barcode'], $generator::TYPE_EAN_13);   
}

// Ahora pasamos las variables '$aviso' y 'jugadores' a la vista de blade, para gestionar avisos y mostrar correctamente la imagen del código de barras
echo $blade->view()->make('vjugadores', ['aviso' => $aviso, 'jugadores' => $jugadores])->render();
?>