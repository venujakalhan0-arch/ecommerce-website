<?php
// Call the Database
include('../includes/connection.php');

// Insert Query
if(isset($_POST['insert_brand']))
{
	$brand_name=$_POST['brand_name'];
	$insert_Query="INSERT INTO `brands_tb`(brand_name)VALUES('$brand_name')";
	$run_insert_Query=mysqli_query($connection,$insert_Query);
	if($run_insert_Query)
	{
		echo "<script> alert('Brand Inserted Successfully!') </script>";
	}

}

?>

<form action="" method="POST" class="mb-3 p-3">
	<div class="input-group mb-3">
  		<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-shuffle"></i></span>
  		<input type="text" class="form-control" name="brand_name" placeholder="Insert Brand" aria-label="insert_brand">	
	</div>

	<div class="input-group m-auto">
  		<button class="bg-success text-light p-2 border-0" name="insert_brand"> Insert Brand </button>
	</div>
</form>