<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <style>
        body{
            background-color: #FFCCBC;
            font-size: 18px;
            text-align: center;
        }
    </style>
    <body>

        <?php
        session_start();

        require_once __DIR__ . '/../vendor/autoload.php';
        use Tarea5\Jugador;

        $mensajeJugador = '';
        // Si pulsamos el botón crear, entramos en este condicional
        if (isset($_POST['crear'])) { 
            // Asignamos a variables los valores del nombre y el apellido
            $nombre = $_POST['nombre'] ?? '';
            $apellidos = $_POST['apellidos'] ?? '';

            // En caso de que alguno de ellos esté vacío, lo anotamos en la variable '$mensaje'
            if (empty($nombre) || empty($apellidos)) {
                $mensajeJugador = "Error: El nombre y los apellidos son obligatorios.";
                $_SESSION['jugadorCreado'] = $mensajeJugador;
                header("Location: fcrear.php"); // Redirecciona a la página de creación de jugador
                exit;
            } else {
                $posicion = $_POST['posicion'] ?? '';
                $dorsal = $_POST['dorsal'] ?? '';
                $barcode = $_POST['barcode'] ?? '';

                $jugador = new Jugador();

                // Si el dorsal ya existe, almacena otro mensaje de aviso
                if ($jugador->existeDorsal($dorsal)) {
                    $mensajeJugador = "Error: El dorsal ya está en uso.";
                    $_SESSION['jugadorCreado'] = $mensajeJugador;
                    header("Location: fcrear.php"); // Redirecciona a la página de creación de jugador
                    exit;
                } else if($jugador->existeBarcode($barcode)){
                    $mensajeJugador = "Error: El código de barras ya existe";
                    $_SESSION['jugadorCreado'] = $mensajeJugador;
                    header("Location: fcrear.php"); // Redirecciona a la página de creación de jugador
                    exit;
                       
                }
                else{
                    $exito = $jugador->insertarJugador($nombre, $apellidos, $posicion, $dorsal, $barcode);
                }

                    if ($exito) {
                        $mensajeJugador = "Jugador agregado con éxito.";
                        $_SESSION['jugadorCreado'] = $mensajeJugador;
                        header("Location: jugadores.php"); // Redirecciona a la página de jugadores
                        exit;
                    } else {
                        $mensajeJugador = "Error al agregar jugador.";
                        $_SESSION['jugadorCreado'] = $mensajeJugador;
                        header("Location: fcrear.php"); // Redirecciona a la página de creación de jugador
                        exit;
                    }
                }
            
        } else {
            $mensaje = "Error: Método de solicitud no válido.";
            $_SESSION['jugadorCreado'] = $mensajeJugador;
            header("Location: fcrear.php"); // Redirecciona a la página de creación de jugador
            exit;
        }
        ?>
        
    </body>
</html>
        
      