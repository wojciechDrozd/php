<?php

/**
 * Grabber.php
 * @author: Kamil Madejski <kamil.madejski@yahoo.com>
 */

class Collector
{
    /**
     * Target URL.
     */
    const SERVICE_URL = 'http://www.lighting-direct.co.uk/';

    /**
     * Contains cURL handler.
     * @var resource
     */
    private $_cUrlHandler;

    public function __construct()
    {
        $this->_cUrlHandler = curl_init();
    }

    public function run() {}
    public function getHTML() {}

    public function gather(string $url)
    {
        curl_setopt_array(
            $this->_cUrlHandler, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 20
        ));
        $output = curl_exec($this->_cUrlHandler);
        return $output;
    }
}