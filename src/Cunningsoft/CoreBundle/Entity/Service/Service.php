<?php

namespace Cunningsoft\CoreBundle\Entity\Service;

use Cunningsoft\CoreBundle\Entity\Status\Status;
use Cunningsoft\CoreBundle\Entity\Tour\Tour;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Repository")
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(columns={"tour_id","name"})})
 */
class Service
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
     * @var Tour
     *
     * @ORM\ManyToOne(targetEntity="Cunningsoft\CoreBundle\Entity\Tour\Tour", inversedBy="services")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tour;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var ArrayCollection|Status[]
     *
     * @ORM\OneToMany(targetEntity="Cunningsoft\CoreBundle\Entity\Status\Status", mappedBy="service")
     */
    private $statuses;

    /**
     * @param Tour $tour
     * @param string $name
     */
    public function __construct(Tour $tour, $name)
    {
        $this->tour = $tour;
        $this->name = $name;
        $this->statuses = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return \Cunningsoft\CoreBundle\Entity\Status\Status[]
     */
    public function getStatuses()
    {
        return $this->statuses;
    }

    /**
     * @return Status
     */
    public function getLatestStatus()
    {
        /** @var Status $latestStatus */
        $latestStatus = null;

        foreach ($this->statuses as $status) {
            if (null === $latestStatus || $status->getInsertDate() > $latestStatus->getInsertDate()) {
                $latestStatus = $status;
            }
        }

        return $latestStatus;
    }

    /**
     * @param Status $status
     */
    public function addStatus(Status $status)
    {
        $this->statuses->add($status);
    }
}
