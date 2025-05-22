<?php
require_once 'connection.php';
$pdo = new PDO('mysql:host=localhost;dbname=mvc_videos','root','123456');

$id =  filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
$titulo = $_POST['titulo'];
$url = filter_input(INPUT_POST, 'url',FILTER_VALIDATE_URL);
$sql =  'UPDATE mvc_videos.videos set URL_VIDEO = :url, TITULO_VIDEO = :titulo WHERE id = :id ';

$statement = $pdo-> prepare($sql);
$statement -> bindValue(':url',$url);
$statement -> bindValue(':titulo',$titulo);
$statement -> bindValue(':id',$id, PDO::PARAM_INT);
$statement -> execute();

header('Location:/');