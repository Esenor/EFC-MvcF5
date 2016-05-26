<?php

namespace model\entity;

/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
class Friend
{
    /**
     * @var string
     */
    private $name;

    /**
     * Friend constructor.
     *
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
