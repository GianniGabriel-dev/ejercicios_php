<?php
//se elimina la cookie
setcookie("nombre_usuario", "", time()-600);
header("Location:ej7_index.php")
?>