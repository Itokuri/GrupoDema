<html>
<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "derma2";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // Obtener los datos de la base de datos
    $query = "SELECT * FROM movimientopt";
    $result = $conn->query($query);
    
    echo '<table class="table table-borderless"> 
    <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Fecha Ingreso</th>
          <th scope="col">Fecha Egreso</th>
        </tr>
      </thead>
      ';
    // Verificar si se obtuvieron resultados
    if ($result) {
        // Construir la respuesta HTML
        $htmlResponse = '<tbody>';
        while ($row = $result->fetch_assoc()) {
            $htmlResponse .= '<tr>';
            $htmlResponse .= '<th scope="row">' . $row['idProductos'] . '</th>';
            $htmlResponse .= '<td>' . $row['fechaIngreso'] . '</td>';
            $htmlResponse .= '<td>' . $row['fechaEgreso'] . '</td>';
            $htmlResponse .= '</tr>';
        }
        $htmlResponse .= '</tbody>';

        // Devolver la respuesta HTML
        echo $htmlResponse;
    } else {
        echo json_encode(['error' => 'Error al obtener los datos de la base de datos']);
    }
    echo "</table>";

    mysqli_close($conn);
    ?>
</body>

</html>