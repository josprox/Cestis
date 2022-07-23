<?php

    require __DIR__ . './vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, './.env');
    $dotenv->load();

    $dominio = $_ENV['DOMINIO'];
    //Cambio de configuración horaria
    date_default_timezone_set($_ENV['ZONA_HORARIA']);
    $fecha = date("Y-m-d H:i:s");

    use SitemapPHP\Sitemap;

    if (unlink('./installer.php')) {
      // file was successfully deleted
    }

    $sitemap = new Sitemap("https://".$dominio."");

    $sitemap->addItem("/", "1.0", "daily", $fecha);
    $sitemap->addItem("/maestros", "0.9", "daily", $fecha);
    $sitemap->addItem("/registros", "0.6", "monthly", $fecha);
    $sitemap->addItem("/reset", "0.6", "monthly", $fecha);
    $sitemap->addItem("/social/", "0.5", "yearly", $fecha);

    $sitemap->createSitemapIndex("https://".$dominio."/", "Today");

    header("location: ./");

?>