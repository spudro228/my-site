<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 12.08.2016
 * Time: 22:09
 */

namespace Models;


use Entitys\Entity;

abstract class Mapper
{

    protected static $db;

    /**
     * Mapper constructor.
     * @param $db \PDO
     */
    //todo:: переписать все под static метод
    public function __construct($db)
    {
        self::$db = $db;
    }

    protected function findById()
    {
    }

    protected function update()
    {
    }

    protected abstract function doCreateObject();

    protected function doInsert(){

    }

    /**
     *
     * @return mixed - sql prepare Statements
     */
    protected abstract function selectStmt();

}