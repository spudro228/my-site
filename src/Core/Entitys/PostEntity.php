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

        if (isset($data['id'])) {

            $this->id = $data['id'];
            $this->title = $data['title'];
            $this->text = $data['text'];
            $this->topic = $data['topic'];
            $this->date_creation = $data['data_creation'];
            //$this->post_parent = $data['post_parent'];
            //$this->user = $data['user_name'];
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

    public function getTopic(){
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
        $_property = $this->data[$property];
        return (property_exists($_property)) ? $_property : 'Property not exist';
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