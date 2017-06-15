<?php
/**
 * autoload.php
 * @author: Kamil Madejski <kamil.madejski@yahoo.com>
 * Project: Iasci
 */

function __autoload($classname) {
    $filename = "./src/". $classname .".php";
    include_once($filename);
}
