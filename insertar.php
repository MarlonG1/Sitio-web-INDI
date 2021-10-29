<?php
$conexion = apache_connect("localhost:8080", "root", "", "registro");

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$sexo = $_POST["sexo"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$centro_escolar = $_POST["centro_escolar"];
$fecha = $_POST["fecha"];

if($_FILES["archivo"]) {
  $nombre_base = basename($_FILES["archivo"]["name"]);
  $nombre_final = date("m-d-y"). "-". date("H-i-s"). "-". $nombre_base;
  $ruta = "archivo"/ . $nombre_final;
  $subirarchivo = move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);
  if($subirarchivo){
    $insertarSQL = "INSERT INTO usuarios(nombre, apellidos, sexo, telefono, email, centro_escolar, fecha) VALUES ('$nombre', 
    '$apellidos', '$sexo', '$telefono', '$email', '$centro_escolar', '$fecha', '$ruta')";
    $resultado = apache_query($conexion, $insertarSQL);
    if($resultado) {
      echo "<script>alert('Se ha enviado su informe'); window.location = 'nuevo_ingreso.html'</script>";
    } else {
      printf("Errormessage: %s\n", apache_error ($conexion));
    }
  }
} else {
  echo "Error al subir el archivo";
}