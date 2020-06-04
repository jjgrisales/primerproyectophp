<body background="imag/linux.jpg">
    <div class="header">
        <h1>PAGINA DE ACTUALIZACION DE DATOS</h1>
        <br>
        <br>
        <p>
            <h1> Aplicacion para poder crear,eliminar,consultar y actualizar tareas ya realizadas.</h1>
        </p>
        <?php

        $id_tareas_para_editar = $_GET['id_para_editar'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tareas_bd";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            //echo "mi conexión con la bd falló";
            die("la conexión falló " . $conn->connect_error);
        } else {
            //echo "conexión establecida entre php y mysql</br>";
        }
        //crear sentencia sql
        $sql = "SELECT * from tareas where id_pk={$id_tareas_para_editar}";
        //lanzar la sentencia sql
        $respuesta = $conn->query($sql);
        //die($respuesta);
        while ($row = $respuesta->fetch_array()) {
            //echo $row['lugar']."/".$row['placa'];
            $nombre = $row['nombre'];
            $fecha = $row['fecha'];
            $descripcion = $row['descripcion'];
            $prioridades = $row['prioridades'];
            $responsable = $row['responsable'];
        }

        ?>
        <form action="Editartarea.php" method="POST">
            <input type="hidden" name="input_id" value="<?php echo $id_tareas_para_editar ?>">
            <div class="item-form">
                <label for="">
                    <h5>NOMBRE DE LA TAREA:</h5>
                </label>
                <input value="<?php echo $nombre; ?>" type="text" name="input_nombre" id="" required>
            </div>
            <br>
            <div class="item-form">
                <label for="">
                    <h5>FECHA DE LA TAREA:</h5>
                </label>
                <input value="<?php echo $fecha; ?>" type="date" name="input_fecha" id="" required>
            </div>
            <br>
            <div class="item-form">
                <label for="">
                    <h5>DESCRIPCION DE LA TAREA:</h5>
                </label>
                <input value="<?php echo $descripcion; ?>" type="text" name="input_descripcion" id="" required>
            </div>

            <br>
            <div class="item-form">
                <label for="">
                    <h5>PRIORIDADES:</h5>
                </label>
                <select name="input_prioridades">

                    <option  selected>alta</option>

                    <option selected>media</option>

                    <option selected>baja</option>
                    </select>
            </div>
            <div class="item-form">
                <label for="">
                    <h5>RESPONSABLE DE LA TAREA:</h5>
                </label>
                <input value="<?php echo $responsable; ?>" type="text" name="input_responsable" id="" required>
            </div>
            <br>

            <br>

            <div class="item-form">
                <input type="submit" value="Actualizar Tarea">
            </div>
        </form>