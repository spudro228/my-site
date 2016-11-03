<?php

    namespace Entitys;



    class PostEntity implements Entity
    {
        protected $id;
        protected $title;
        protected $text;
        protected $date_creation;
        //protected $topic;
        //protected $date_change
        protected $post_parent;
        protected $user;
        /**
         * @var array
         */
        private $data;

        /**
         * PostEntity constructor.
         *
         * Accept an array data from data model
         * and matching properties  data<->entity
         *
         * @param array $data
         */
        public function __construct(array $data)
        {
            //$data .= iterator_to_array($data,true);

            if (isset($data['id'])) {

                $this->id = $data['id'];
                $this->title = $data['title'];
                $this->text = $data['text'];
                $this->date_creation = $data['date_creation'];
                $this->post_parent = $data['post_parent'];
                $this->user = $data['user_name'];
            }

        }


        /**
         * @return integer
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @return mixed
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @return mixed
         */
        public function getText()
        {
            return $this->text;
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


        //todo: implement these magic methods in abstract class
        //this's don't work
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
            //create function name
            $method = "get{$property}";
            //check that method exist and call him
            (method_exists($this, $method)) ? $this->$method() : "Property {$property} doesn't exist.";

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
            $method = "get{$property}";
            //check that method exist
            return method_exists($this, $method);
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