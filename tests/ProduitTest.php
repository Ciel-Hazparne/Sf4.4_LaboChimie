<?php

namespace App\Tests;

use App\Entity\ProduitChimique;
use PHPUnit\Framework\TestCase;

class ProduitTest extends TestCase
{
    public function testSomething()
    {
        self::assertTrue(true);
    }

    public function testIsTrue()
    {
        $product= new ProduitChimique();
        $product->setName("name")
                ->setSlug("slug")
                ->setFormule("formule")
                ->setConcentrationMolaire("2")
            ->setConcentrationMassique("1")
                ->setFournisseur("fournisseur");
        self::assertSame($product->getName(), 'name');
        self::assertSame($product->getSlug(), "slug");
        self::assertSame($product->getFormule(), "formule");
        self::assertEquals($product->getConcentrationMolaire(), "2");
        self::assertEquals($product->getConcentrationMassique(), "1");
        self::assertSame($product->getFournisseur(), "fournisseur");

        self::assertTrue(true);
    }

    public function testIsFalse()
    {
        $product= new ProduitChimique();
        $product->setName("name")
                ->setSlug("slug")
                ->setFormule("formule")
                ->setConcentrationMolaire("2")
            ->setConcentrationMassique("1")
                ->setFournisseur("fournisseur");
        self::assertNotSame($product->getName(), 'no');
        self::assertNotSame($product->getSlug(), "no");
        self::assertNotSame($product->getFormule(), "no");
        self::assertNotEquals($product->getConcentrationMolaire(), "1");
        self::assertNotEquals($product->getConcentrationMassique(), "2");
        self::assertNotSame($product->getFournisseur(), "no");

        self::assertTrue(true);
    }
}
