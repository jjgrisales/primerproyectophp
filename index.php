<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tareas Entorno wed 2</title>
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
                height: 70%;
                border: whitesmoke ;
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
    <body background="imag/linux.jpg" >
        <div class="header">
            <h1>tareas Web App</h1>
            <br>
            <p><h1> Aplicacion para poder crear,eliminar,consultar y actualizar tareas ya realizadas.</h1></p>
            <br>
            <br>
            <br>

        </div>
        <div class="seccion">
            <h3>REGISTRAR TAREA</h3>
            <form action="creartarea.php" method="POST">
                <div class="item-form">
                    <label for=""><h5>NOMBRE DE LA TAREA:</h5></label>
                    <input type="text" name="input_nombre" id="" required>
                </div>
                <div class="item-form">
                    <label for=""><h5>FECHA DE LA TAREA:</h5></label>
                    <input type="date" name="input_fecha" id="" required>
                </div>
                <div class="item-form">
                    <label for=""><h5>DESCRIPCION:</h5></label>
                    <input type="text" name="input_descripcion" id="" required>
                </div>
                <div class="item-form">
                    <label for=""><h5>PRIORIDADES:</h5></label>
                    <select name="input_prioridades">
                    <option> </option>    

                   <option>alta</option>

                  <option>media</option>

                   <option>baja</option>

        </select>
                </div>
                <div class="item-form">
                    <label for=""><h5>RESPONSABLE DE LA TAREA:</h5></label>
                    <input type="text" name="input_responsable" id="" required>
                </div>
                <br>
                <div class="item-form">
                    <input type="submit">
                </div> 
                <br>               
            </form>
            <table border="1">
                <tr>
                    <th>id</th>
                    <th>nombre </th>
                    <th>fecha</th>
                    <th>descripcion</th>
                    <th>prioridades</th>
                    <th>responsable</th>
                    <th>boton editar</th>
                    <th>boton eliminar</th>
                </tr>
                <br>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "tareas_bd";
                
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
                $sql = "SELECT * from tareas";
                $sql = "SELECT * from tareas ORDER BY fecha DESC";
                //lanzar la sentencia sql
                $respuesta = $conn->query($sql);
                while($row=$respuesta->fetch_array())
                {
                ?>
                <tr>
                    <td> <?php echo $row['id_pk']; ?></td>
                    <td> <?php echo $row['nombre']; ?></td>
                    <td> <?php echo $row['fecha']; ?></td>
                    <td> <?php echo $row['descripcion']; ?></td>
                    <td> <?php echo $row['prioridades']; ?></td>
                    <td> <?php echo $row['responsable']; ?></td>
                    <td><a href="vertareaParaEditar.php?id_para_editar=<?php echo $row['id_pk']; ?>">Editar</a></td>
                    <td><a href="eliminartarea.php?id_para_borrar=<?php echo $row['id_pk']; ?>">Eliminar</a></td>
                </tr>
                <?php
                }
                // cierra la conexión
                $conn->close();
                ?>
            </table>
            
        </div>
        <br>
        
        
        <div class="footer">
            Realizado por james grisales
        </div>
        
    </body>
</html>