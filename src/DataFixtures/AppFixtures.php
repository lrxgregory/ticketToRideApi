<?php

namespace App\DataFixtures;

use App\Entity\Destination;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $destinationsTicketToRideEurope = [
            [
                'start' => 'Edinburch',
                'end' => 'Athina',
                'score' => '21',
                'longDestination' => true,
            ],
            [
                'start' => 'Cadiz',
                'end' => 'Stockholm',
                'score' =>'21',
                'longDestination' => true,
            ],
            [
                'start' => 'Kobenhavn',
                'end' => 'Erzurum',
                'score' => '21',
                'longDestination' => true,
            ],
            [
                'start' => 'Lisboa',
                'end' => 'Danzic',
                'score' => '20',
                'longDestination' => true,
            ],
            [
                'start' => 'Palermo',
                'end' => 'Moskva',
                'score' => '20',
                'longDestination' => true,
            ],
            [
                'start' => 'Brest',
                'end' => 'Petrograd',
                'score' => '20',
                'longDestination' => true,
            ],
            [
                'start' => 'Athina',
                'end' => 'Angora',
                'score' => 5,
                'longDestination' => false,
            ],
            [
                'start' => 'Budapest',
                'end' => 'Sofia',
                'score' => 5,
                'longDestination' => false,
            ],
            [
                'start' => 'Frankfurt',
                'end' => 'Kobenhavn',
                'score' => 5,
                'longDestination' => false,
            ],
            [
                'start' => 'Rostov',
                'end' => 'Erzurum',
                'score' => 5,
                'longDestination' => false,
            ],
            [
                'start' => 'Sofia',
                'end' => 'Smyrna',
                'score' => 5,
                'longDestination' => false,
            ],
            [
                'start' => 'Kyiv',
                'end' => 'Petrograd',
                'score' => 6,
                'longDestination' => false,
            ],
            [
                'start' => 'Zurich',
                'end' => 'Brindisi',
                'score' => 6,
                'longDestination' => false,
            ],
            [
                'start' => 'Zurich',
                'end' => 'Budapest',
                'score' => 6,
                'longDestination' => false,
            ],
            [
                'start' => 'Warszawa',
                'end' => 'Smolensk',
                'score' => 6,
                'longDestination' => false,
            ],
            [
                'start' => 'Zagrab',
                'end' => 'Brindisi',
                'score' => 6,
                'longDestination' => false,
            ],
            [
                'start' => 'Paris',
                'end' => 'Zagreb',
                'score' => 7,
                'longDestination' => false,
            ],
            [
                'start' => 'Brest',
                'end' => 'Marseille',
                'score' => 7,
                'longDestination' => false,
            ],
            [
                'start' => 'London',
                'end' => 'Berlin',
                'score' => 7,
                'longDestination' => false,
            ],
            [
                'start' => 'Edinburgh',
                'end' => 'Paris',
                'score' => 7,
                'longDestination' => false,
            ],
            [
                'start' => 'Amsterdam',
                'end' => 'Pamplona',
                'score' => 7,
                'longDestination' => false,
            ],
            [
                'start' => 'Roma',
                'end' => 'Smyrna',
                'score' => 8,
                'longDestination' => false,
            ],
            [
                'start' => 'Palermo',
                'end' => 'Constantinople',
                'score' => 8,
                'longDestination' => false,
            ],
            [
                'start' => 'Sarajevo',
                'end' => 'Sevastopol',
                'score' => 8,
                'longDestination' => false,
            ],
            [
                'start' => 'Madrid',
                'end' => 'Dieppe',
                'score' => 8,
                'longDestination' => false,
            ],
            [
                'start' => 'Barcelona',
                'end' => 'Bruxelles',
                'score' => 8,
                'longDestination' => false,
            ],
            [
                'start' => 'Paris',
                'end' => 'Wien',
                'score' => 8,
                'longDestination' => false,
            ],
            [
                'start' => 'Barcelona',
                'end' => 'Munchen',
                'score' => 8,
                'longDestination' => false,
            ],
            [
                'start' => 'Brest',
                'end' => 'Venezia',
                'score' => 8,
                'longDestination' => false,
            ],
            [
                'start' => 'Smolensk',
                'end' => 'Rostov',
                'score' => 8,
                'longDestination' => false,
            ],
            [
                'start' => 'Marseille',
                'end' => 'Essen',
                'score' => 8,
                'longDestination' => false,
            ],
            [
                'start' => 'Kyiv',
                'end' => 'Sochi',
                'score' => 8,
                'longDestination' => false,
            ],
            [
                'start' => 'Madrid',
                'end' => 'Zurich',
                'score' => 8,
                'longDestination' => false,
            ],
            [
                'start' => 'Berlin',
                'end' => 'Bucuresti',
                'score' => 8,
                'longDestination' => false,
            ],
            [
                'start' => 'Bruxelles',
                'end' => 'Danzic',
                'score' => 9,
                'longDestination' => false,
            ],
            [
                'start' => 'Berlin',
                'end' => 'Roma',
                'score' => 9,
                'longDestination' => false,
            ],
            [
                'start' => 'Angora',
                'end' => 'Kharkov',
                'score' => 10,
                'longDestination' => false,
                ],
            
            [
                'start' => 'Riga',
                'end' => 'Bucuresti',
                'score' => 10,
                'longDestination' => false,
                ],
            
            [
                'start' => 'Essen',
                'end' => 'Kyiv',
                'score' => 10,
                'longDestination' => false,
                ],
            
            [
                'start' => 'Venizia',
                'end' => 'Constantinople',
                'score' => 10,
                'longDestination' => false,
                ],
            
            [
                'start' => 'London',
                'end' => 'Wien',
                'score' => 10,
                'longDestination' => false,
                ],
            
            [
                'start' => 'Athina',
                'end' => 'Wilno',
                'score' => 11,
                'longDestination' => false,
                ],
            
            [
                'start' => 'Stockholm',
                'end' => 'Wien',
                'score' => 11,
                'longDestination' => false,
                ],
            
            [
                'start' => 'Berlin',
                'end' => 'Moskva',
                'score' => 12,
                'longDestination' => false,
                ],
            
            [
                'start' => 'Amsterdam',
                'end' => 'Wilno',
                'score' => 12,
                'longDestination' => false,
                ],
            
            [
                'start' => 'Frankfurt',
                'end' => 'Smolensk',
                'score' => 13,
                'longDestination' => false,
            ],
        ];

        foreach($destinationsTicketToRideEurope as $destinationTicketToRideEurope) {
            $destination = new Destination();
            $destination->setStart($destinationTicketToRideEurope['start']);
            $destination->setEnd($destinationTicketToRideEurope['end']);
            $destination->setScore($destinationTicketToRideEurope['score']);
            $destination->setLongDestination($destinationTicketToRideEurope['longDestination']);
            $manager->persist($destination);
        }

        $manager->flush();
    }
}
