<?php
// front cotroller fazendo um "controlador de rota

use Alura\Mvc\Controller\VideoListController;
use Alura\Mvc\Repositorio\VideoRepositorio;

require_once __DIR__. '/../vendor/autoload.php';
require_once __DIR__. '/../connection.php';
    $pdo = new PDO('mysql:host=localhost;dbname=mvc_videos','root','123456');   
    $videoRepositorio = new VideoRepositorio($pdo);

if (!array_key_exists('PATH_INFO', $_SERVER)|| $_SERVER['PATH_INFO'] === '/') {
    $controller = new VideoListController($videoRepositorio);
    $controller -> processaRequisicao();
} else if($_SERVER['PATH_INFO'] === '/novo-video' ){
    if ($_SERVER ['REQUEST_METHOD'] === 'GET' ) {
        require_once  __DIR__ .'/../formulario.php';
    } elseif($_SERVER ['REQUEST_METHOD'] === 'POST'){
        require_once  __DIR__ .'/../novo-video.php';
    }
}  else if($_SERVER['PATH_INFO'] === '/editar-video' ){
    if ($_SERVER ['REQUEST_METHOD'] === 'GET' ) {
        require_once  __DIR__ .'/../formulario.php';
    } elseif($_SERVER ['REQUEST_METHOD'] === 'POST'){
        require_once  __DIR__ . '/../editar-video.php';
    }
}elseif($_SERVER['PATH_INFO'] === '/remover-video'){
        require_once  __DIR__ . '/../excluir-video.php';
}else{
http_response_code(404);
}
?>