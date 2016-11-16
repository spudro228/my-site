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
use Slim\Http\Request as Request;
use Slim\Http\Response;

$app->get('/', function (Request $request, Response $response) {
    $this->logger->addInfo("Welcome - run:)");
    return $this->view->render($response, 'index.phtml');
});
$app->get('/hello[/{name}]', function (Request $request, Response $response, $args) {
    $response->write("Hello, " . $args['name']);
    return $response;
})->setArgument('name', 'World!');


$app->get('/getPosts', PostsController::class . ':getAll');


$app->post('/createPost', function (Psr\Http\Message\ServerRequestInterface $request, Response $response) use ($app) {
    //var_dump($request->getAttributes());
    //var_dump($request->getParsedBody()['text']);
    $model = new PostModel($this->db);
    var_dump($request->getParsedBody());
    $data = new PostEntity($request->getParsedBody());
    var_dump($data);
    $model->doInsert($data);
    //return $response->withRedirect('/getPosts');
});

$app->get('/test', function ($response) {

    var_dump($this->db);

});