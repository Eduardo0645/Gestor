<?php
if (isset($_POST['username'])) {
    $hostname = "localhost";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conn = mysqli_connect($hostname, $username, $password);
    if ($conn) {
        session_start();
        $_SESSION['host'] = $hostname;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("location: index.php");
    } else {
        session_destroy();
        header("location: Login.php");
    }
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
    <title>Login</title>
</head>

<body>
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="border border-3 border-dark"></div>
                    <div class="card bg-white shadow-lg">
                        <div class="card-body p-5">
                            <form class="mb-3 mt-md-4" method="POST">
                                <h2 class="fw-bold mb-2 text-uppercase text-center">Gestor beta</h2>
                                <div class="mb-3">
                                    <label for="username" class="form-label ">Usuario</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Nombre de usuario" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label ">Contraseña</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="*******" required>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-outline-dark" type="submit">Entrar</button>
                                </div>
                            </form>
                            <div>

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