<?php

namespace Alura\Mvc\Controller;

use PDO;
use Alura\Mvc\Repositorio\VideoRepositorio;

class VideoListController{
    

    public function __construct(private VideoRepositorio $VideoRepositorio){

    }
   
    public function processaRequisicao():void{ //lidar com a reposição e exibir o conteudo que for preciso
        $videoList = $this->VideoRepositorio->buscarTodos();

        // conteudo a ser exibido
        require_once __DIR__. '/../../inicio-html.php'?>
        <ul class="videos__container" alt="videos alura">
            <?php foreach($videoList as $video):?>    
            <li class="videos__item">
                <iframe width="100%" height="72%" src="<?=$video->url?>"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <div class="descricao-video">
                    <img src="./img/logo.png" alt="logo canal alura">
                    <h3><?=$video -> titulo?></h3>
                    <div class="acoes-video">
                        <a href="editar-video?id=<?=$video -> id?>">Editar</a>
                        <a href="remover-video?id=<?=$video -> id?>">Excluir</a>
                    </div>
                </div>
            </li>   
            <?php endforeach;?>
        </ul>
    <?= require_once __DIR__. '/../../fim-html.php';
    }
}