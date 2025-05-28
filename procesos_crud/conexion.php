<?php
$servidor = "localhost";
$usuario = "root";
$contra = "";
$base_Datos="fs2025_telefonica";
$conexion = mysqli_connect($servidor, $usuario, $contra, $base_Datos);
if($conexion)
{
  echo "conexion con exito";
}else{
    echo "problemas de conexion";
}  
?>













