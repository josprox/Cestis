<?php

// Código generado por Jossito Security

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../.env');
$dotenv->load();

//Valores de la conexión
    $usuario = $_ENV['Usuario'];
    $contra = $_ENV['Contra'];
    $database = $_ENV['BaseDeDatos'];
    $host = $_ENV['host'];

?>