<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Denuncias Web App Transporte</title>
        
        <style>
            html
            {
                height: 100%;
            }
            body
            {
                height: 100%;
            }
            .seccion
            {
                height: 100%;
               
                border: whitesmoke solid 0px;

            }
            .header
            {
                height:20%
            }    
            .footer
            {
                height:10%
            }
        </style>
    </head>
    <body background="img/accidente.jpg";>

        <div class="header">
            <h1>Denuncias Web App</h1>
            <p><h2> Aplicación web para el registro de denuncias del transporte publico en Colombia </h2></p>
            <p><h2>Permite el control y la veduría pública</h2></p>
        </div>
        <div class="seccion">
            <h3>Registre aquí sus denuncias</h3>
            <form action="crearDenuncia.php" method="POST">
                <div class="item-form"><br>
                    <label for="">Lugar:</label>
                    <input type="text" name="input_lugar" id="" required> 
                </div><br>
                <div class="item-form">
                    <label for="">Fecha:</label>
                    <input type="date" name="input_fecha" id="" required>
                </div><br>
                <div class="item-form">
                    <label for="">Hora:</label>
                    <input type="number" name="input_hora" id="" required>
                </div><br>
                <div class="item-form">
                    <label for="">Tipo de Vehículo:</label>
                    <input type="text" name="input_tipo" id="" required>
                </div><br>
                <div class="item-form">
                    <label for="">Placa:</label>
                    <input type="text" name="input_placa" id="" required>
                </div><br>
                <div class="item-form">
                    <label for="">Denuncia:</label>
                    <input type="textarea" name="input_denuncia" id="" required>
                </div><br>
                <div class="item-form">
                    <input type="submit"  value="registrar datos" >
                </div>  <br>              
            </form>
            <table border ="5"> 
                <tr >
                    <th>id</th>
                    <th>Lugar</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Tipo</th>
                    <th>Placa</th>
                    <th>Denuncia</th>
                    <th>Editar dato</th>
                    <th>Eliminar dato</th>
                </tr>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "denuncias_bd";
                
                $conn = new mysqli($servername, $username, $password, $dbname);
                if($conn->connect_error)
                {
                    echo "mi conexión con la bd falló";
                    die("la conexión falló " . $conn->connect_error);
                }
                else
                {
                    echo "conexión establecida entre php y mysql</br>";
                }
                //crear sentencia sql
                $sql = "SELECT * from denuncias";
                //lanzar la sentencia sql
                $respuesta = $conn->query($sql);
                while($row=$respuesta->fetch_array())
                {
                ?>
                <tr>
                    <td> <?php echo $row['id_pk']; ?></td>
                    <td> <?php echo $row['lugar']; ?></td>
                    <td> <?php echo $row['fecha']; ?></td>
                    <td> <?php echo $row['hora']; ?></td>
                    <td> <?php echo $row['tipo']; ?></td>
                    <td> <?php echo $row['placa']; ?></td>
                    <td> <?php echo $row['denuncia']; ?></td>
                    <td><a href="editarDenuncia.php?id_para_editar=<?php echo $row['id_pk']; ?>">Editar</a></td>
                    <td><a href="eliminarDenuncia.php?id_para_borrar=<?php echo $row['id_pk']; ?>">eliminar</a></td>
                </tr>
                <?php
                }
                // cierra la conexión
                $conn->close();
                ?>
            </table>
            
        </div>
        <div class="footer">
           
        </div>
    </body>
</html>