<?php

namespace App\Service;

use League\Flysystem\FilesystemOperator;

class FilesystemOperatorFactory
{
    private $products;
    private $default;

    public function __construct(FilesystemOperator $products, FilesystemOperator $default)
    {
        $this->products = $products;
        $this->default = $default;
    }

    public function getFilesystemOperator(string $storage): FilesystemOperator
    {
        switch ($storage) {
            case 'products':
                return $this->products;
                break;
            default:
                return $this->default;
                break;
        }

        
    }

}
