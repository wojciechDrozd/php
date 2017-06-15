<?php

/**
 * @author: Kamil Madejski <kamil.madejski@yahoo.com>
 */

require_once('autoload.php');

error_reporting(E_ERROR);

if(empty($argv[1])) {
    die("Error: Invalid arguments. First param must be a output file type format: json or txt. Second param must be int <0;1>. 0 - off, 1 - on. \n");
}
if(!is_string($argv[1])) {
    die("Error: First param must be an output file type! Available formats: json, txt.\n");
}
elseif($argv[1] != 'txt' && $argv[1] != 'json') {
    die("Error: First param must be a output file type! Available formats: json, txt.\n");
}
elseif($argv[2] > 1 || $argv[2] < 0) {
    die("Error: ShowResults - Second param must be int <0;1>. 0 - off, 1 - on.\n");
}

$app = new App($argv[1], $argv[2]);
$app->up();
