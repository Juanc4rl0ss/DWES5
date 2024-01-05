<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';
use Philo\Blade\Blade;
use Tarea5\Conexion;
use Tarea5\Jugador;

// Configuración de Blade
$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

// Obtener el mensaje de aviso de la sesión
$aviso = '';
if (isset($_SESSION['jugadorCreado'])) {
    $aviso = $_SESSION['jugadorCreado'];
    unset($_SESSION['jugadorCreado']); // Limpiar la variable de sesión
}else if(isset($_SESSION['mensaje'])){
    $aviso = $_SESSION['mensaje'];
    unset($_SESSION['mensaje']);
}

// Obtener la lista de jugadores
$conexion = new Conexion();
$pdo = $conexion->conectar();
$jugador = new Jugador();
$jugadores = $jugador->obtenerJugadores();

// Pasar tanto $jugadores como $aviso a la vista Blade
echo $blade->view()->make('vjugadores', ['aviso' => $aviso, 'jugadores' => $jugadores])->render();

