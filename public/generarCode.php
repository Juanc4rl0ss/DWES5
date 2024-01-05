<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use Milon\Barcode\DNS1D;

function generarBarcode() {
    // Creamos con un random, hasta 12 numeros
    $numeroRandom = mt_rand(100000000000, 999999999999);

    // Falta un numero más, que lo calculamos con el metodo de abajo, pasandole el valor ya creado
    return $numeroRandom . calculoUltimoDigito($numeroRandom);
}

//Éste método calcula el dígito 13 que necesitamos
function calculoUltimoDigito($number) {
    $sum = 0;
    
    //Lo convertimos en una cadena
    $number = (string)$number;

    // Sumamos los digitios en posiciones impares
    for ($i = 0; $i < 12; $i += 2) {
        $sum += $number[$i];
    }

    //  Sumamos los digitios en posiciones pares
    for ($i = 1; $i < 12; $i += 2) {
        $sum += 3 * $number[$i];
    }

    // calculamos el digito de verificacion
    $digigoVerificacion = (10 - ($sum % 10)) % 10;

    return $digigoVerificacion;
}

//Generamos el numero del codigo de barras
$codigoBarras = generarBarcode();

//Pasamos el valor a la sesión
$_SESSION['formData']['barcode'] = $codigoBarras;

// Redirigimos al usuario a la página de crear usuario
header("Location: fcrear.php");
exit;