<?php

// Добавляем зависомости
//Add dependency


use Slim\Views\PhpRenderer;
use Symfony\Component\Validator\Validation;

$container = $app->getContainer();

/** Теперь с помошью $this->logger->addInfo("...");
 * из любого места могу писать в логг
 * @return \Monolog\Logger
 */
/** Now i can write into log
 * with help $this->logger->addInfo("...");
 * @return \Monolog\Logger
 */
$container['logger'] = function ($c) {

    $log = $c['settings']['logger'];
    $logger = new Monolog\Logger($log['name']);
    $file_handler = new Monolog\Handler\StreamHandler($log['path'], $log['level']); //"../logs/app.log"
    return $logger->pushHandler($file_handler);
};

/**
 * @param \Interop\Container\ContainerInterface $c
 *
 * @return PDO
 * @throws PDOException - can't work. I don't know why:(
 */
$container['db'] = function ($c) {
    /**
     * The classic style.
     */
    //        $db = $c['settings']['db'];
    //        $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'],
    //            $db['user'], $db['pass']);
    //        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    /**
     * my cool young style, yo!
     */
    $db = $c['settings']['db'];

    return
        new PDO(
            "mysql:host={$db['host']};dbname={$db['dbname']}",
            $db['user'],
            $db['pass'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
};

$container['validator'] = Validation::createValidatorBuilder()
    ->addYamlMapping(function ($pathsArray) {
        return ;
    })
    ->getValidator();

$container['view'] = new PhpRenderer($container['settings']['renderer']['template_path']);



