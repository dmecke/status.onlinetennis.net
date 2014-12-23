<?php

namespace Cunningsoft\CoreBundle\Entity\Status;

use Cunningsoft\CoreBundle\Entity\Service\Service;
use Cunningsoft\CoreBundle\Entity\StatusType\StatusTypeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Status
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
     * @var Service
     *
     * @ORM\ManyToOne(targetEntity="Cunningsoft\CoreBundle\Entity\Service\Service", inversedBy="statuses")
     */
    private $service;

    /**
     * @var StatusTypeInterface
     *
     * @ORM\Column(type="object")
     */
    private $type;

    /**
     * @var array
     *
     * @ORM\Column(type="array")
     */
    private $additionalInfo = array();

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $insertDate;

    /**
     * @param StatusTypeInterface $type
     */
    public function __construct(StatusTypeInterface $type)
    {
        $this->type = $type;
        $this->insertDate = new \DateTime();
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->type->getStatus();
    }

    /**
     * @return string
     */
    public function getGlyphicon()
    {
        return $this->type->getGlyphicon();
    }

    /**
     * @return StatusTypeInterface
     */
    public function getType()
    {
        return $this->type;
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

    /**
     * @param Service $service
     */
    public function setService(Service $service)
    {
        $this->service = $service;
        $service->addStatus($this);
    }

    /**
     * @param \DateTime $insertDate
     */
    public function setInsertDate(\DateTime $insertDate)
    {
        $this->insertDate = $insertDate;
    }

    /**
     * @return \DateTime
     */
    public function getInsertDate()
    {
        return $this->insertDate;
    }
}
