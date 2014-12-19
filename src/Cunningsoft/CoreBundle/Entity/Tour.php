<?php

namespace Cunningsoft\CoreBundle\Entity;

use Cunningsoft\CoreBundle\Entity\StatusType\Down;
use Cunningsoft\CoreBundle\Entity\StatusType\Up;
use Doctrine\Common\Collections\ArrayCollection;

class Tour
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var ArrayCollection|Service[]
     */
    private $services;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->services = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Service $service
     */
    public function addService(Service $service)
    {
        $this->services->add($service);
    }

    /**
     * @return Service[]
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @param $name
     * @param \stdClass $response
     *
     * @return Tour
     */
    static public function createByApiResponse($name, \stdClass $response)
    {
        $tour = new Tour($name);
        foreach ($response as $serviceName => $isUp) {
            $status = new Status($isUp ? new Up() : new Down());
            $service = new Service($serviceName, $status);
            $tour->addService($service);
        }

        return $tour;
    }
}
