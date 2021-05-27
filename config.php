<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "pop3";

    $con = new mysqli($host,$user,$pass,$db);

    $config['nombre_sitio'] = "Medel, Inc";
    $config['titulo_sitio'] = "Donar para POP 3";

    $config['simbolo_moneda'] = "€";
    $config['moneda'] = "EUR";

    $config['cantidadMinima'] = 0;

    $config['paypal_clientID'] = "";
    $config['paypal_clientSecret'] = "";

    if($con->connect_errno) {
        die("El servidor no ha podido conectar con la base de datos.");
    }
?>