<?php

include "./ps-conexion/base_db.php";

try {
    $pdo = new PDO('mysql:host='.$host.';dbname='.$database.'', $usuario, $contra);
    //echo "conectado";
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>