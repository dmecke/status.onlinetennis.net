<?php

namespace Cunningsoft\CoreBundle\Entity\Tour;

use Cunningsoft\CoreBundle\Entity\Service\Service;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Repository")
 */
class Tour
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var ArrayCollection|Service[]
     *
     * @ORM\OneToMany(targetEntity="Cunningsoft\CoreBundle\Entity\Service\Service", mappedBy="tour")
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
}
