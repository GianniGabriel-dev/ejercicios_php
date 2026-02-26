<!DOCTYPE html>
<html>
<head>
    <title>Listado de empleados</title>
</head>
<body>

<h1>Listado de empleados</h1>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Fecha nacimiento</th>
        <th>Fecha contratación</th>
        <th>Salario</th>
    </tr>

    @foreach($employees as $emp)
        <tr>
            <td>{{ $emp->emp_id }}</td>
            <td>{{ $emp->emp_firstname }}</td>
            <td>{{ $emp->emp_lastname }}</td>
            <td>{{ $emp->emp_birth_date }}</td>
            <td>{{ $emp->emp_hire_date }}</td>
            <td>{{ $emp->salary }}</td>
        </tr>
    @endforeach

</table>

</body>
</html>