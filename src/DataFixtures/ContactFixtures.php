<?php

namespace App\DataFixtures;


use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;

class ContactFixtures extends BaseFixture
{
    protected function loadData(ObjectManager $manager): void
    {
        $this->createMany(5, 'contacts', function () {
            return (new Contact())
                ->setLastName($this->faker->lastName)
                ->setFirstName($this->faker->firstName)
                ->setEmail($this->faker->email)
                ->setContent($this->faker->paragraph)
            ;
        });

        $manager->flush();
    }
}
