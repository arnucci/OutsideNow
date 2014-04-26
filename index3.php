<?php
//pour crawler le site du silo

require_once 'goutte.phar';

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client();

$client->getClient()->setUserAgent('Mozilla/5.0 (X11; U; Linux i686; fr; rv:1.9b5) Gecko/2008041514 Firefox/3.0b5');


$crawler = $client->request('GET', 'http://www.silo-marseille.fr');

$nodes = $crawler->filter('#tabListe > tbody > tr')->each(function ($node) {
    return $node;
});

foreach ($nodes as $node) {

var_dump($node->text());

}
