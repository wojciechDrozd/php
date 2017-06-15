<?php

/**
 * Grabber.php
 * @author: Kamil Madejski <kamil.madejski@yahoo.com>
 */
class SitemapCollector extends Collector
{
    const SITEMAP_URL = 'catalog/seo_sitemap/category/';
    private $_grabbedHtml;

    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        $this->_grabbedHtml = $this->gather(self::SERVICE_URL . self::SITEMAP_URL);
    }

    public function getHTML()
    {
        return $this->_grabbedHtml;
    }
}