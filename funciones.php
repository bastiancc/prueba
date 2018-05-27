<?php
session_start();

if (isset($_COOKIES['id'])) {
  $usuario = existeMail($_COOKIES['id']);
  loguearUsuario($usuario);
}

function traerTodos(){
  $usuariosJSON = file_get_contents('datos.json');
  $arrayJSON = explode(PHP_EOL, $usuariosJSON);
  array_pop($arrayJSON);
  $usuariosPHP = [];
  foreach ($arrayJSON as $usuarioJSON) {
    $usuariosPHP[] = json_decode($usuarioJSON, true);
  }
  return $usuariosPHP;
}


function validar($data){
  $nombre = trim($data['nombre']);
  $dia= trim($data['dia']);
  $mes= trim($data['mes']);
  $anio= trim($data['anio']);
  $email= trim($data['email']);
  $pass= trim($data['pass']);
  $pass2= trim($data['pass2']);
  $pais= trim($data['pais']);
  $provincia= trim($data['provincia']);
  $ciudad= trim($data['ciudad']);
  $direccion= trim($data['direccion']);
  $altura= trim($data['altura']);
  $piso= trim($data['piso']);
  $dpto= trim($data['dpto']);
  $cp= trim($data['cp']);
  $obsv= trim($data['obsv']);
  $errores=[];

  if ($nombre == '') {
    $errores['nombre'] = 'Complete el campo de su nombre';
  }
  if ($email == '') {
    $errores['email'] = 'Complete el campo de su correo electrónico';
  }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = 'Completá el campo de su cooreo electrónico con un formato valido';
  }
  if ($pass == '') {
    $errores['pass'] = 'Complete el campo de su contraseña';
  }
  if ($pass2 == '') {
    $errores['pass2'] = 'Complete el campo de su contraseña repetida';
  }
  // if ($pais == '') {
  //   $errores['pais'] = 'Complete el campo de su país';
  // }
  // if ($provincia == '') {
  //   $errores['provincia'] = 'Complete el campo de su provincia';
  // }
  // if ($ciudad == '') {
  //   $errores['ciudad'] = 'Complete el campo de su ciudad';
  // }
  // if ($direccion == '') {
  //   $errores['direccion'] = 'Complete el campo de su direccion';
  // }
  // if ($altura == '') {
  //   $errores['altura'] = 'Complete el campo de su altura';
  // }
  // if ($piso == '') {
  //   $errores['piso'] = 'Complete el campo de su piso';
  // }
  // if ($dpto == '') {
  //   $errores['dpto'] = 'Complete el campo de su departamento';
  // }
  // if ($cp == '') {
  //   $errores['cp'] = 'Complete el campo de su código postal';
  // }
  // if ($obsv == '') {
  //   $errores['obsv'] = 'Complete el campo de observaciones';
  // }

  return $errores;

}

function estaLogeado(){
  return isset($_SESSION['id']);
}

function crearYGuardarUsuario($data){
  $nombre = trim($data['nombre']);
  $dia= trim($data['dia']);
  $mes= trim($data['mes']);
  $anio= trim($data['anio']);
  $email= trim($data['email']);
  $pass= trim($data['pass']);


  $usuarioPHP = [
    'nombre' => $nombre,
    'email' => $email,
    'nacimiento' => $dia."-".$mes."-".$anio,
    'pass' => password_hash($pass, PASSWORD_DEFAULT),
  ];

  $usuarioJSON = json_encode($usuarioPHP);

  file_put_contents('datos.json', $usuarioJSON . PHP_EOL, FILE_APPEND);

}


  function existeMail($mail){
    $usuarios = traerTodos();
    foreach ($usuarios as $usuario) {
      if ($mail == $usuario['email']) {
        return $usuario['email'];
      }
    }
    return false;
  }

  function traerNombrePorId($unId) {
    $nombre = traerTodos();
    foreach ($nombre as $idnombre) {
      if ($unId == $idnombre['nombre']) {
        return true;
      }
    }
    return false;
  }

  function validarLoginUsuario($data){


  $email = trim($data['email']);
  $pass = trim($data['pass']);
  $errores = [];


  if ($email == '' || $pass == '') {
        $errores['email'] = 'Por favor, complete los campos';
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'Complete su email con un formato válido';
    }elseif (!existeMail($email)) {
      $errores['email'] = 'Credenciales invalidas';
    }

    return $errores;
  }
  function loguearUsuario($usuario){
    $_SESSION['id'] = $usuario['email'];
  }
