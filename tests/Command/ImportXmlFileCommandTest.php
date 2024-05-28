<?php

namespace App\Tests\Command;

use App\Command\ImportXmlFileCommand;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use League\Flysystem\Config;
use League\Flysystem\Local\LocalFilesystemAdapter;

final class ImportXmlFileCommandTest extends AbstractCommandTest
{

    private $idToRemove;

    protected function setUp(): void
    {
        $filesystem = new LocalFilesystemAdapter('temp');

        $xml_content = "<?xml version='1.0' encoding='utf-8'?>
        <catalog>
            <item>
                <entity_id>340</entity_id>
                <CategoryName><![CDATA[Green Mountain Ground Coffee]]></CategoryName>
                <sku>20</sku>
                <name>Item feed Local</name>
                <description></description>
                <shortdesc><![CDATA[Green Mountain Coffee French Roast Ground Coffee 24 2.2oz Bag steeps cup after cup of smoky-sweet, complex dark roast coffee from Green Mountain Ground Coffee.]]></shortdesc>
                <price>41.6000</price>
                <link>http://www.coffeeforless.com/green-mountain-coffee-french-roast-ground-coffee-24-2-2oz-bag.html</link>
                <image>http://mcdn.coffeeforless.com/media/catalog/product/images/uploads/intro/frac_box.jpg</image>
                <Brand><![CDATA[Green Mountain Coffee]]></Brand>
                <Rating>0</Rating>
                <CaffeineType>Caffeinated</CaffeineType>
                <Count>24</Count>
                <Flavored>No</Flavored>
                <Seasonal>No</Seasonal>
                <Instock>Yes</Instock>
                <Facebook>1</Facebook>
                <IsKCup>0</IsKCup>
            </item>
        </catalog>";
        $filesystem->write('testfeed.xml', $xml_content, new Config());
    }

    protected function tearDown(): void
    {
        /** @var EntityManagerInterface $em */
        $em = $this->getContainer()->get(EntityManagerInterface::class);
        
        $item = $em->find("\App\Entity\Product", $this->idToRemove);
        $em->remove($item);
        $em->flush();

        $filesystem = new LocalFilesystemAdapter('temp');
        $filesystem->delete('testfeed.xml');
        $filesystem->deleteDirectory('/');
    }

    public function testImportXmlFile(): void
    {

        $inputData = [
            'driver' => 'test',
            'file_name' => 'testfeed.xml'
        ];
        $this->executeCommand($inputData);
        $this->assertProductCreated();
        
    }

    private function assertProductCreated(): void
    {
        /** @var UserRepository $repository */
        $repository = $this->getContainer()->get(ProductRepository::class);

        $product = $repository->findOneByEntityId(340);
        $this->idToRemove = $product->getId();

        $this->assertNotNull($product);
        $this->assertSame(340, $product->getEntityId());
    }


    protected function getCommandFqcn(): string
    {
        return ImportXmlFileCommand::class;
    }

}