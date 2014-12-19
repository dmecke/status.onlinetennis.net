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
     * @var array
     */
    private $additionalInfo = array();

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

    /**
     * @return array
     */
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    /**
     * @return bool
     */
    public function hasAdditionalInfo()
    {
        return !empty($this->additionalInfo);
    }

    /**
     * @param array $additionalInfo
     */
    public function setAdditionalInfo(array $additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;
    }
}
