<?php
include("connect.php");

    $nom_bd = $_GET['nom_bd'];
    $tabla = $_GET['nom_t'];


$sql = "DROP TABLE $nom_bd.$tabla";

if (mysqli_query($conn, $sql)) {
    header("Location: ../tablas.php?nom_bd=$nom_bd");
} else {
    echo "Error al eliminar la tabla: $tabla ";
}

?>