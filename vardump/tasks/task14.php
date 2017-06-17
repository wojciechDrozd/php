<?php



$url ='http://datafeed.api.productserve.com/datafeed/download/apikey/3d35ad41e681c54a62ab7144be693bb3/language/fr/fid/15261/columns/aw_deep_link,product_name,aw_product_id,merchant_product_id,merchant_image_url,description,merchant_category,search_price,merchant_name,merchant_id,category_name,category_id,aw_image_url,currency,store_price,delivery_cost,merchant_deep_link,language,last_updated,display_price,data_feed_id,brand_name,brand_id,colour,product_short_description,specifications,condition,product_model,model_number,dimensions,keywords,promotional_text,product_type,commission_group,merchant_product_category_path,merchant_product_second_category,merchant_product_third_category,rrp_price,saving,savings_percent,base_price,base_price_amount,base_price_text,product_price_old,delivery_restrictions,delivery_weight,warranty,terms_of_contract,delivery_time,in_stock,stock_quantity,valid_from,valid_to,is_for_sale,web_offer,pre_order,stock_status,size_stock_status,size_stock_amount,merchant_thumb_url,large_image,alternate_image,aw_thumb_url,alternate_image_two,alternate_image_three,reviews,average_rating,rating,number_stars,number_available,ean,isbn,upc,mpn,parent_product_id,product_GTIN,Fashion%3Asuitable_for,Fashion%3Acategory,Fashion%3Asize,Fashion%3Amaterial,Fashion%3Apattern,Fashion%3Aswatch/format/csv/delimiter/%7C/compression/gzip/adultcontent/1/';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$zipFile = curl_exec($ch);
curl_close($ch);

$decoded = gzdecode($zipFile);
$pattern = '%"Sports - Shorts"%';

echo preg_match_all($pattern,$decoded,$matches),"\n";