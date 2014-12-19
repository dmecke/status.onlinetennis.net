<?php

namespace Cunningsoft\CoreBundle\Entity;

use Cunningsoft\CoreBundle\Entity\StatusType\StatusTypeInterface;

class Status
{
    /**
     * @var StatusTypeInterface
     */
    private $type;

    /**
     * @param StatusTypeInterface $type
     */
    public function __construct(StatusTypeInterface $type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
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
}
