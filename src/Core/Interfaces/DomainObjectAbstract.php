<?php
/**
 * Created by Dmity Smolyakov.
 * User: spudro228
 * Date: 09.11.2016
 * Time: 22:28
 */

namespace Core\Interfaces;


class DomainObjectAbstract
{
    protected $id = null;

    public function __construct($id = null)
    {
        $this->id = $id;
    }


    /**
     * Get the ID of this Object
     * ( unique to the object type )
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     *
     * /**
     * @param $type - Type of Object collection
     * @return array
     */
    static function getCollection($type)
    {
        return [];
    }

    /**
     * @return array
     */
    function collection()
    {
        return self::getCollection(get_class($this));
    }
}