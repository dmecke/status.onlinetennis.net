<?php

namespace Cunningsoft\CoreBundle\Entity\Status;

use Cunningsoft\CoreBundle\Entity\Service\Service;
use Cunningsoft\CoreBundle\Entity\StatusType\Down;
use Cunningsoft\CoreBundle\Entity\StatusType\Up;
use Doctrine\ORM\EntityManager;

class Factory
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param Service $service
     * @param bool|array $value
     *
     * @return Status
     */
    public function create(Service $service, $value)
    {
        $status = new Status($value === false ? new Down() : new Up());
        $status->setService($service);
        if (is_array($value)) {
            $status->setAdditionalInfo($value);
        }
        $this->entityManager->persist($status);

        return $status;
    }
}
