<?php

namespace Cunningsoft\CoreBundle\Entity\Service;

use Cunningsoft\CoreBundle\Entity\Status\Factory as StatusFactory;
use Cunningsoft\CoreBundle\Entity\Tour\Tour;

class Factory
{
    /**
     * @var Repository
     */
    private $repository;

    /**
     * @var StatusFactory
     */
    private $statusFactory;

    /**
     * @param Repository $repository
     * @param StatusFactory $statusFactory
     */
    public function __construct(Repository $repository, StatusFactory $statusFactory)
    {
        $this->repository = $repository;
        $this->statusFactory = $statusFactory;
    }

    /**
     * @param Tour $tour
     * @param string $name
     * @param bool|array $value
     *
     * @return Service
     */
    public function create(Tour $tour, $name, $value)
    {
        /** @var Service $service */
        $service = $this->repository->findOrCreate(array('tour' => $tour, 'name' => $name), new Service($tour, $name));

        $this->statusFactory->create($service, $value);

        return $service;
    }
}
