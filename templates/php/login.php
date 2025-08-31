<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION ['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","","k93");



$consulta="SELECT*FROM usuarios where usuario= '$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_roles']==1){
header("location:../index.html");    
}

if($filas['id_roles']==2){
header("location:../index.html");    
}

else{
  echo"Error de usuario o contraseña intentalo de nuevo";
}

mysqli_free_result($resultado);
mysqli_close($conexion);

?>