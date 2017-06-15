<?php

/**
 * Product.php
 * @author: Kamil Madejski <kamil.madejski@yahoo.com>
 */

class Product
{
    private $_product_code;
    private $_name;
    private $_url;
    private $_price;
    private $_category;

    /**
     * Product constructor.
     * @param string $category
     * @param string $name
     * @param string $url
     * @param float $price
     * @param int|null $productCode
     */
    public function __construct(string $category, string $name, string $url, float $price, int $productCode = null)
    {
        $this->_product_code    = $productCode;
        $this->_name            = $name;
        $this->_category        = $category;
        $this->_url             = $url;
        $this->_price           = $price;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'category' => $this->_category,
            'product' => $this->_name,
            'url' => $this->_url,
            'price' => $this->_price
        ];
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->_name;
    }
}