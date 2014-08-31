<?php
$crawler = $client->request('GET', 'http://www.leposteagalene.com/pages/programme.html');

//le programme est contenu dans des tables. Un table par mois.
$nodes = $crawler->filter('div#MEP-faux2PG-coldroite')->each(function ($node) {
    return $node;
    });

 $eventArray = array();
 $i = 0;

 foreach ($nodes as $node) {

     $eventArray[$i]['date']  = $node->filter('.TXT-Date')->text();

     try {     
         $eventArray[$i]['group'] = $node->filter('.TXT-Groupe')->text();

     }         catch (Exception $e) {

             $eventArray[$i]['group'] ='coucou';
         }

     
     $eventArray[$i]['hour']  = substr($node->filter('.TXT-Horaire-Tarif')->text(), 1, strpos($node->filter('.TXT-Horaire-Tarif')->text(), '~') -2);
     $eventArray[$i]['price'] = substr($node->filter('.TXT-Horaire-Tarif')->text(), strpos($node->filter('.TXT-Horaire-Tarif')->text(), '~') + 2);
     $eventArray[$i]['link']  = 'http://www.leposteagalene.com/pages/programme.html';

     $i++;
 }

 var_dump($eventArray);
