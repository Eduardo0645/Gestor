<?php

include('connect.php');

$nom_bd = $_POST['nom_bd'];

$sql = "CREATE DATABASE $nom_bd ";


$filas = (mysqli_query($conn, $sql ));
if ($filas) {
    header("Location: ../index.php");
} else {
    echo "Error al crear la base de datos: $nom_bd";
}

?>