<?php

namespace Cunningsoft\CoreBundle\Entity;

class Service
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Status
     */
    private $status;

    /**
     * @param string $name
     * @param Status $status
     */
    public function __construct($name, Status $status)
    {
        $this->name = $name;
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Status
     */
    public function getStatus()
    {
        return $this->status;
    }
}
