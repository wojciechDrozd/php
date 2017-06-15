<?php

/**
 * Writer.php
 * @author: Kamil Madejski <kamil.madejski@yahoo.com>
 */

class FileWriter
{
    private $_fileName;
    private $_type;

    /**
     * Writer constructor.
     * @param string $fileName
     */
    public function __construct(string $fileName, string $type)
    {
        if(is_writable($fileName)) {
            $this->_fileName = $fileName;
        }
        elseif(!is_writable($fileName) && is_writable('./')) {
            $this->_fileName = $fileName;
        }
        if($type == 'txt') {
            $this->_type = 'txt';
        }
        elseif($type == 'json') {
            $this->_type = 'json';
        }
        else {
            throw new Exception('Unsupported output file format.');
        }
    }

    /**
     * Write string into file.
     * @param $toWrite
     */
    public function write($toWrite)
    {
        file_put_contents($this->_fileName, $toWrite, FILE_APPEND);
    }

    /**
     * Loop over list and writes to file one by one.
     * @param array $productsList
     */
    public function writeProducts(array $productsList)
    {
        if($this->_type == 'txt') {
            foreach ($productsList as $product) {
                $this->write(print_r($product->toArray(), true));
            }
        }
        else {
            foreach ($productsList as $product) {
                $products[] = $product->toArray();
            }
            $this->write(json_encode($products, true));
        }
    }
}