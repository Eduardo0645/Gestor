<?php
session_start();
$hostname="localhost";
$username=$_SESSION['username'];
$password=$_SESSION['password'];
$conn = mysqli_connect($hostname, $username, $password);

    $nom_bd = $_GET['nom_bd'];
    $nom_t = $_GET['nom_t'];
    $campo = $_GET['campo'];
    $colm =$_GET['colm'];



$sql = "DELETE FROM $nom_bd.$nom_t WHERE $colm = $campo";

if (mysqli_query($conn, $sql)) {
    header("Location: ../tablasf.php?nom_bd=$nom_bd&nom_t=$nom_t");
} else {
    echo "Error al eliminar la tabla: $tabla ";
}

?>