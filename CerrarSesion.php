<?php
include("BaseDeDatos.php");
    function agregarBitacora(){
                $baseDatos = new BaseDeDatos();
                $usuario = $_SESSION['usuario'];
                $descripcion = 'Sesión cerrada';
                $query = "INSERT INTO `bitacora` (`clv_usuario`, `descripcion`) VALUES ('".$usuario."','".$descripcion."');";
                $baseDatos->EjecutarQuery($query); 
    }
    
    session_start();
    $_SESSION['inicio'] = false;
    $_SESSION['tipo_usuario'] = "nadie";
    agregarBitacora();
    header('Location: Inicio.php');
?>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

