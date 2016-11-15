<?php

namespace Entitys;


class PostEntity implements Entity
{
    protected $id;
    protected $title;
    protected $text;
    protected $date_creation;
    protected $topic;
    //protected $date_change
    protected $post_parent;
    protected $user;

    /**
     * @var array
     */
    //private $data;

    /**
     * PostEntity constructor.
     *
     * Accept an array data from data model
     * and matching properties  data<->entity
     *
     * @param array $data
     */
    //todo: определить тип заглушку , только ля итерируемых
    public function __construct($data)
    {
        //$data .= iterator_to_array($data,true);

        /*if (isset($data['id'])) {


        }*/

        $setProperty = function ($field_name) use ($data)
        {
            //todo: поменять none
            return (isset($data[$field_name])) ? $data[$field_name] : "none";
        };

        if (isset($data['id'])) {
            $this->id = $setProperty('title');
            $this->title = $setProperty('title');
            $this->text = $setProperty('text');
            $this->topic = $setProperty('topic');
            $this->date_creation = $setProperty('data_creation');
            $this->post_parent = $setProperty('post_parent');
            $this->user = $setProperty('user_name');
        }

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
    public function getUser()
    {
        return $this->user;
    }

    // todo:: check, how to work
    /**
     * To easy handling property.
     *
     * @param $property
     *
     * @internal param $name - property name for handling
     * @return mixed|void
     */
    function __get($property)
    {
        /*
        //create function name
        $method = "get{$property}";
        //check that method exist and call him
        return (method_exists($this, $method)) ? $this->$method() : "Property {$property} doesn't exist.";
        */

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