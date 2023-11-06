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
    <title>Inicio</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex">
            <?php include("nav.php"); ?>
                <div class="col-lg-12 mb-6 sm-4">
                    <div class="card mb-4 ">
                        <div class="card-header py-3">
                            <h6 class="font-weight-bold text-secondary">Nueva Base de datos</h6>
                        </div>
                        <div class="card-body ">
                            <form class="user" action="funtions/create.php" method="post">
                                <div class="container-fluid">
                                    <div class="form-group col-lg-12 col-md-8  col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="nom_bd" name="nom_bd" placeholder="Ingrese Nombre"required>
                                            <button type="submit" class="btn btn-success input-group-btn">
                                                Enviar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary">Bases de datos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Examinar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $Skip = array('information_schema', 'mysql', 'performance_schema', 'phpmyadmin'); 
                                    $query = mysqli_query($conn, "SHOW DATABASES");
                                    while ($row = mysqli_fetch_array($query)) { ?>
                                        
                                        <tr>
                                            <td> <?php echo $row['Database']; ?></td>
                                            <td><a type="button" class="btn btn-success" href="tablas.php?nom_bd=<?php echo $row['Database']; ?>"><i class="fas fa-eye"></i> Examinar</a></td>
                                            <?php if($row['Database'] == 'information_schema'or $row['Database'] == 'mysql' or $row['Database'] == 'performance_schema' or $row['Database'] == 'phpmyadmin'){
                                                ?> <td><button tipe="button" class="btn btn-danger" disabled><i class="fas fa-trash-alt"></i> Eliminar</button></td>
                                            <?php }else{ ?>
                                                <td><a tipe="button" href="funtions/delete.php?nom_bd=<?php echo $row['Database']; ?>" class="btn btn-danger"><i class="fas fa-trash-alt" ></i> Eliminar</a></td>
                                                <?php }?>
                                        </tr>
                                        <?php } ?>
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