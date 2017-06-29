<?php
/*	$curl = curl_init("172.104.51.13:8080/stat/state");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);
	curl_close($curl);
	$result = json_decode($result,true); 
	for($i=0;$i<sizeof($result);$i++)
	{
	echo $result[$i]['state'],$result[$i]['count(*)'];	
	}
	
	$curl = curl_init("172.104.51.13:8080/stat/inprogress");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);
	echo $result;
	curl_close($curl);
	$curl = curl_init("172.104.51.13:8080/stat/total");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);
	echo $result;
	curl_close($curl);
	$curl = curl_init("172.104.51.13:8080/stat/candidprogress");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);
	echo $result;
	curl_close($curl);*/
	/*$curl = curl_init("172.104.51.13:8080/tcentre/all");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);
	echo $result;
	curl_close($curl);
/*
	$curl = curl_init("172.104.51.13:8080/tcentre/candidates/1");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);
	echo $result;
	curl_close($curl);
	 */

	$curl = curl_init("172.16.10.112:5000/cselection/kerala");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);
	echo $result;
	$result=json_decode($result);
	print_r($result[0]);
	echo "Name=>",$result[0][name];
	curl_close($curl);
?>