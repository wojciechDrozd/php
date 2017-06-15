<?php

/**
 * UrlHelper.php
 * @author: Kamil Madejski <kamil.madejski@yahoo.com>
 * Project: Iasci
 */

class UrlHelper
{
    public static function removeDomain(string $url) : string
    {
        return preg_replace('~http://[^/]+/~', '', $url);
    }
}