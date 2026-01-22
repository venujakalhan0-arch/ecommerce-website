<?php
// Call the Database
include('../includes/connection.php');

// Insert Query
if(isset($_POST['insert_cat']))
{
	$category_name=$_POST['category_name'];
	$insert_Query="INSERT INTO `categories_tb`(category_name)VALUES('$category_name')";
	$run_insert_Query=mysqli_query($connection,$insert_Query);
	if($run_insert_Query)
	{
		echo "<script> alert('Category Inserted Successfully!') </script>";
	}

}

?>

<form action="" method="POST" class="mb-3 p-3">
	<div class="input-group mb-3">
  		<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-sliders"></i></span>
  		<input type="text" name="category_name" class="form-control" placeholder="Insert Category" aria-label="insert_category">	
	</div>

	<div class="input-group m-auto">
  		<button class="bg-success text-light p-2 border-0" name="insert_cat"> Insert Category </button>
	</div>
</form>