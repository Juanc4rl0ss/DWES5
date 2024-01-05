<?php
//Iniciamos la sesión
session_start();

require_once __DIR__ . '/../vendor/autoload.php';
use Philo\Blade\Blade;
$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

$aviso= '';
if (isset($_SESSION['jugadorCreado'])) {
    $aviso = $_SESSION['jugadorCreado'];
    unset($_SESSION['jugadorCreado']);
}


// Pasar datos de la sesión a la vista Blade
echo $blade->view()->make('vcrear', ['formData' => $_SESSION['formData'] ?? [], 'aviso' => $aviso])->render();
