<?php

namespace Cunningsoft\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StatusUpdateCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('status:update');
        $this->setDescription('Updates the status of all services');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $factory = $this->getContainer()->get('factory.tour');

        $factory->createByApiResponse('Classic Tour', $this->getContainer()->get('api')->status('http://www.onlinetennis.net'));
        $factory->createByApiResponse('Speed Tour', $this->getContainer()->get('api')->status('http://speed.onlinetennis.net'));

        $this->getContainer()->get('doctrine.orm.entity_manager')->flush();
    }
}
