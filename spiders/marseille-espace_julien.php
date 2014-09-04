<?php
$crawler = $client->request('GET', 'http://www.espace-julien.com/fr/affiche');

//le programme est contenu dans des tables. Un table par mois.
$nodes = $crawler->filter('div.affiche > table > tr')->each(function($node) {
        return $node;
    });

 $eventArray = array();
 $i = 0;


foreach ($nodes as $node) {

    // $toto[] = $node->reduce(function($node) {

    //         //            var_dump($node);
             
    //        return $node->filter('h1');
    //     });
    $eventArray[$i] = $node->reduce(function($node) {

            //     var_dump($node);
             
           return $node->filter('h1');
        });

    $i++;
}


print_r($eventArray);