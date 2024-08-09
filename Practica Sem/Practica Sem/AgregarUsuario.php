<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4y05f0bPCUYBmoVCTHZBAh7Vt8Tf-8yG5Vg&usqp=CAU" type="image/x-icon">
    <link rel="stylesheet" href="roles.css">
    <title>Document</title>
</head>
<body>

    <div class="logout">
        <a class="salir" href="Admin.php"><i id="salir" class='bx bx-log-out-circle'></i>Regresar</a>
    </div>

    <div class="sidebar">
       <ul>
           <li>Home</li>
           <a class="add-user" href="AgregarUsuario.php"><li>Agregar empleados</li></a>
           <li>Ventajas</li>
           <li>Rendimiento</li>
           <li>Opciones</li>
       </ul>
    </div>

    <form class="form" id="add-users" action="procesar_empleado.php" method="post" onsubmit="return validarFormulario()">
        <div class="campos">
            <div class="mb-3">
              <label id="label-usuario" for="usuario" class="form-label">Ingresa el correo electronico:</label>
              <input type="email" class="form-control" name="usuario" id="usuario" aria-describedby="emailHelp" placeholder="example@example.com">
              <div id="Aviso" class="form-text">Por favor revisar bien el correo electronico para evitar cualquier problema.</div>
            </div>
            <div class="mb-3">
              <label id="label-contraseña" for="contraseña" class="form-label">Ingresa la contraseña:</label>
              <input type="password" class="form-control" id="contraseña" name="contraseña">
            </div>
            <div class="mb-3">
                <label for="rol">Escoge rol:</label> <br>
                <select  name="rol" id="rol" class="form-select" aria-label="Default select example">
                  <option selected></option>
                  <option value="agente">Agente</option>
                  <option value="administrador">Administrador</option>
                </select>
            </div>
            <button type="submit" id="start" class="btn btn-primary">Agregar</button>
        </div>
      </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="Validaciones.js"></script>
  </body>
</html>