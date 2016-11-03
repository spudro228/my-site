<?php
    /**
     * Created by PhpStorm.
     * User: admin
     * Date: 12.08.2016
     * Time: 22:09
     */

    namespace Models;


    abstract class Mapper
    {
        protected $db;
        public function __construct($db)
        {
            $this->db = $db;
        }

        protected abstract function update();
        protected abstract function insert();
    }