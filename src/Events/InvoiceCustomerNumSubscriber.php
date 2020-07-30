<?php

namespace App\Events;

use App\Entity\InvoiceCustomer;
use App\Repository\InvoiceCustomerRepository;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;

class InvoiceCustomerNumSubscriber implements EventSubscriberInterface {

    private $security;
    private $repository;

    public function __construct(Security $security, InvoiceCustomerRepository $repository)
    {
        $this->security = $security;
        $this->repository = $repository;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['setNumForInvoiceCustomer', EventPriorities::PRE_VALIDATE]
        ];
    }

    public function setNumForInvoiceCustomer(ViewEvent $event)
    {
        // utilisateur connecté (Security)
        // repository des factures clients
        // récupérer la dernière facture insérée (20201001)
        // incrémenter le numéro de facture par rapport à la dernière
        // dans le invoiceCustomerRepository avec la fonction findNextNum
        $user = $this->security->getUser();
       

        $invoice = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if($invoice instanceof InvoiceCustomer && $method === "POST"){
            $nextNum = $this->repository->findNextNum($user);
            $invoice->setInvoiceCustomerNum($nextNum);
        // automatisation de la date du jour
            if(empty($invoice->getInvoiceCustomerSentAt())){
                $invoice->setInvoiceCustomerSentAt(new \DateTime());
            }
        }



        
     }
}