<?php

echo 'Current PHP version: '.phpversion();

trait Sharable {
 
  public function share($item)
  {
    return 'share this item';
  }
 
}

?>