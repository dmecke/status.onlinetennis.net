<?php

namespace Cunningsoft\CoreBundle\Entity\StatusType;

class Unknown implements StatusTypeInterface
{
    /**
     * @return string
     */
    public function getStatus()
    {
        return 'warning';
    }

    /**
     * @return string
     */
    public function getGlyphicon()
    {
        return 'question-sign';
    }
}
