<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Book;  

class BookFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

            $book = new Book();
            $book->setTitle("Rich Dad Poor Dad ")
                ->setAuthor("Robert Kiyosaki & Sharon Lechter ")
                ->setWrittenAT("1997")
                ->setDescription("De style autobiographique, Robert Kiyosaki utilise un ensemble de paraboles et 
                d'exemples tirés de son propre parcours afin de souligner l'importance de développer son intelligence
                 financière. Il y explique comment l'investissement, l'immobilier, la création et l'acquisition 
                 d'entreprises peuvent être utilisés pour construire sa richesse et devenir financièrement indépendant.")
                ->setImage("https://images-na.ssl-images-amazon.com/images/I/91VokXkn8hL.jpg")
                ->setRating(5)
                ->setPrice(13.5 );
                    
                    
            $manager->persist($book);
 
        $manager->flush();
    }
}
