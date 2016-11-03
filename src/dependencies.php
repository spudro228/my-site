<?php

    // Добавляем зависомости
    //Add dependency
    //use Slim\Views\PhpRenderer;


    use Slim\Views\PhpRenderer;

    $container = $app->getContainer();

    /** Теперь с помошью $this->logger->addInfo("...");
     * из любого места могу писать в логг
     * @return \Monolog\Logger
     */
    /** Now i can write into log
     * with help $this->logger->addInfo("...");
     * @return \Monolog\Logger
     */
    $container['logger'] = function () {
        $logger = new Monolog\Logger('my_logger');
        $file_handler = new Monolog\Handler\StreamHandler("../logs/app.log");
        $logger->pushHandler($file_handler);
        return $logger;
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

    $container['view'] = new PhpRenderer(__DIR__ . "/templates/");



