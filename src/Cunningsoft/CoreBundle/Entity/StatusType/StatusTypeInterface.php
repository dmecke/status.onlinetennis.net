<?php

namespace Cunningsoft\CoreBundle\Entity\StatusType;

interface StatusTypeInterface
{
    /**
     * @return string
     */
    public function getStatus();

    /**
     * @return string
     */
    public function getGlyphicon();
}
