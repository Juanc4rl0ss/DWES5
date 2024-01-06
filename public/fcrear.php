<?php
//Iniciamos la sesión
session_start();

require_once __DIR__ . '/../vendor/autoload.php';
use Milon\Barcode\DNS1D;

use Philo\Blade\Blade;
$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

$aviso= '';
//En caso de que haya contenido en la sesión que se pasa al condifional, le pasamos el valor a la variable 'aviso'
if (isset($_SESSION['jugadorCreado'])) {
    $aviso = $_SESSION['jugadorCreado'];
    unset($_SESSION['jugadorCreado']);
}

// Pasamos datos de la sesión a la vista Blade
echo $blade->view()->make('vcrear', ['formData' => $_SESSION['formData'] ?? [], 'aviso' => $aviso])->render();
