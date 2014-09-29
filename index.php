<?php
require_once 'vendor/autoload.php';

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Finder\Finder;

$client = new Client();

$client->getClient()->setUserAgent('Mozilla/5.0 (X11; U; Linux i686; fr; rv:1.9b5) Gecko/2008041514 Firefox/3.0b5');

$finder = new Finder();
$finder->files()->name('*'.$argv[1].'*')->in('spiders/');

$eventArray = array();

foreach ($finder as $file) {

    require 'spiders/'.$file->getRelativePathname();
}

var_dump($eventArray);