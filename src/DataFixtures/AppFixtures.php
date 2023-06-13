<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Product;
use App\Entity\Review;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      // Fixtures for user table
      $user1 = new User();
      $user1->setName('John Doe');
      $user1->setPassword('password123');

      $user2 = new User();
      $user2->setName('Jane Doe');
      $user2->setPassword('password456');

      // Fixtures for product table
      $product1 = new Product();
      $product1->setUserId($user1);
      $product1->setName('Product 1');
      $product1->setBody('This is the body of product 1.');
      // <!-- $product1->setCreatedAt(new DateTime()); -->

      $product2 = new Product();
      $product2->setUserId($user2);
      $product2->setName('Product 2');
      $product2->setBody('This is the body of product 2.');
      // <!-- $product2->setCreatedAt(new DateTime()); -->

      // Fixtures for review table
      $review1 = new Review();
      $review1->setUserId($user1);
      $review1->setProductId($product1);
      $review1->setRating(4);
      $review1->setBody('This is a review for product 1.');

      $review2 = new Review();
      $review2->setUserId($user2);
      $review2->setProductId($product2);
      $review2->setRating(5);
      $review2->setBody('This is a review for product 2.');

      // Add fixtures to database
      $manager->persist($user1);
      $manager->persist($user2);
      $manager->persist($product1);
      $manager->persist($product2);
      $manager->persist($review1);
      $manager->persist($review2);
      $manager->flush();
    }
}