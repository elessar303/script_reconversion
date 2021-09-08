<?php
$host='172.18.0.2';
$port='5432';
$db='DB';
$user='root';
$password='root';

$db = @pg_connect("host={$host} port={$port} dbname={$db} user={$user} password={$password}") or die('Error Conexion a BD');