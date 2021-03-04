<?php

namespace App\Tests\Entity;

use App\Entity\HomeText;
use PHPUnit\Framework\TestCase;

class HomeTextTest extends TestCase
{
    public function testUri() {

        $homeTextTest= new HomeText();
        $title = "title home text";
        $description = "description home text";


        $homeTextTest->setTitle($title);
        $this->assertEquals("title home text", $homeTextTest->getTitle());

        $homeTextTest->setDescription($description);
        $this->assertEquals("description home text", $homeTextTest->getDescription());
    }
}