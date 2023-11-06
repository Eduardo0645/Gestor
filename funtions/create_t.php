<?php
if (isset($_GET['nom_bd'])) {
    $nom_bd = $_GET['nom_bd'];
    $nom_t = $_GET['nom_t'];
    $num_t = $_GET['num_t'];
    $num = $num_t;
    $num--;
    $sql = "CREATE TABLE $nom_t (";

    $utf8 = 0;
    for ($i = 1; $i <= $num_t; $i++) {
        $nom_c = $_POST["nom_c$i"];
        $ctn_bd = $_POST["ctn_bd$i"];
        $tipoDato = $_POST["tipoDato$i"];
        $indice = $_POST["indice$i"];
        
        $sql .= "$nom_c  ";
        if ($tipoDato == 'TEXT'or $tipoDato == 'DOUBLE' or $tipoDato =='DATE' or $tipoDato =='DATE' or $tipoDato == 'BOOLEAN' or $tipoDato == 'YEAR' or $tipoDato == 'BLOB' or $tipoDato == 'LONGTEXT') {
            if ($tipoDato == 'BOOLEAN'  && $indice == 'NOT NULL AUTO_INCREMENT PRIMARY'){
                $tipoDato = 'TINYINT';
            $sql .= "$tipoDato";
        }else{
            $sql .= "$tipoDato";
        }
            
            $utf8++;
        } else if($tipoDato == 'INT' or $tipoDato =='TINYINT' or $tipoDato == ' SMALLINT' or $tipoDato == 'MEDIUMINT' or $tipoDato == 'BIGINT'  or $tipoDato == 'VARCHAR') {
            if($ctn_bd == null){
                $sql .= "$tipoDato ";
            $utf8++;}else{
                $sql .= "$tipoDato ($ctn_bd)";
            $utf8++;
            }
            
        }
        $sql.=" $indice" ;
        if($i<=$num){
            $sql.=", ";
        }else{
            
        };

    }
    if ($utf8 == $num_t) {
        $sql .= ") ENGINE = InnoDB; ";
    } else {
        $sql .= ") DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
    }
    echo $sql;
$conn = new mysqli('localhost', 'root', '12345678', $nom_bd);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (mysqli_query($conn , $sql )){ 
    header("Location: ../tablas.php?nom_bd=$nom_bd");
} else {
    echo "Error al crear la base de datos: $nom_tab,'<br>' ".mysqli_error($conn);
    }
mysqli_close($conn);

}
?>