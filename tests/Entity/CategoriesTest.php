<?php

namespace App\Tests\Entity;

use App\Entity\Categories;
use PHPUnit\Framework\TestCase;


class CategoriesTest extends TestCase
{
    public function testUri() {

        $categorie = new Categories();
        $name = "testCategorie";


        $categorie->setName($name);
        $this->assertEquals("testCategorie", $categorie->getName());
    }
}