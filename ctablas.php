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
$nom_t = $_POST['nom_t'];
$num_t = $_POST['num_t']; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Tablas</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex">
            <?php include("nav.php"); ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-secondary">Rellene los campos para crear la tabla: <?php echo $nom_t ?></h6>
                </div>
                <div class="card-body">
                    <form class="user" action="funtions/create_t.php?nom_bd=<?php echo $nom_bd ?>&nom_t=<?php echo $nom_t; ?>&num_t=<?php echo $num_t; ?>" method="post">
                        <?php for ($i = 1; $i <= $num_t; $i++) {
                            echo '
                                    <div class="container-fluid">
                                    <table class="table table-borderless" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre de la tabla</th>
                                            <th>Tipo de dato</th>
                                            <th>Longitud</th>
                                            <th>Indice</th>
                                        </tr>
                                    </thead>
                                    </table>
                                        <div class="form-group ">
                                        <div class="input-group">';
                            echo '<input type="text" class="form-control" id="nom_c' . $i . '" name="nom_c' . $i . '" placeholder="Ingrese Nombre"required>';
                            echo '<select class="form-select" id="tipoDato'.$i.'" name="tipoDato'.$i.'" >';
                            echo '<option value="TINYINT">TINYINT</option>';
                            echo '<option value="SMALLINT">SMALLINT</option>';
                            echo '<option value="MEDIUMINT">MEDIUMINT</option>';
                            echo '<option value="INT" selected>INT</option>';
                            echo '<option value="INTEGER">INTEGER</option>';
                            echo '<option value="BIGINT">BIGINT</option>';
                            echo '<option value="VARCHAR">VARCHAR</option>';
                            echo '<option value="DOUBLE">DOUBLE</option>';
                            echo '<option value="DECIMAL">DECIMAL</option>';
                            echo '<option value="DATE">DATE</option>';
                            echo '<option value="DATETIME">DATETIME</option>';
                            echo '<option value="TIMESTAMP">TIMESTAMP</option>';
                            echo '<option value="TIME">TIME</option>';
                            echo '<option value="YEAR">YEAR</option>';
                            echo '<option value="BOOLEAN">BOOLEAN</option>';
                            echo '<option value="BLOB">BLOB</option>';
                            echo '<option value="TEXT">TEXT</option>';
                            echo '<option value="LONGTEXT">LONGTEXT</option>';
                            echo '</select>';
                            echo '<input type="number" class="form-control" id="cnt_bd'.$i.'" name="ctn_bd' . $i . '" placeholder="0">';
                            echo '<select class="form-select" id="indice'.$i.'" name="indice'.$i.'" >';
                            echo '<option value="NULL" selected>NULL</option>';
                            echo '<option value="NOT NULL">NOT NULL</option>';
                            echo '<option value="NOT NULL AUTO_INCREMENT">AUTO INCREMENT</option>';
                            echo '<option value="NOT NULL AUTO_INCREMENT PRIMARY KEY">PRIMARY KEY</option>';
                            echo '<option value="NULL UNIQUE">NULL UNIQUE</option>';
                            echo '<option value="NOT NULL UNIQUE">NOT NULL UNIQUE</option>';
                            echo '<option value="NOT NULL AUTO_INCREMENT UNIQUE">AUTO INCREMENT UNIQUE</option>';
                            echo '</select>
                                </div>
                            </div>
                        </div>';
                        } ?>
                        <br>
                <center><button type="submit" class="btn btn-success input-group-btn">
                    Enviar
                </button></center>
            </form>
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