<?php

require_once 'goutte.phar';

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client();

$client->getClient()->setUserAgent('Mozilla/5.0 (X11; U; Linux i686; fr; rv:1.9b5) Gecko/2008041514 Firefox/3.0b5');


$crawler = $client->request('GET', 'http://www.leposteagalene.com/pages/programme.html');

//le programme est contenu dans des tables. Un table par mois.
$nodes = $crawler->filter('div#MEP-faux2PG-coldroite')->each(function ($node) {
    return $node->html();
    });


var_dump($nodes);

$count = count($nodes);
echo $count;