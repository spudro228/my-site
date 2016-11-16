<?php

namespace Entitys;


class PostEntity implements Entity
{
    protected $id;
    protected $title;
    protected $text;
    protected $date_creation;
    protected $topic;
    protected $post_parent;
    protected $author;


    /**
     * PostEntity constructor.
     *
     * Accept an array data from model of data
     * and matching properties
     * data<->entity
     *
     * @param array|\Generator $data
     */
    public function __construct($data)
    {

        $setProperty = function ($field_name) use ($data) {
            return (isset($data[$field_name])) ? $data[$field_name] : null;
        };


        $this->id = $setProperty('title');
        $this->title = $setProperty('title');
        $this->text = $setProperty('text');
        $this->topic = $setProperty('topic');
        $this->date_creation = $setProperty('data_creation');
        $this->post_parent = $setProperty('post_parent');
        $this->author = $setProperty('autor');


    }


    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * @return mixed
     */
    public function getPostParent()
    {
        return $this->post_parent;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * To easy handling property.
     *
     * @param $property
     *
     * @internal param $property - property name for handling
     * @return mixed|string
     */
    function __get($property)
    {


        return (property_exists($this, $property)) ? $this->$property : 'Property not exist';
    }

    /**
     * To easy check is property set?
     * @param $property
     *
     * @return bool
     */
    function __isset($property)
    {
        //TODO: Implement __isset() method IN PostEntity.
        //create function name
        //$method = "get{$property}";
        //check that method exist
        //return (property_exists())
    }

    /**
     * To easy check is property unset?
     * @param $property
     *
     * @return bool
     */
    function __unset($property)
    {
        //create function name
        $method = "get{$property}";
        //check that method exist donn't exist
        return method_exists($this, $method);
    }


}