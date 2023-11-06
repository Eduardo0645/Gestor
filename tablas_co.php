<?php
session_start();
$hostname;
$username;
$password;
$conn;
$nom_bd;

if (isset($_SESSION['username'])) {
    $hostname = "localhost";
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $nom_bd = $_GET['nom_bd'];
    $conn = mysqli_connect($hostname, $username, $password, $nom_bd);
} else {
    header("Location: Login.php");
}
$nom_t = $_GET['nom_t'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Filas de Tablas </title>
</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex">
            <?php include("nav.php"); ?>
            <?php
                    $sql = "SHOW COLUMNS FROM $nom_t";
                    $result = $conn->query($sql);
                    ?>
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Columnas de la tabla: <?php echo $nom_t; ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                            <tr>
                                            <th>Nombre</th>
                                            <th>Tipo de dato</th>
                                            <th>Clave</th>
                                            <th>Nulo</th>
                                            <th>Valor por defecto</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr><td>" . $row['Field'] . "</td>
                                            <td>" . $row['Type'] . "</td>
                                            <td>" . $row['Key'] . "</td>
                                            <td>" . $row['Null'] . "</td>
                                            <td>" . $row['Default'] . "</td>
                                            </tr>";
                                        }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>