

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Instalación</title>
      <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #FFCCBC;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
            padding: 20px;
        }
        .btn {
            padding: 10px 20px;
            background-color: #4CAF50; /* Verde */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            text-decoration: none; /* Quitar subrayado de enlaces */
            display: inline-block;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <!-- Ésta página php tan solo tiene un div con un botón, el cual sirve para generar 50 datos para añadir a la base de datos, ya que si estamos aquí,significa que la base de datos estaba vacía de jugadores!-->
    <div class="container">
        <h1>Instalación</h1>
        
        <!-- Éste botón nos lleva a la página, que crea los datos de jugadores,de manera Random!-->
        <a href="crearDatos.php" class="btn">Instalar Datos de Ejemplo</a>
    </div>
</body>
</html>