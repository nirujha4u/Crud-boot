<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='niranjan'; //Database Name

$conn=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

if($conn){
    // echo "DATABASE CONNECTION SUCCESSFULLY","<br>";
}else {
    die(mysqli_error($con));
}

?>
