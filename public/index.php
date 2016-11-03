<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    require __DIR__ . '/../vendor/autoload.php';

    /**
     * автозагрузчик для моих классов
     * autoloader for my Core
     */
    spl_autoload_register(function ($classname) {
        require('../src/Core/' . $classname . '.php');
    });

    //todo: вынести в отдельный файл настроек
    $config['displayErrorDetails'] = true;
    $config['db']['host']   = 'localhost';
    $config['db']['user']   = 'root';
    $config['db']['pass']   = '';
    $config['db']['dbname'] = 'mydb';


    $app = new \Slim\App(["settings" => $config]);

    require __DIR__ . '/../src/dependencies.php';

    require __DIR__ . '/../src/Routers/routes.php';


    $app->run();


?>
