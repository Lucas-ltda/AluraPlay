<?php
require_once 'connection.php';
$pdo = new PDO('mysql:host=localhost;dbname=mvc_videos','root','123456');

$id = $_GET['id'];
$sql =  'DELETE FROM mvc_videos.videos WHERE ID = ?';

$statement = $pdo-> prepare($sql);
$statement -> bindValue(1,$id);
$statement -> execute();

header('Location:/');