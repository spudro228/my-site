<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07.08.2016
 * Time: 13:54
 */

//Main routes

use Entitys\PostEntity;
//use Illuminate\Validation\Validator;
use Models\PostModel\PostModel;
use Psr\Http\Message\ServerRequestInterface as Request;
//use Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Validation\Factory as Validator;
use Slim\Http\Response;
use Symfony\Component\Translation\Translator;


$app->get('/', function (Request $request, Response $response) {
    $this->logger->addInfo("Welcome - run:)");
    return $this->view->render($response, 'index.phtml');
});
$app->get('/hello[/{name}]', function (Request $request, Response $response, $args) {
    $response->write("Hello, " . $args['name']);
    return $response;
})->setArgument('name', 'World!');


$app->get('/getPosts', PostsController::class . ':getAll');


$app->post('/createPost', function (Request $request, Response $response) use ($app) {
    //var_dump($request->getAttributes());
    //var_dump($request->getParsedBody());
    //$val = new Validators(null, $this);
    //TODO: валидатор заработал . теперь нужно его поместить в контейнер и сделать вывод " неправильно заполнена форма"
    $val = new Validator(new Translator('ru'));

    $v = $val->make($request->getParsedBody(),
        ['title' => 'required|max:5']
    );
    var_dump($v->fails());
    if (!$v->fails())
    {
        return $response->withRedirect('/getPosts');
    }
    $model = new PostModel($this->db);
    //var_dump($request->getParsedBody());
    $data = new PostEntity($request->getParsedBody());
    //var_dump($data);
    $model->doInsert($data);
    //return $response->withRedirect('/getPosts');
});

$app->get('/test', function ($response) {

    var_dump($this->db);

});