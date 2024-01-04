<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

function generateBarcode() {
    // Generar un número aleatorio de 12 dígitos
    $randomNumber = mt_rand(100000000000, 999999999999);
    
    
    return (string)$randomNumber;
}

// Generar y guardar el código de barras en la sesión
$codigoBarras = generateBarcode();
$_SESSION['formData']['barcode'] = $codigoBarras;

// Redirigir al usuario a la página del formulario
header("Location: fcrear.php");
exit;
?>