<?php

namespace Cunningsoft\CoreBundle\Entity\StatusType;

class Down implements StatusTypeInterface
{
    /**
     * @return string
     */
    public function getStatus()
    {
        return 'danger';
    }

    /**
     * @return string
     */
    public function getGlyphicon()
    {
        return 'warning-sign';
    }
}
