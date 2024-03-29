<?php
//En éste caso, vamos a emplear el creador de plantillas Blade, por lo que lo asignamos a la clase
use Philo\Blade\Blade;

//Cargamos el autoload
require_once __DIR__ . '/../vendor/autoload.php';

//Creamos variables,para las carpetas 'views' y 'cache'
$views = '../views';
$cache = '../cache';

//Instanciamos la clase Blase, y le pasamos al constructor dos variables, las de las dos carpetas recién definidas
$blade = new Blade($views, $cache);

//Ahora, con un 'echo', lo que hacemos es redirigirnos a la plantilla de la carpeta 'view' instalacion.blade.php
echo $blade->view()->make('instalacion')->render();