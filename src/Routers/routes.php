<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07.08.2016
 * Time: 13:54
 */

//Main routes
//todo: удалить
use Entitys\PostEntity;
use Models\PostModel\PostModel;
use Psr\Http\Message\RequestInterface as Request;
use Slim\Http\Response;


//use Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function (Request $request, Response $response) {
    $this->logger->addInfo("Welcome - run:)");
    return $this->view->render($response, 'index.phtml');
});
$app->get('/hello[/{name}]', function ($request, Response $response, $args) {
    $response->write("Hello, " . $args['name']);
    return $response;
})->setArgument('name', 'World!');


$app->get('/getPosts', PostsController::class . ':getAll');


$app->post('/createPost', function (\Slim\Http\Request $request, Response $response) {
    var_dump($request->getParsedBody());
    $model = new PostModel($this->db);
    $model->doInsert(new PostEntity($request->getParsedBody()));
});

$app->get('/test', function ($response) {

    var_dump($this->db);

});