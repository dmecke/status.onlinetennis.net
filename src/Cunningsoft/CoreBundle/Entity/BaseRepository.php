<?php

namespace Cunningsoft\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

class BaseRepository extends EntityRepository
{
    /**
     * @param array $criteria
     * @param object $entityToCreate
     *
     * @return object
     */
    public function findOrCreate(array $criteria, $entityToCreate)
    {
        $entity = $this->findOneBy($criteria);
        if (empty($entity)) {
            $entity = $entityToCreate;
            $this->_em->persist($entity);
            $this->_em->flush();
        }

        return $entity;

    }
}
