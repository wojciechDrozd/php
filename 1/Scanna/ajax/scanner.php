<?php
require_once 'db_connection.php';

if (isset ( $_POST ['regex'] ) && isset ( $_POST ['name_capture_group']) && (isset($_POST['url']) || isset($_POST['text_blob']))) {


	$regex = trim($_POST ['regex']);
	$name_capture_group = $_POST['name_capture_group'];
	$matches = array();

	if (isset($_POST ['url']) && $_POST['url'] != ""){

		$url = $_POST['url'];
		require_once 'scannerForScanna.php';

	}else if(isset ( $_POST ['text_blob'] ) && $_POST['text_blob'] != ""){
		$text_blob = $_POST ['text_blob'];
		preg_match_all ( $regex, $text_blob, $matches );
	}

	$extra_capture_group="";
	$website_capture_group ="";

	$productNamesArray=$matches[$name_capture_group];
	$extraArray=[];
	$linksArray=[];

	$name_prefix = "";
	$name_suffix ="";
	$url_prefix = "";

	if (isset ( $_POST ['extra_capture_group'] )) {
		$extra_capture_group = $_POST ['extra_capture_group'];
		$extraArray = $matches[$extra_capture_group];
	}

	if (isset ( $_POST ['website_capture_group'] )) {
		$website_capture_group = $_POST ['website_capture_group'];
		$linksArray = $matches[$website_capture_group];
	}

	if (isset ( $_POST ['name_prefix'] )) {
		$name_prefix = $_POST ['name_prefix'];
		for ($i = 0; $i < count($productNamesArray); $i++){
			$productNamesArray[$i] = $name_prefix." ".$productNamesArray[$i];
		}
	}

	if (isset ( $_POST ['name_suffix'] )) {
		$name_suffix = $_POST ['name_suffix'];
		for ($i = 0; $i < count($productNamesArray); $i++){
			$productNamesArray[$i] = $productNamesArray[$i]." ".$name_suffix;
		}
	}

	if (isset ( $_POST ['url_prefix'] ) && isset($linksArray)) {
		$url_prefix = $_POST ['url_prefix'];
		for ($i = 0; $i < count($linksArray); $i++){
			$linksArray[$i] = $url_prefix.$linksArray[$i];
		}
	}


	//clear fetchedproducts table from previous results
	$query = "TRUNCATE fetchedproducts";
	mysqli_query ( $con, $query );

	//fetching results - names only
	if(!isset($_POST['extra_capture_group']) && !isset($_POST['website_capture_group'])){
		for ($i = 0; $i < count($productNamesArray); $i++){
			$query = "INSERT INTO fetchedproducts (name)
			VALUES('$productNamesArray[$i]')";
			mysqli_query ( $con, $query );
		}
	}

	//fetching results - names and links
	if(!isset($_POST['extra_capture_group']) && isset($_POST['website_capture_group'])){
		for ($i = 0; $i < count($productNamesArray); $i++){
			$query = "INSERT INTO fetchedproducts (name,url)
			VALUES('$productNamesArray[$i]','$linksArray[$i]')";
			mysqli_query ( $con, $query );
		}
	}

	//fetching results - names and extra
	if(isset($_POST['extra_capture_group']) && !isset($_POST['website_capture_group'])){
		for ($i = 0; $i < count($productNamesArray); $i++){
			$query = "INSERT INTO fetchedproducts (name,extra)
			VALUES('$productNamesArray[$i]','$extraArray[$i]')";
			mysqli_query ( $con, $query );
		}
	}

	//fetching results - names, extra and link
	if(isset($_POST['extra_capture_group']) && isset($_POST['website_capture_group'])){
		for ($i = 0; $i < count($productNamesArray); $i++){
			$query = "INSERT INTO fetchedproducts (name,extra,url)
			VALUES('$productNamesArray[$i]','$extraArray[$i]','$linksArray[$i]')";
			mysqli_query ( $con, $query );
		}
	}



}
?>

















