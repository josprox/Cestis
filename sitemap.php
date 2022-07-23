<?php

    header("Content-Type: text/xml");

    require __DIR__ . './vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, './.env');
    $dotenv->load();

    $dominio = $_ENV['DOMINIO'];
    //Cambio de configuración horaria
    date_default_timezone_set($_ENV['ZONA_HORARIA']);
    $fecha = date("Y-m-d");

    echo "<?xml version='1.0' encoding='utf-8' ?>" .
    "<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>";

    echo "<url>
        <loc>https://".$dominio."</loc>
        <changefreq>daily</changefreq>
        <priority>"."1.0"."</priority>
        <lastmod>".$fecha."</lastmod>
    </url>";

    echo "<url>
        <loc>https://".$dominio."/maestros</loc>
        <changefreq>daily</changefreq>
        <priority>"."0.9"."</priority>
    </url>";

    echo "<url>
        <loc>https://".$dominio."/registros</loc>
        <changefreq>weekly</changefreq>
        <priority>"."0.8"."</priority>
    </url>";

    echo "<url>
        <loc>https://".$dominio."/reset</loc>
        <changefreq>weekly</changefreq>
        <priority>"."0.8"."</priority>
    </url>";

    echo "<url>
        <loc>https://".$dominio."/social/</loc>
        <changefreq>monthly</changefreq>
        <priority>"."0.6"."</priority>
    </url>";

    echo "</urlset>";

?>