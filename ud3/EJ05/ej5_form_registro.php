<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</head>

<body class="container p-4">
    <?php
        $fields=["name" ,"surname" ,"email" , "password" ,"gender" ,"address" ,"postalCode" ,"poblacion" , "provincia" ];
        //si se encuentra errores en la url, muestra mensajes de los errores específicamente
        if(isset($_GET["error"]) && $_GET["error"]){
            $errorCode = $fields[$_GET["error"]];
            echo("❌ Error en el campo $errorCode");
        }
    
    ?>
    <form class="d-flex flex-column g-1" name="register" method="post" action="result_form_registro.php">
        <div class="form-group mt-3 mb-3 ">
            <small class="form-text text-muted">Nombre</small>
            <input type="text" required class="form-control" name="name" id="name" placeholder="Nombre">
        </div>

        <div class="form-group mt-3 mb-3 ">
            <small class="form-text text-muted">Apellido</small>
            <input type="text" required class="form-control" name="surname" id="surname" placeholder="Apellido">

        </div>

        <div class="form-group mt-3 mb-3 ">
            <small class="form-text text-muted">Email</small>
            <input type="email" required class="form-control" name="email" id="email" placeholder="Email">
        </div>

        <div class="form-group mt-3 mb-3 ">
            <small class="form-text text-muted">Password</small>
            <input type="password" required class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <small class="form-text text-muted">Género</small>
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="gender" value="Male" id="gender1" autocomplete="off" checked>
            <label class="btn btn-outline-primary" for="gender1">Hombre</label>

            <input type="radio" class="btn-check" name="gender" value="Female" id="gender2" autocomplete="off">
            <label class="btn btn-outline-primary" for="gender2">Mujer</label>

            <input type="radio" class="btn-check" name="gender" value="Other" id="gender3" autocomplete="off">
            <label class="btn btn-outline-primary" for="gender3">Otro</label>
        </div>

        <div class="form-group mt-3 mb-3 ">
            <small class="form-text text-muted">Dirección</small>
            <input type="text" required class="form-control" name="address" id="address" placeholder="Dirección">
        </div>

        <div class=" mt-3 d-flex gap-3">
            <div class="form-group mb-3 ">
                <small class="form-text text-muted">Código postal</small>
                <input type="text" required class="form-control" name="postalCode" id="postalCode"  placeholder="Código postal">
            </div>
            <div class="form-group mb-3 ">
                <small class="form-text text-muted">Población</small>
                <input type="text" required class="form-control" name="poblacion" id="poblacion"  placeholder="Población">
            </div>
            <div class="form-group mb-3 ">
                <select required name="provincia" class="form-select mt-4">
                    <option value="">Elige Provincia</option>
                    <option value="Álava/Araba">Álava/Araba</option>
                    <option value="Albacete">Albacete</option>
                    <option value="Alicante">Alicante</option>
                    <option value="Almería">Almería</option>
                    <option value="Asturias">Asturias</option>
                    <option value="Ávila">Ávila</option>
                    <option value="Badajoz">Badajoz</option>
                    <option value="Baleares">Baleares</option>
                    <option value="Barcelona">Barcelona</option>
                    <option value="Burgos">Burgos</option>
                    <option value="Cáceres">Cáceres</option>
                    <option value="Cádiz">Cádiz</option>
                    <option value="Cantabria">Cantabria</option>
                    <option value="Castellón">Castellón</option>
                    <option value="Ceuta">Ceuta</option>
                    <option value="Ciudad Real">Ciudad Real</option>
                    <option value="Córdoba">Córdoba</option>
                    <option value="Cuenca">Cuenca</option>
                    <option value="Gerona/Girona">Gerona/Girona</option>
                    <option value="Granada">Granada</option>
                    <option value="Guadalajara">Guadalajara</option>
                    <option value="Guipúzcoa/Gipuzkoa">Guipúzcoa/Gipuzkoa</option>
                    <option value="Huelva">Huelva</option>
                    <option value="Huesca">Huesca</option>
                    <option value="Jaén">Jaén</option>
                    <option value="La Coruña/A Coruña">La Coruña/A Coruña</option>
                    <option value="La Rioja">La Rioja</option>
                    <option value="Las Palmas">Las Palmas</option>
                    <option value="León">León</option>
                    <option value="Lérida/Lleida">Lérida/Lleida</option>
                    <option value="Lugo">Lugo</option>
                    <option value="Madrid">Madrid</option>
                    <option value="Málaga">Málaga</option>
                    <option value="Melilla">Melilla</option>
                    <option value="Murcia">Murcia</option>
                    <option value="Navarra">Navarra</option>
                    <option value="Orense/Ourense">Orense/Ourense</option>
                    <option value="Palencia">Palencia</option>
                    <option value="Pontevedra">Pontevedra</option>
                    <option value="Salamanca">Salamanca</option>
                    <option value="Segovia">Segovia</option>
                    <option value="Sevilla">Sevilla</option>
                    <option value="Soria">Soria</option>
                    <option value="Tarragona">Tarragona</option>
                    <option value="Tenerife">Tenerife</option>
                    <option value="Teruel">Teruel</option>
                    <option value="Toledo">Toledo</option>
                    <option value="Valencia">Valencia</option>
                    <option value="Valladolid">Valladolid</option>
                    <option value="Vizcaya/Bizkaia">Vizcaya/Bizkaia</option>
                    <option value="Zamora">Zamora</option>
                    <option value="Zaragoza">Zaragoza</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>