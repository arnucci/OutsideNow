<?php
//pour crawler le site du silo
require_once 'vendor/autoload.php';

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client();

$client->getClient()->setUserAgent('Mozilla/5.0 (X11; U; Linux i686; fr; rv:1.9b5) Gecko/2008041514 Firefox/3.0b5');


$crawler = $client->request('GET', 'http://www.silo-marseille.fr');

$nodes = $crawler->filter('#tabListe > tbody > tr')->each(function ($node) {
    return $node;
});

$eventArray = array();
$i = 0;

foreach ($nodes as $node) {

    try {

        $eventArray[$i]['date']  = $node->filter('.date')->text();
        $eventArray[$i]['group'] = trim($node->filter('.titre')->text());
        $eventArray[$i]['heure'] = $node->filter('.heure')->text();
        $eventArray[$i]['price'] = trim($node->filter('.tarifs')->text());
        $eventArray[$i]['link']  = 'http://www.silo-marseille.fr'.$node->filter('.titre > a')->attr('href');

        $i++;

    } catch (Exception $e) {

        continue;
    }
}

var_dump($eventArray);

