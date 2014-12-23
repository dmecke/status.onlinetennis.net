<?php

namespace Cunningsoft\CoreBundle\Controller;

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
            'classicTour' => $this->get('doctrine.orm.entity_manager')->getRepository('CoreBundle:Tour\Tour')->findOneBy(array('name' => 'Classic Tour')),
            'speedTour' => $this->get('doctrine.orm.entity_manager')->getRepository('CoreBundle:Tour\Tour')->findOneBy(array('name' => 'Speed Tour')),
        );
    }
}
