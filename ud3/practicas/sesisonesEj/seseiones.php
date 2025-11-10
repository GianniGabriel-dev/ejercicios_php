<?php
session_start(); // arrancamos las variables de sesión
$_SESSION["ies"] = "IES Torrevigía"; // asignamos valor a la sesión ies
$instituto = $_SESSION["ies"]; // guardar valor de sesión en variable
echo "Estamos en el $instituto ";
?>