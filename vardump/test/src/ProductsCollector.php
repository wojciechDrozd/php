<?php

/**
 * ProductsCollector.php
 * @author: Kamil Madejski <kamil.madejski@yahoo.com>
 * Project: Iasci
 */
class ProductsCollector extends Collector
{
    private $_grabbedHtml;
    private $_categoryUrl;

    /**
     * ProductsGrabber constructor.
     * @param $getUrlWithoutDomain
     */
    public function __construct(string $categoryUrl)
    {
        parent::__construct();
        $this->_categoryUrl = $categoryUrl;
    }

    /**
     * Downloads URL content.
     */
    public function run()
    {
        $this->_grabbedHtml = $this->gather(self::SERVICE_URL . $this->_categoryUrl . '?limit=96');
    }

    /**
     * @return string
     */
    public function getHTML()
    {
        return $this->_grabbedHtml;
    }
}