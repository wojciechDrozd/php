<?php

$ch = curl_init ( $url );
curl_setopt ( $ch, CURLOPT_URL, $url );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
$urlContent = curl_exec ( $ch );

preg_match_all ( $regex, $urlContent, $matches );

$linksArray = $matches [$website_capture_group];
$productNamesArray = $matches [$name_capture_group];

//http://www.ray-ban.com/usa/sunglasses/view-all/plp
//@href="([^"]+)"\s+class="D_PLP_Tiles"\s+data-description="([^"]+)">@
?>