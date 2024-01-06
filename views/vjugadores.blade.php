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
        
        .boton{
            margin-bottom:10px;
        }
    </style></head>
<body>

    <div class="container">
        <h1>Listado de Jugadores</h1>
        
         <!--En caso de que no esté vacía la variable aviso, lo muestra por pantalla!-->
         @if (!empty($aviso))
        <div style="background-color:greenyellow; padding:10px; margin-bottom: 15px;">{{ $aviso }}</div>
         @endif
        
        <div class="boton">
            <a href="fcrear.php" class="btn">+ Nuevo Jugador</a>
        </div>
         
        <table>
            <tr>
                <th>Nombre Completo</th>
                <th>Posición</th>
                <th>Dorsal</th>
                <th>Código de Barras</th>
            </tr>
            @foreach ($jugadores as $j)
                <tr>
                    <td>{{ htmlspecialchars($j['nombre']) . ' ' . htmlspecialchars($j['apellidos']) }}</td>
                    <td>{{ htmlspecialchars($j['posicion']) }}</td>
                    <td>{{ $j['dorsal'] ? htmlspecialchars($j['dorsal']) : 'Sin Asignar' }}</td>
                    
                    <td>{!! $j['imagenCodigoBarras'] !!}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>