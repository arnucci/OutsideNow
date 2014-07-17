<?php

require_once 'vendor/autoload.php';

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client();

$client->getClient()->setUserAgent('Mozilla/5.0 (X11; U; Linux i686; fr; rv:1.9b5) Gecko/2008041514 Firefox/3.0b5');


$crawler = $client->request('GET', 'http://www.espace-julien.com/fr/affiche');

//le programme est contenu dans des tables. Un table par mois.
$nodes = $crawler->filter('div.affiche > table > tr')->each(function($node, $i) {
        return $node;
    });

foreach ($nodes as $node) {

    $test = $node->reduce(function($node) {

            var_dump($node);
            return $node->filter('h1');
        });
    
}
