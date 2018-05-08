<?php

error_reporting(0);
$id = $_POST['id'];
$id = base64_encode($id);
$sicnu = "  Hi! welcome to sicnuctf!";

if (!$id==null) {
	$id = serialize($id);
	echo $sicnu.$id.'<br>---------------------<br>';
	$sicnuid = $sicnu.$id;
	// echo $sicnuid.'<br>-----------------<br>';

	$decodeid = base64_decode($sicnuid);
	echo $decodeid;

	if (strpos($decodeid, 'flag') !== false && strpos($decodeid, 'sicnuctf')!== false) {
		echo 'flag{13ase_anunmnnD_5er1aIlze}';
	}
	else{
		echo "---Fa♂Q";
	}
}

?>
<meta charset="utf-8">
<form action="./index.php"  method="POST" >
	<input type="text" name="id">
	<input type="submit" value="submit">
</form>

