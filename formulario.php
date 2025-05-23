<?php
require_once 'connection.php';
$pdo = new PDO('mysql:host=localhost;dbname=mvc_videos','root','123456');

$id =  filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
$video =[
    'URL_VIDEO' => '',
    'TITULO_VIDEO' =>'' 
];

if ($id !== false && $id !== null) {
    $statement = $pdo -> prepare('SELECT * FROM mvc_videos.videos WHERE id = ?');
    $statement -> bindValue(1,$id,PDO::PARAM_INT);
    $statement -> execute();
    $video = $statement -> fetch(PDO::FETCH_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilos-form.css">
    <link rel="stylesheet" href="../css/flexbox.css">
    <title>AluraPlay</title>
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>


    <?=require_once 'inicio-html.php';?>
    <main class="container">

    <form class="container__formulario"  method="POST">
            <h2 class="formulario__titulo">Envie um vídeo!</h2>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="url">Link embed</label>
                    <input name="url" class="campo__escrita" required value = "<?= $video['URL_VIDEO'] ?>"
                        placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" id='url' />
                </div>


                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                    <input name="titulo" class="campo__escrita" required value = "<?= $video['TITULO_VIDEO'] ?>" placeholder="Neste campo, dê o nome do vídeo"
                        id='titulo' />
                </div>

                <input class="formulario__botao" type="submit" value="Enviar" />
        </form>

    </main>

<?=require_once 'fim-html.php';?>