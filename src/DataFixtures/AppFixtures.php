<?php

namespace App\DataFixtures;

use App\Entity\InvoiceCustomer;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr_FR');

        $invoiceCNum = 2020001;

        for ($i = 0; $i < mt_rand(1, 5); $i++) {
            $invoice = new InvoiceCustomer();
            $invoice->setInvoiceCustomerNum($invoiceCNum);
            

            $invoiceCNum++;

            $manager->persist($invoice);
        }

        $manager->flush();
    }
}
