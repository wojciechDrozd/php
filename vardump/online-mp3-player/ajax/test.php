<?php


$dircontent = scandir('../files');
//echo "<pre>",print_r($dircontent),"</pre>";

$mp3list =array();

$data ='<table class="table-bordered">
		<tr>
		<th>Title</th>
		<th></th>
		<th>Play</th>
		<th>Download</th>
		</tr>';


foreach ($dircontent as $item){
	if(substr($item,-3,3) =="mp3"){
		$mp3list[] = $item;
	}
}

sort($mp3list);
foreach($mp3list as  $item){
	$data.='<tr>
			<td>'.$item.'</td>
			<td><audio controls><source src="../files/'.$item.'" type="audio/mpeg"</audio></td>
			<td><button type="button" class="btn btn-sm">Play</button></td>
			<td><button type="button" class="btn btn-sm">Download</button></td>
			</tr>';
}
//echo "<pre>",print_r($mp3list),"</pre>";

$data.="</table>";

echo $data;
?>