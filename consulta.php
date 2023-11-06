<?php
session_start();
$hostname;
$username;
$password;
$conn;

if (isset($_SESSION['username'])) {
    $hostname = "localhost";
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $conn = mysqli_connect($hostname, $username, $password);
} else {
    header("Location: Login.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Consulta SQL</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex">
            <?php include("nav.php"); ?>
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-secondary">Consulta sql</h6>
                </div>
                <div class="card-body">
                    <form method="post">
                        <label for="exampleFormControlTextarea1" class="form-label"></label>
                        <textarea id="exampleFormControlTextarea1" name="consulta" class="col-xl-12 form-control" rows="6"></textarea><br><br>

                        <center><a class="btn btn-success" name="submit" id="Link">Ejecutar</a>
                            <button type="submit" id="trap" name="submit" style="display: none;"></button>
                        </center>
                </div>
            </div><?php
                    if (!$conn) {
                        die("Falló la conexión: " . mysqli_connect_error());
                    }

                    if (isset($_POST['submit'])) {
                        if (isset($_POST['consulta'])) {
                            $consulta = $_POST['consulta'];
                            if (empty($consulta)) {
                                echo '<div class="card mb-4">
                                <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Error</h6>
                                </div>
                                <div class="card-body">
                                <h3><center>No se ha echo ninguna consulta</center></h3><br>
                                </div>
                                </div>';
                            }
                            $result = mysqli_query($conn, $consulta);
                            if (!!!$result) {
                                echo '<div class="card mb-4">
                                <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Error</h6>
                                </div>
                                <div class="card-body">
                                <p>'.$consulta.'</p><br>
                                "'. mysqli_error($conn) .'"
                                </div>
                                </div>';
                                exit();
                            }

                            echo '<div class="card mb-4">
                            <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary">Su consulta se ejecutó con éxito</h6><br>
                            <h6 class="m-0 font-weight-bold text-secondary">Tipo de consulta: '.$consulta.'</h6>
                            </div><br>';

                            if (is_object($result)) {
                                if (mysqli_num_rows($result) > 0) {
                                    $campos = mysqli_fetch_fields($result);
                                    echo '<div class="card-body">';
                                    echo '<div class="table">';
                                    echo '<table class="table table-bordered">';
                                    echo '<tr>';
                                    foreach ($campos as $campo) {
                                        echo '<th>' . $campo->name . '</th>';
                                    }
                                    echo '</tr>';
                                    while ($fila = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';
                                        foreach ($campos as $campo) {
                                            echo '<td>' . $fila[$campo->name] . '</td>';
                                        }
                                        echo '</tr>';
                                    }
                                    echo '</table>';
                                    echo '</div>';
                                    echo '</div>';
                                } elseif($result=='Show columns'){
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<tr><td>" . $row['Field'] . "</td>
                                        <td>" . $row['Type'] . "</td>
                                        <td>" . $row['Key'] . "</td>
                                        <td>" . $row['Null'] . "</td>
                                        <td>" . $row['Default'] . "</td>
                                        </tr>";
                                    }
                                }
                                
                                else {
                                    echo '<div class="card-body">';
                                    echo "No se encontraron resultados";
                                    echo '</div>';
                                    echo '</div>';
                                }
                                // Cerrar la conexión
                                mysqli_close($conn);
                            } else {
                                echo '<div class="card-body">';
                                echo "<div id='tablas' ><h3>No se encontraron resultados Graficos</h3></div>";
                                echo '</div>';
                            }
                        }
                    }
                    ?>
        </div>
    </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        document.getElementById("Link").addEventListener("click", function(event) {
            event.preventDefault();
            document.getElementById("trap").click();
        });
    </script>
</body>

</html>