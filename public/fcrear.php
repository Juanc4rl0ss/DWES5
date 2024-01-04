<?php
// Asegúrate de iniciar la sesión para acceder a los datos de la sesión
session_start();

require_once __DIR__ . '/../vendor/autoload.php';
use Philo\Blade\Blade;
$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

// Pasar datos de la sesión a la vista Blade
echo $blade->view()->make('vcrear', ['formData' => $_SESSION['formData'] ?? []])->render();