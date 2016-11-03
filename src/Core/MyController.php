<?php

    use Interop\Container\ContainerInterface;

    use Models\PostModel\PostModel;

    class MyController
    {
        protected $ci;
        protected $model;

        /**
         * MyController constructor.
         *
         * @param ContainerInterface $ci
         */
        public function __construct(ContainerInterface $ci)
        {
            $this->ci = $ci;
            $this->model = new PostModel($this->ci->db);

        }

        /**
         * test method
         *
         * @param $request
         * @param $response
         * @param $args
         *
         * @return mixed - rendered page
         */
        public function method1($request, $response, $args)
        {
            //            foreach ($this->var->getPosts() as $key => $value) {
            //                echo "<tr><td>{$key}</td><td>{$value}</td></tr></br>";
            //            }
            //            $debug = var_dump($this->var->getPosts());
            //
            //            $this->ci->logger->addInfo('MyController!');
            //            return $response->write("Hello!");

            return $this->ci->get('view')->render($response, 'index.phtml', ['posts' => $this->model->getPosts()]);
        }

    }
