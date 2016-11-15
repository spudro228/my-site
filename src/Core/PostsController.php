<?php

use Interop\Container\ContainerInterface;

use Models\PostModel\PostModel;

class PostsController
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
    public function getAll($request, $response, $args)
    {

        return $this->ci->get('view')->render($response, 'allposts.phtml', ['posts' => $this->model->getPosts()]);
    }

}
