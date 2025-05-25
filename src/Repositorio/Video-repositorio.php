<?php

namespace Alura\Mvc\Repositorio;

use PDO;
use Alura\Mvc\Entity\Video;

class VideoRepositorio{
    public function __construct(private \PDO $pdo)
    {
        
    }

    public function adicionar (Video $video):bool{
        $sql = 'INSERT INTO videos (URL_VIDEO, TITULO_VIDEO) values (:url,:titulo)';  
        $statement =  $this->pdo -> prepare($sql);
        $statement -> bindvalue(':url', $video ->url);
        $statement -> bindValue(':titulo', $video ->titulo);
        $result  = $statement -> execute(); 
        
        $id = $this->pdo ->lastInsertId();

        $video ->setId(intval($id));
        
        return $result;
    }

    public function excluir(int $id):bool{
        $sql = 'DELETE FROM videos WHERE id = :id';
        $statement = $this->pdo -> prepare($sql);
        $statement ->bindValue(':id',$id);
        return $statement ->execute();
    }


    public function atualizar(Video $video):bool{
        $sql = 'UPDATE videos SET URL_VIDEO = :url, TITULO_VIDEO = :titulo WHERE id = :id ';
        $statement = $this->pdo -> prepare($sql);
        $statement -> bindValue(':url',$video ->url);// usando as propriedades do repositorio para editar as informações do video
        $statement -> bindValue(':titulo',$video -> titulo);
        $statement -> bindValue(':id', $video -> id);

        return $statement -> execute();
    }

    public function buscarTodos(){
        $videoList = $this->pdo -> query('SELECT * FROM videos;')-> fetchAll(PDO::FETCH_ASSOC);
    
        return array_map(
            function (array $videoData){
                $video = new Video($videoData['URL_VIDEO'],$videoData['TITULO_VIDEO']);
                $video -> setId($videoData['id']);
                return $video;
            }
            ,$videoList);
    }


}

