<?php
    /*
    Copyright (c) 2021 David Medel (davidmedel.es)
    */

    session_start();

    include_once 'config.php';

    if (isset($_GET['donado'])) {
        include_once 'assets/html/donado.php';
        exit;
    }

    if (isset($_POST['donar'])) {
        $cantidad = $_POST['cantidad'];
        $uid = $_POST['uid'];

        $checkUID = $con->query("SELECT playerid FROM players WHERE playerid = '$uid'");

        if($checkUID->num_rows == 0) {
            $alerta = "<br><p style='background: #e80e0e; color: #fff'>No existe ningún usuario con esa Steam ID</p>";
        } else {
            if ($cantidad < $config['cantidadMinima']) {
                $alerta = "<br><p style='background: #e80e0e; color: #fff'>La cantidad mínima para donar son: <b>" . $config['cantidadMinima'] . $config['simbolo_moneda'] . "</b></p>";
            } else {
                $_SESSION['donando'] = true;
                $_SESSION['cantidad'] = $cantidad;
                $_SESSION['uid'] = $uid;
                $_SESSION['email'] = $email;

                header("Location: paypal-sdk/paypal/rest-api-sdk-php/sample/payments/AuthorizePaymentUsingPayPal.php");
            }
        }
    }
?>

<html lang='es'>
<head>
    <meta charset='utf-8'>
    <title>Donar • <?php echo $config['nombre_sitio'] ?></title>
    <meta name='author' content='David Medel'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://medel.es/assets/css/icons.css">
</head>

<body>
	<section class='content'>
    <form action='' method='post' enctype='multipart/form-data'>
		<header class='wrap wrap--guttered maxwidth maxwidth--m align--center'>
            <h2 style="text-shadow: 0px 0px 3px #ffffff, 0 0 5px #2E64FE;" class='margin--none'><?php echo $config['titulo_sitio'] ?></h2>
            <?php if(isset($alerta)) {
                echo $alerta;
            } ?>
		</header>
		<div class='wrap wrap--guttered maxwidth maxwidth--xl'>
            <center>
                <h3>Steam ID</h3>
                <input style='background: #1B283B; border-color: #fff; color: #fff;' type='number' name='uid' placeholder="76561198844937661" maxlength='17' required><br>
                <h3>Cantidad</h3>
                <p>Cantidad mínima: <b><?php echo $config['cantidadMinima'] . $config['simbolo_moneda'] ?></b></p>
                <input style='background: #1B283B; border-color: #fff; color: #fff' type='number' name='cantidad' placeholder="Cantidad" required>
            </center>
		</div>
        <br>
        <center>
            <button style='text-decoration: none; padding: 10px; font-weight: 600; font-size: 20px; color: #ffffff; background-color: #1a73e8; border-radius: 6px; border: 2px solid #1a73e8;' type='submit' name='donar'><i class="fa fa-paypal"></i> Donar</button>
        </center>
    </form>
    <center><img src="assets/img/frommedel.png" alt="FROM MEDEL" width="500" height="600"></center>
        <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
	</section>
</body>
</html>
