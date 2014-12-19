<?php

namespace Cunningsoft\CoreBundle\Entity\StatusType;

class Up implements StatusTypeInterface
{
    /**
     * @return string
     */
    public function getStatus()
    {
        return 'success';
    }

    /**
     * @return string
     */
    public function getGlyphicon()
    {
        return 'ok';
    }
}
