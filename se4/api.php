<?php
header("Content-Type:application/json");
require "data.php";

if(!empty($_GET['restaurantname']) and !empty($_GET['location']))
{
	$eventname=$_GET['eventname'];
	$peoplecapacity=$_GET['peoplecapacity'];

	$r = get_restaurant($eventname,$peoplecapacity);
	
	if(empty($r))
	{
		response(200,"Event Not Found",NULL);
	}
	else
	{
		response(200,"Event Found",$r);
	}	
}
else
{
	response(400,"Invalid Request",NULL);
}

function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data is correct']=$data;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>