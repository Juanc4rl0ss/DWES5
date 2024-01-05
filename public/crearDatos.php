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
    <h1>Lista de jugadores generados de manera aleatoria</h1>
    <body>
       <?php
       
       // Iniciar la sesión
        session_start();
       
        // Incluimos el ajutoloader
        require_once __DIR__ . '/../vendor/autoload.php';

        //Aquí vamos a usar la dependencia con la cual crearemos los valores aleatorios
        use Faker\Factory;

        // Inicializamos Faker
        $faker = Factory::create();

        //Para poder instanciar la clase Jugador, la incorporamos al archivo , ya que nos encontramos en la carpeta public,y Jugador está en la carpeta 'src'
        use Tarea5\Jugador;

        // Creamos una instancia de la clase Jugador
        $j = new Jugador();
        
        $jugadoresCreados= 0;

        // Creamos un bucle con 50 jugadores
        for ($i = 0; $i < 10; $i++) {

            //Ahora, vamos asignando a las diferentes variables, su información ficticia
            $nombre = $faker->firstName;
            $apellidos = $faker->lastName;
            $posicion = $faker->randomElement(['Delantero', 'Centrocampista', 'Defensa', 'Portero']);
            $dorsal = $faker->unique()->numberBetween(1, 99);
            $barcode = $faker->unique()->ean13;

            // Llamamos al método para crear el jugador, al cual le pasamos los parámetros generados
            $exito = $j->insertarJugador($nombre, $apellidos, $posicion, $dorsal, $barcode);

            //En caso de que se haya creado el jugador satisfactoriamente, lo mostramos por pantalla con un mensaje
            if ($exito) {
                echo "Jugador {$nombre} {$apellidos} agregado con éxito.<br>";
                $jugadoresCreados++;

            // Si no se ha creado, lo avisará
            } else {
                echo "Error al agregar a {$nombre} {$apellidos}.<br>";
            }
        }
       // Establecer una variable de sesión con el mensaje
        if ($jugadoresCreados > 0) {
            $_SESSION['mensaje'] = "Se agregaron $jugadoresCreados  jugadores con éxito.";
            header("Location: jugadores.php");
            exit;
        } else {
            $_SESSION['mensaje'] = "Error al agregar jugadores.";
            header("Location: instalacion.php");
            exit;
    }

        ?>
        <h3>Datos de prueba creados</h3>
        <a href=index.php>volver</a>
    </body>
</html>


