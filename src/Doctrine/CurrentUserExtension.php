<?php

namespace App\Doctrine;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use Doctrine\ORM\QueryBuilder;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use App\Entity\Customer;
use App\Entity\InvoiceCustomer;
use App\Entity\InvoiceProvider;
use App\Entity\Provider;
use App\Entity\User;
use App\Entity\VatDeclaration;
use App\Entity\VatRate;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Security;

class CurrentUserExtension implements QueryCollectionExtensionInterface, QueryItemExtensionInterface
{
    private $security;
    private $auth;

    public function __construct(Security $security, AuthorizationCheckerInterface $checker)
    {
        $this->security = $security;
        $this->auth = $checker;
    }
    
    private function addWhere(QueryBuilder $queryBuilder, string $resourceClass){
    // 1. OBTENTION DE L USER CONNECTE
    $user = $this->security->getUser();

    // 2. LORS DE LA DEMANDE D INVOICE OU INTERVENANTS -> TENIR COMPTE DE L USER CONNECTE 
    // VERIFIER QU IL N EST PAS ADMIN ET QU IL EST CONNECTE
    if (($resourceClass === Customer::class || InvoiceCustomer::class || InvoiceProvider::class || Provider::class || VatDeclaration::class || VatRate::class) && !$this->auth->isGranted('ROLE_ADMIN') && $user instanceof User) {
        $rootAlias = $queryBuilder->getRootAliases()[0];

        if ($resourceClass === Customer::class) {

            $queryBuilder->andWhere("$rootAlias.user = :user");
        } else if ($resourceClass === Provider::class) {
            $queryBuilder->andWhere("$rootAlias.user = :user");
        } else if ($resourceClass === InvoiceCustomer::class) {
            $queryBuilder->join("$rootAlias.invoiceCustomerClient", "c")
                ->andWhere("c.user = :user");
        } else if ($resourceClass === InvoiceProvider::class) {
            $queryBuilder->join("$rootAlias.invoiceProviderName", "p")
                ->andWhere("p.user = :user");
        }

        $queryBuilder->setParameter("user", $user);
    }
}
    
    public function applyToCollection(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, ?string $operationName = null)
    {
        $this->addWhere($queryBuilder, $resourceClass);
    }

    public function applyToItem(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, array $identifiers, ?string $operationName = null, array $context = [])
    {
        $this->addWhere($queryBuilder, $resourceClass);
    }
}
