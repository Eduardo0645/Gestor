<?php

include('connect.php');

$nom_bd = $_GET['nom_bd'];

$sql = "DROP DATABASE $nom_bd ";


$fila = (mysqli_query($conn, $sql ));
if ($fila) {
    header("Location: ../index.php");
} else {
    echo "Error al eliminar: $nom_bd";
}

?>