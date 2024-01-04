<?php
namespace Tarea5;

use PDO;
use PDOException;

class Conexion {
    private $host = 'localhost'; 
    private $db   = 'practicaunidad5';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';

    public function conectar() {
        try {
            $conexion = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $opciones = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($conexion, $this->user, $this->pass, $opciones);
            return $pdo;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}