<?php

//Asignamos a una variable,el valor recogido del codigo de barras de la sesión, como ésta plantilla pertenece a una sesión que ya ha sido iniciada, no hace falta ponerlo aquí
$codigoBarras = $_SESSION['formData']['barcode'] ?? '';


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Jugador</title>
    <style>
        body {
            background-color: #FFCCBC;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #FFAB91;
            padding: 20px;
            border-radius: 10px;
        }
        input, select, button {
            margin: 10px 0;
        }
    </style>
</head>
<body>
        @if (!empty($aviso))
        <div style="background-color:red; padding:10px; margin-bottom: 15px;">{{ $aviso }}</div>
         @endif
    <div class="container">
        <h1>Crear Jugador</h1>
        <form action="crearJugador.php"; method="post">
            <div>
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" >
            </div>
            <div>
                <label for="apellidos">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" >
            </div>
            <div>
                <label for="dorsal">Dorsal</label>
                <input type="number" id="dorsal" name="dorsal" required>
            </div>
            <div>
                <label for="posicion">Posición</label>
                <select id="posicion" name="posicion">
                    <option value="Portero">Portero</option>
                    <option value="Defensa">Defensa</option>
                    <option value="Centrocampista">Centrocampista</option>
                    <option value="Delantero">Delantero</option>
                </select>
            </div>
            <div>
                <label for="barcode">Código de Barras</label>
                <!-- Asignamos en el value,el valor del código de barradas generado!-->
                <input type="text" id="barcode" name="barcode" value="<?php echo htmlspecialchars($codigoBarras); ?>" readonly>
            </div>
            <div class="buttons">
                <button type="submit" name="crear">Crear</button>
                <button type="reset">Limpiar</button>
                <button type="button" onclick="location.href='index.php'">Volver</button>
                <a href="generarCode.php" target="_blank"><button type="button">Generar Barcode</button></a>

            </div>
        </form>
    </div>

</body>
</html>