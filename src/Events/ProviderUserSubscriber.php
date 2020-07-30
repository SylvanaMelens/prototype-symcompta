<?php

namespace App\Events;

use App\Entity\Provider;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ProviderUserSubscriber implements EventSubscriberInterface 
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['setUserForProvider', EventPriorities::PRE_VALIDATE]
        ];
    }

    public function setUserForProvider(ViewEvent $event){
        $provider = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();
        // dd($provider);

        if ($provider instanceof Provider && $method === 'POST'){
        // récupérer l'user connecté
            $user = $this->security->getUser();
        // assigner l'user au Provider créé
            $provider->setUser($user);
            
        }
    }

}