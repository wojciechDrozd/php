<?php

$ch = curl_init ( $url );
curl_setopt ( $ch, CURLOPT_URL, $url );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
$urlContent = curl_exec ( $ch );
preg_match_all ( $regex, $urlContent, $matches );


//http://www.ray-ban.com/usa/sunglasses/view-all/plp
//@href="([^"]+)"\s+class="D_PLP_Tiles"\s+data-description="([^"]+)">@

//http://www.vans.com/shop/mens-clothes-tees
//@<a class="product-block-pdp-url pdp-url-js" title="(.*?)" href="(.*?)">@
?>