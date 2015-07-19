<?php

namespace OutsideNow\EventBundle\Command;

use Goutte\Client;
use Symfony\Component\Finder\Finder;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CrawlCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('outsidenow:crawl')
            ->setDescription('Import data')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $client = new Client();

        $finder = new Finder();
        $finder->files()->in('src/OutsideNow/EventBundle/Spiders/');

        $eventArray = array();

        foreach ($finder as $file) {

            require 'src/OutsideNow/EventBundle/Spiders/'.$file->getRelativePathname();
        }

        var_dump($eventArray);
    }
}
