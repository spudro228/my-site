<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 12.08.2016
 * Time: 22:57
 */

namespace Models\PostModel;


use Models\Mapper;
use Entitys\PostEntity;

class PostModel extends Mapper
{


    //todo: оптимизировать запрос убрав лишние колонки
    /**
     * @return array
     */
    public
    function getPosts()
    {
        /*
         *
         $sql_query =
            'SELECT
                                p.id,
                                p.title,
                                p.text,
                                p.date_creation,
                                t.topic_name AS topic,
                                p.post_parent_id AS post_parent,
                                u.username AS user_name
                            FROM
                                post p
                                JOIN user u ON (p.user_id = u.id)
                                JOIN topic t ON (p.topic_id = t.id);
            ';
        */
        $sql_query = 'SELECT p.id, p.title, p.text, p.topic, data_creation FROM post p;';


        //todo: описать это все

        $stmt = self::$db->query($sql_query);
        /*$results = [];
        while ($row = $stmt->fetch()) {
            $results[] = new PostEntity($row);
        }
        return $results;*/
        foreach ( $stmt as $item) {
            yield new PostEntity($item);
        }


    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function doInsert()
    {
        // TODO: Implement insert() method.
    }

    protected function doCreateObject()
    {
        // TODO: Implement doCreateObject() method.
    }

    /**
     *
     * @return mixed - sql prepare Statements
     */
    protected function selectStmt()
    {
        // TODO: Implement selectStmt() method.
    }
}