<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Tarea5\Conexion;
use Tarea5\Jugador;
$conexion = new Conexion();
$pdo = $conexion->conectar();
$jugador = new Jugador();

//Éste método nos devuelve todos los jugadores que hay en la base de datos
$jugadores = $jugador->obtenerJugadores();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Jugadores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #FFCCBC;
        }
        .container {
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #FFAB91;
        }
        .btn {
            padding: 10px 20px;
            background-color: #FF5722;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Listado de Jugadores</h1>
        <a href="fcrear.php" class="btn">+ Nuevo Jugador</a>
        <table>
            <tr>
                <th>Nombre Completo</th>
                <th>Posición</th>
                <th>Dorsal</th>
                <th>Código de Barras</th>
            </tr>
            <!-- Éste for each se ejecutará mientras siga habiendo jugadores , con lo cual rellenará favorablemtente toda la tabla!-->
            <?php foreach ($jugadores as $j): ?>
            <tr>
                <td><?= htmlspecialchars($j['nombre']) . ' ' . htmlspecialchars($j['apellidos']) ?></td>
                <td><?= htmlspecialchars($j['posicion']) ?></td>
                <td><?= $j['dorsal'] ? htmlspecialchars($j['dorsal']) : 'Sin Asignar' ?></td>
          <td>
              <?php echo htmlspecialchars($j['barcode']); ?>
          </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>