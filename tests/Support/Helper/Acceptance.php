<?php

declare(strict_types=1);

namespace Support\Helper;
use Dotenv\Dotenv;
use PDO;

class Acceptance extends \Codeception\Module
{
    // Método para obtener la instancia de PDO
    public static function getDbConnection()
    {
        // Cargamos el archivo .env
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../../');
        $dotenv->load();

            $host = $_ENV['DB_HOST'];
            $dbname = $_ENV['DB_NAME'];
            $username = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASSWORD'];
            
            // Configuración de la conexión
            $pdo = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}
