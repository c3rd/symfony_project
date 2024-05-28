<?php

namespace App\Service;

use League\Flysystem\FilesystemOperator;

class FilesystemOperatorFactory
{

    public function __construct(
        private readonly FilesystemOperator $products, 
        private readonly FilesystemOperator $default,
        private readonly FilesystemOperator $test
    )
    {
    }

    public function getFilesystemOperator(string $storage): FilesystemOperator
    {
        switch ($storage) {
            case 'products':
                return $this->products;
                break;
            case 'test':
                return $this->test;
            default:
                return $this->default;
                break;
        }

        
    }

}
