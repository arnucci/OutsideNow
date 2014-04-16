<?php

require_once 'goutte.phar';

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client();

$client->getClient()->setUserAgent('Mozilla/5.0 (X11; U; Linux i686; fr; rv:1.9b5) Gecko/2008041514 Firefox/3.0b5');


$crawler = $client->request('GET', 'http://www.espace-julien.com/fr/affiche');

//le programme est contenu dans des tables. Un table par mois.
$raws = $crawler->filter('div.affiche > table > tr > td')->each(function (Crawler $node, $i) {
    return $node->html();
});

$i = 0;
foreach ($raws as $raw) {

    print_r($raw);
    print "\n\n$i\n\n";
    $i++;
}


