<?php
    /**
     * Created by PhpStorm.
     * User: admin
     * Date: 07.08.2016
     * Time: 13:54
     */

    //Main routes

    $app->get('/', function ($request, $response, $args) {
        $this->logger->addInfo("Welcome - run:)");
        $response->write('Main page.');
        return $response;
    });
    $app->get('/hello[/{name}]', function ($request, $response, $args) {
        $response->write("Hello, " . $args['name']);
        return $response;
    })->setArgument('name', 'World!');


    $app->get('/getCi', '\MyController:method1');

    $app->get('/test', function ($response) {

        return var_dump($this->db);

    });