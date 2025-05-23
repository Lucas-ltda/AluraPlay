<?php
require_once 'connection.php';
$pdo = new PDO('mysql:host=localhost;dbname=mvc_videos','root','123456');

$videoList = $pdo -> query('SELECT * FROM videos;')-> fetchAll(PDO::FETCH_ASSOC);

?>
    <?= require_once 'inicio-html.php'?>
    <ul class="videos__container" alt="videos alura">
        <?php foreach($videoList as $video): ?>
            
        <li class="videos__item">
            <iframe width="100%" height="72%" src="<?=$video['URL_VIDEO']?>"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            <div class="descricao-video">
                <img src="./img/logo.png" alt="logo canal alura">
                <h3><?=$video['TITULO_VIDEO']?></h3>
                <div class="acoes-video">
                    <a href="editar-video?id=<?=$video['id']?>">Editar</a>
                    <a href="remover-video?id=<?=$video['id']?>">Excluir</a>
                </div>
            </div>
        </li>   
        <?php endforeach;?>
    </ul>
    <?= require_once 'fim-html.php';?>