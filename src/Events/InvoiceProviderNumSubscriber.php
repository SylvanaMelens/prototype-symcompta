<?php

namespace App\Events;

use App\Entity\Invoiceprovider;
use App\Repository\InvoiceProviderRepository;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class InvoiceProviderNumSubscriber implements EventSubscriberInterface {

    private $security;
    private $repository;

    public function __construct(Security $security, InvoiceProviderRepository $repository)
    {
        $this->security = $security;
        $this->repository = $repository;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['setNumForInvoiceProvider', EventPriorities::PRE_VALIDATE]
        ];
    }

    public function setNumForInvoiceProvider(ViewEvent $event)
    {
        // utilisateur connecté (Security)
        // repository des factures fournisseurs
        // récupérer la dernière facture insérée (20201002)
        // incrémenter le numéro de facture par rapport à la dernière
        // dans le invoiceCustomerRepository avec la fonction findNextNum
        $user = $this->security->getUser();
       

        $invoice = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if($invoice instanceof InvoiceProvider && $method === "POST"){
            $nextNum = $this->repository->findNextNum($user);
            $invoice->setInvoiceProviderNum($nextNum);
        // automatisation de la date du jour
            if(empty($invoice->getInvoiceProviderDate())){
                $invoice->setInvoiceProviderDate(new \DateTime());
            }
        }



        
     }
}