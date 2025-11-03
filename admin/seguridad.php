<?php
// seguridad_admin.php
session_start();

// 1. Verificar si el usuario está logueado
if (!isset($_SESSION['nif'])) {
    // Si no está logueado, lo redirigimos a la página principal
    header("Location: ../index.php");
    exit();
}


// Si llega hasta aquí, es un administrador logueado.
?>