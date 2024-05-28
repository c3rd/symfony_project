<?php

namespace App\Command;

use App\Entity\Product;
use App\Service\FilesystemOperatorFactory;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Stopwatch\Stopwatch;

#[AsCommand(
    name: 'app:import-products',
    description: 'Import XML data to database',
)]
class ImportXmlFileCommand extends Command
{

    private SymfonyStyle $io;

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly FilesystemOperatorFactory $filesystem,
        private readonly LoggerInterface $logger,
    )
    {
        parent::__construct();
    }


    protected function configure(): void
    {
        $this
            ->addArgument('driver', InputArgument::REQUIRED, 'The storage driver where the file is located')
            ->addArgument('file_name', InputArgument::REQUIRED, "The name of the file to be read")
        ;
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->io = new SymfonyStyle($input, $output);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $stopwatch = new Stopwatch();
        $stopwatch->start('import-xml-file-command');

        $driver = $input->getArgument('driver');
        $file_name = $input->getArgument('file_name');

        $filesystem = $this->filesystem->getFilesystemOperator($driver);
        $xml_contents = $filesystem->read($file_name);
        $xml_contents = simplexml_load_string($xml_contents);

        foreach ($xml_contents as $item) {

            $product = new Product();
            $product->setEntityId(intval($item->entity_id));
            $product->setCategoryName(strval($item->CategoryName));
            $product->setSku(strval($item->sku));
            $product->setName(strval($item->name));
            $product->setDescription(strval($item->description));
            $product->setShortdesc(strval($item->shortdesc));
            $product->setPrice(floatval($item->price));
            $product->setLink(strval($item->link));
            $product->setImage(strval($item->image));
            $product->setBrand(strval($item->Brand));
            $product->setRating(intval($item->Rating));
            $product->setCaffeineType(strval($item->CaffeineType));
            $product->setCount(intval($item->Count));
            $product->setFlavored(strval($item->Flavored));
            $product->setSeasonal(strval($item->Seasonal));
            $product->setInStock(strval($item->Instock));
            $product->setFacebook(strval($item->Facebook));
            $product->setIskcup(strval($item->IsKCup));

            $this->entityManager->persist($product);
            
        }
        
        $this->entityManager->flush();
        
        $this->io->success('Your products file was imported sucessfully');

        $event = $stopwatch->stop('import-xml-file-command');
        $this->io->comment(sprintf('Elapsed time: %.2f ms / Consumed memory: %.2f MB', $event->getDuration(), $event->getMemory() / (1024 ** 2)));

        return Command::SUCCESS;
    }
}
