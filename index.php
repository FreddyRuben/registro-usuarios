<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-7">
                <h1>Formulario</h1>
                <form action="index.php" method="post" class="form-group">
                    <label for="">Nombre*</label>
                    <input type="text" name="nombre" class="form-control" required>
                    <label for="">Apellido*</label>
                    <input type="text" name="apellido" class="form-control" required>
                    <label for="">Edad*</label>
                    <input type="number" name="edad" class="form-control" required>
                    <br>
                    <input type="submit" value="Enviar" class="btn btn-primary" name="enviar">
                </form>

                <?php

                    $host = "b5jzuwqih6vbukngcp0r-mysql.services.clever-cloud.com";
                    $usuario = "ugmuxavgsgabub5p";
                    $pass = "4kzjwqOBCb8UOapwMqhF";
                    $db_nombre = "b5jzuwqih6vbukngcp0r";

                    $conn = new mysqli($host, $usuario, $pass, $db_nombre) ;

                    if(!$conn){
                        echo "Error en la conexion con la base de datos.";
                    }

                    if(isset($_POST['enviar'])){
                        
                        $nombre = $_POST['nombre'];
                        $apellido = $_POST['apellido'];
                        $edad = $_POST['edad'];

                        $insertarDatos = "INSERT INTO ciudadano VALUES(null, \"$nombre\", \"$apellido\", \"$edad\")";
                        $ejecutarInsersion = mysqli_query($conn, $insertarDatos);


                        if(!$ejecutarInsersion){
                            echo "Error en la linea de captura";
                        }else{
                            echo "Los datos han sido guardado satisfactoriamente";
                        }

                    }

                    ?>
                    <table class="table table-striped">
                        <thead>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Edad</th>
                            <th></th>
                        </thead>
                    <?php

                    $consultarDatos = "SELECT * FROM ciudadano";
                    $ejecutarConsulta = mysqli_query($conn, $consultarDatos);

                    while($mostrar = mysqli_fetch_array($ejecutarConsulta)){
                        ?>
                        <tr>
                            <td><?php echo $mostrar['nombre'] ?></td>
                            <td><?php echo $mostrar['apellido'] ?></td>
                            <td><?php echo $mostrar['edad'] ?></td>
                            <td><button type="button" class="btn btn-danger">Eliminar</button></td>
                        </tr>
                        <?php
                    }
                ?>
                </table>
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            </div>
        </div>
    </div>
</body>
</html>