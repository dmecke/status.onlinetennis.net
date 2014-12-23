<?php

namespace Cunningsoft\CoreBundle\Entity\Tour;

use Cunningsoft\CoreBundle\Entity\Service\Factory as ServiceFactory;

class Factory
{
    /**
     * @var Repository
     */
    private $repository;

    /**
     * @var ServiceFactory
     */
    private $serviceFactory;

    /**
     * @param Repository $repository
     * @param ServiceFactory $serviceFactory
     */
    public function __construct(Repository $repository, ServiceFactory $serviceFactory)
    {
        $this->repository = $repository;
        $this->serviceFactory = $serviceFactory;
    }

    /**
     * @param $name
     * @param \stdClass $response
     *
     * @return Tour
     */
    public function createByApiResponse($name, \stdClass $response)
    {
        /** @var Tour $tour */
        $tour = $this->repository->findOrCreate(array('name' => $name), new Tour($name));

        foreach ($response as $serviceName => $v) {
            $service = $this->serviceFactory->create($tour, $serviceName, $v);
            $tour->addService($service);
        }

        return $tour;
    }
}
