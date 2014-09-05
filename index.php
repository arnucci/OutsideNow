<?php

require_once 'vendor/autoload.php';

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client();

$client->getClient()->setUserAgent('Mozilla/5.0 (X11; U; Linux i686; fr; rv:1.9b5) Gecko/2008041514 Firefox/3.0b5');

switch ($argv[1]) {

 case 'index.php':
     require_once 'spiders/marseille-espace_julien.php';
     break;

 case 'index2.php':
     require_once 'spiders/marseille-poste_a_galene.php';
     break;

 case 'index3.php':
     require_once 'spiders/marseille-silo.php';
     break;
 }