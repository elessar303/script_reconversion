<?php
include './config/conexion.php';

$querys_schema='SIMA';
$querys_table='test_table';
$schemas=['SIMA01', 'SIMA02'];

$result = pg_query($db, 'SELECT * FROM "'.$querys_schema.'".'.$querys_table);
$querys = pg_fetch_all($result);

foreach ($schemas as $value) {
    echo '<b>Corriendo en Schema: '.$value.'</b><br>';
    echo 'Querys:<br>';

    pg_query($db, "SET search_path TO 'public','$value'");

    $count=1;
    foreach ($querys as $key => $query) {
        echo $count.' - '.$query['texto'].'<br>';
        $result = pg_query($db, $query['texto']);
        $affec_rows = pg_affected_rows($result);
        echo "Filas afectadas: " . $affec_rows."<br>" ;
        $count++;
    }
    echo '------------------------------------------<br>';
}