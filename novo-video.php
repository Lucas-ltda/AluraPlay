<?php
require_once 'connection.php';
$pdo = new PDO('mysql:host=localhost;dbname=mvc_videos','root','123456');

$sql = 'INSERT INTO videos (URL_VIDEO, TITULO_VIDEO) values (?, ?)';
$url = filter_input(INPUT_POST, 'url',FILTER_VALIDATE_URL);
$titulo = $_POST['titulo'];

var_dump($video);

$statement = $pdo -> prepare($sql);
$statement -> bindValue(1,$url);
$statement -> bindValue(2,$titulo);
$statement -> execute();

header('location:/');
// var_dump($statement -> execute()); confirmar conexão com o banco e sql