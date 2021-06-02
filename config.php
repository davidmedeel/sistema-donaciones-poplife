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

    $config['paypal_clientID'] = "AasfBtvX13_3yLAbzKcVYkQeyzD2rGwmAeFQiHAx6Idn_ltg6dEPR9B4iw3Os3I4I3dXu7mM8cZAk1bv";
    $config['paypal_clientSecret'] = "EFunEZYG2HmiOx4Pk0EXfmJl8eNRTMc8cGQysovud7G0pq03EWVPLIdIHHYxfVigB1rw_m6rJfMNzsQW";
    $config['paypal_mode'] = "sandbox"; // "live" para pagos reales o "sandbox" para pagos de prueba.

    if($con->connect_errno) {
        die("El servidor no ha podido conectar con la base de datos.");
    }
?>
