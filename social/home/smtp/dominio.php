<?php

// Load .env
require __DIR__ . './../../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, './../../../.env');
$dotenv->load();

$dominio = $_ENV['DOMINIO'];

?>