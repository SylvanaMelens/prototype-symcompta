<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use App\Entity\InvoiceCustomer;
use App\Entity\VatRate;
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

        for ($c = 0; $c < 15; $c++) {
            $customer = new Customer();
            $customer->setFirstName($faker->firstName)
                ->setLastName($faker->lastName)
                ->setAddress($faker->address)
                ->setPostCode(($faker->postcode))
                ->setCity($faker->city)
                ->setVATNumber($faker->randomElement(['NA', 'BE0800.333.333']))
                ->setEmail($faker->email);

            $manager->persist($customer);

            for ($i = 0; $i < mt_rand(1, 5); $i++) {
                $invoice = new InvoiceCustomer();
                $invoice->setInvoiceCustomerTotalAmount($faker->randomFloat(2, 100, 10530))
                    ->setInvoiceCustomerSentAt($faker->dateTimeBetween('-3 months'))
                    ->setInvoiceCustomerStatus($faker->randomElement(['Envoyée', 'Payée', 'NDC']))
                    ->setInvoiceCustomerDescription($faker->randomElement(['prestations', 'vente', 'commande']))
                    ->setInvoiceCustomerAmountBase($faker->randomFloat(2, 100, 10530))
                    ->setInvoiceCustomerNum($faker->randomDigit)
                    ->setInvoiceCustomerVatRateId
                    ->setInvoiceCustomerClient($customer);


                $manager->persist($invoice);

                for ($j = 0; $j < 15; $j++) {
                    $vat = new VatRate();
                    $vat->setRate($faker->randomFloat(2, 6, 21));
                
                    $manager->persist($vat);
                }

            }
        }
        $manager->flush();
    }
}
