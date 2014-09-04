<?php
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
