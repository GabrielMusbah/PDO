<?php

namespace Alura\Pdo\Infrastructure\Persistence;

use PDO;

class ConnectionCreator
{
    public static function createConnection(): PDO
    {
        $databasePath = __DIR__ . '/../../../banco.sqlite';

        $connection =  new PDO('sqlite:' . $databasePath);

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//seta se ocorrer algum erro com a conecca / crud no banco de dados

        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);//ja seta como defaul o modo fetch_assoc (associativo)

        return $connection;
    }
}
