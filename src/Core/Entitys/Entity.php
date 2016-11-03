<?php


    namespace Entitys;


    interface Entity
    {
        /**
         * @param $name
         *
         * @return mixed
         */
        function __get($name);
        function __isset($property);
        function __unset($name);



    }