<?php   require_once('funciones.php');

$email = '';
$errores = [];

if ($_POST) {
  if(!existeMail($email)){
    $errores['email'] = 'Correo Invalido.';
  }else {
    header('location:restablecer.php');
  }

  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="estilo_login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restablecer Contraseña</title>
    <style media="screen">
      *{ margin:0; padding: 0; box-sizing: border-box}

      body{ font-family: 'Roboto', sans-serif; background-color: #4F89C4; font-size: 14px;}
        }
      .login{ background-color: white; width: 50%; height: 200px; padding: 40px; margin: 35px auto; border-radius:10px;}
      h2{font-size: 2em; padding:0.5%;}
      fieldset{border:none; text-align: center;}
      input{padding: 2%;; font-size: 0.7em; width:80%; margin-right: 5%;}
      .boton{background: #4F89C4; padding: 1%; border-radius: 5px; color:white;}
    </style>
  </head>
  <body>
<?php require_once('header.php') ?>
    <form class="login"  method="post">
      <label for=""><h2>Restablecer Contraseña</h2></label>
      <br>
      <label for="">
        <input type="email" placeholder="Ingrese su Correo Electronico" value="<?=$email?>">
      </label>
      <br>
      <br>
      <button  class="boton" type="submit" >Enviar</button>
      <br>
    </form>
      <?php require_once('footer.php') ?>
  </body>

</html>
