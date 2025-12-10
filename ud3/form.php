<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_GET["error"]) && $_GET["error"]){
            if($_GET["error"]==1){
                echo "<h1>Error en el campo email</h1>";
            }else if($_GET["error"]==2){
                echo "<h1>Error en el campo contraseña</h1>";
            }else if($_GET["error"]==3){
                echo "<h1>Error en el asignatura</h1>";
            }
        }
    ?>
    <form action="result.php" method="post">
        <label for="email">Email</label>
        <input type="email" required name="email">

        <label for="contraseña">Contraseña</label>
        <input type="password" required name="contraseña">

        <label for="asignature">Asignatura</label>
        <select required name="asignature" id="asignature">
            <option selected value="0">Selecciona la asignatura favorita</option>
            <option  value="1">Mates</option>
            <option  value="2">Inglés</option>
            <option  value="3">Lengua</option>
        </select>
        <button type="submit">Submit</button>
    </form>
</body>
</html>