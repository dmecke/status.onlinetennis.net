<?php

namespace Cunningsoft\CoreBundle\Controller;

use Cunningsoft\CoreBundle\Entity\Tour;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @return array
     *
     * @Route("/")
     * @Template
     */
    public function indexAction()
    {
        return array(
            'classicTour' => Tour::createByApiResponse('Classic Tour', $this->get('api')->status('http://www.onlinetennis.net')),
            'speedTour' => Tour::createByApiResponse('Speed Tour', $this->get('api')->status('http://speed.onlinetennis.net')),
        );
    }
}
