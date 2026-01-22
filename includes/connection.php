<?php
$connection=mysqli_connect('localhost','root','','kitchenora_project');

if(!$connection)
{
	die(mysqli_error($connection));
}
?>