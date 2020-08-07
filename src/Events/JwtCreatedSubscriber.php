<?php

namespace App\Events;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;

class JwtCreatedSubscriber
{
    public function updateJwtData(JWTCreatedEvent $event)
    {
        // 1. RECUPERE L USER POUR AVOIR SON NOM  ET SON PRENOM 
        $user = $event->getUser();
        // 2. ENRICHIR LES DATAS POUR QU ELLES CONTIENNENT CES DONNEES 
        $data = $event->getData();
        $data['userFirstName'] = $user->getUserFirstName();
        $data['userLastName'] = $user->getUserLastName();

        $event->setData($data);
    }
}
