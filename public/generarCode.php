<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use Milon\Barcode\DNS1D;

//Librería necesaria para la creación del número de código de barras
use Faker\Factory;


function generarBarcode() {
    
    // Inicializamos Faker
    $faker = Factory::create();
    
    // Creamos el valor del código de barras
    $barcode = $faker->unique()->ean13;
    
    return $barcode;
   
}

//Pasamos el número del código de barras a una variable
$codigoBarras = generarBarcode();

//Pasamos el valor a la sesión
$_SESSION['formData']['barcode'] = $codigoBarras;

// Redirigimos al usuario a la página de crear usuario
header("Location: fcrear.php");
exit;