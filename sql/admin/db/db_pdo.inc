<?php
 $host = "localhost"; //Dirección del servidor
 $nombreBD = "videojuegos"; //Nombre de la BD
 $usuario = "root"; //usuario con acceso a la BD
 $password = ""; //Contraseña del usuario
 $dsn = "mysql:host=$host;dbname=$nombreBD";

 try { // Crear conexión
 $pdo = new PDO($dsn, $usuario, $password);
 // La conexión fue exitosa

 } catch (\PDOException $e) {
 // La conexión falló
 throw new \PDOException($e->getMessage(), (int)$e->getCode());
 }
?>
