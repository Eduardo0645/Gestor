
<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="index.php" class=" text-uppercase d-flex pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <i class="fa-solid fa-face-grin-squint-tears fa-xl"></i>
            <span class="fs-5 d-none d-sm-inline"> Gestor </span> _beta
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="index.php" class="nav-link align-middle px-0">
                <i class="fa-solid fa-house"></i> <span class="ms-1 d-none d-sm-inline"> Inicio </span>
                </a>
            </li>
            <hr style="height:2px; width:150%; border-width:0; color:white; background-color:white"></hr>
            <li class="nav-item">
                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                <i class="fa-solid fa-database"></i><span class="ms-1 d-none d-sm-inline"> Bases de datos </span></a>
                <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                    <?php
                $query = mysqli_query($conn, "SHOW DATABASES");
                while ($row = mysqli_fetch_array($query)) {
                    
                    ?>
                    <li class="w-100">
                        <a href="tablas.php?nom_bd=<?php echo $row['Database']; ?>" class="nav-link px-0"> <span class="d-none d-sm-inline"><?php echo $row['Database']; ?></span></a>
                        
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <li>
                <a href="consulta.php" class="nav-link px-0 align-middle">
                <i class="fa-solid fa-file"></i><span class="ms-1 d-none d-sm-inline"> Consulta SQL</span> </a>
            </li>
            <hr style="height:2px; width:150%; border-width:0; color:white; background-color:white"></hr>
            <li>
                <a href="funtions/salir.php" class="nav-link px-0 align-middle">
                <i class="fa-solid fa-right-from-bracket"></i><span class="ms-1 d-none d-sm-inline">Salir</span> </a>
            </li>
        </ul>
    </div>
</div>
<div class="col py-3 bg-success">