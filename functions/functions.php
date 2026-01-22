<?php
// Calling the database location
include('./includes/connection.php');


//get products
function getProducts()
{
	global $connection;

	if(!isset($_GET['category'])){
		if(!isset($_GET['brand'])){
		    $select_query= "SELECT * FROM `products_tb` ORDER BY RAND()";
		    $run_select_query = mysqli_query($connection, $select_query);

		    while($row = mysqli_fetch_assoc($run_select_query))
		    {
		      $product_id = $row['product_id'];
		      $product_name = $row['product_name'];
		      $product_description = $row['product_description'];
		      $product_image1 = $row['product_image1'];
		      $product_price = $row['product_price'];
		      $category_id = $row['category_id'];
		      $product_id = $row['product_id'];


		      echo "
		      <div class='col-md-3 mb-2 d-flex justify-content-center'> 
		        <div class='card w-100 h-80 d-flex flex-column'>
		          <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_image1'>
		          <div class='card-body d-flex flex-column'>
		            <h5 class='card-title'>$product_name</h5>
		            
		            <p class='card-text'>Rs. $product_price.00</p>
		            <a href='index.php?add_to_cart=$product_id' class='btn btn-success mb-2'>Add to Cart</a>
		            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View Details</a>
		          </div>
		        </div>
		      </div>
		    ";
    		}
		}
	}

}

//get unique categories 
function getFilteredCategories()
{
	global $connection;

	if(isset($_GET['category']))
	{
		$category_id = $_GET['category'];
		$select_query= "SELECT * FROM `products_tb` WHERE category_id=$category_id";
	    $run_select_query = mysqli_query($connection, $select_query);
	    
	     //count rows to see if there is any records
	    $count_rows=mysqli_num_rows($run_select_query);
	    if($count_rows==0)
	    {
	    	echo "<h1>No stock under this category</h2>";
	    }

	    while($row = mysqli_fetch_assoc($run_select_query))
	    {
	      $product_id = $row['product_id'];
	      $product_name = $row['product_name'];
	      $product_description = $row['product_description'];
	      $product_image1 = $row['product_image1'];
	      $product_price = $row['product_price'];
	      $category_id = $row['category_id'];
	      $product_id = $row['product_id'];


	      echo "
	      <div class='col-md-3 mb-2 d-flex justify-content-center'>  
	        <div class='card w-100 h-80 d-flex flex-column'>
	          <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_image1'>
	          <div class='card-body d-flex flex-column'>
	            <h5 class='card-title'>$product_name</h5>
	            
	            <p class='card-text'>Rs. $product_price</p>
	            <a href='index.php?add_to_cart=$product_id' class='btn btn-success mb-2'>Add to Cart</a>
	            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View Details</a>
	          </div>
	        </div>
	      </div>
	    ";
		}
	}
}

//get unique brands 
function getFilteredBrands()
{
	global $connection;

	if(isset($_GET['brand']))
	{
		$brand_id = $_GET['brand'];
		$select_query= "SELECT * FROM `products_tb` WHERE brand_id=$brand_id";
	    $run_select_query = mysqli_query($connection, $select_query);

	    //count rows to see if there is any records
	    $count_rows=mysqli_num_rows($run_select_query);
	    if($count_rows==0)
	    {
	    	echo "<h1>No stock under this brand</h2>";
	    }

	    while($row = mysqli_fetch_assoc($run_select_query))
	    {
	      $product_id = $row['product_id'];
	      $product_name = $row['product_name'];
	      $product_description = $row['product_description'];
	      $product_image1 = $row['product_image1'];
	      $product_price = $row['product_price'];
	      $category_id = $row['category_id'];
	      $product_id = $row['product_id'];


	      echo "
	      <div class='col-md-4 mb-3'> 
	        <div class='card' style='width: 18rem;'>
	          <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_image1'>
	          <div class='card-body'>
	            <h5 class='card-title'>$product_name</h5>
	            
	            <p class='card-text'>Rs. $product_price.00</p>
	            <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
	            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View Details</a>
	          </div>
	        </div>
	      </div>
	    ";
		}
	}
}

//get brand Data
function getBrands()
{
	global $connection;
	$select_brands = "SELECT * FROM `brands_tb`";
  	$run_select_brands = mysqli_query($connection, $select_brands);
    while($row_data = mysqli_fetch_assoc($run_select_brands))
    {
        $brand_id = $row_data['brand_id'];
        $brand_name = $row_data['brand_name'];

        //Display brand table values in <li> tag
        echo "<li class='nav-item text-center'>
                    <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_name</a>
                  </li>";
    }
}

//get Categories Data
function getCategories()
{
	global $connection;
	$select_category = "SELECT * FROM `categories_tb`";
    $run_select_category = mysqli_query($connection, $select_category);
    while($row_data=mysqli_fetch_assoc($run_select_category))
    {
        $category_id = $row_data['category_id'];
        $category_name = $row_data['category_name'];

        //Display category table values in <li> tag
        echo "<li class='nav-item text-center'>
                <a href='index.php?category=$category_id' class='nav-link text-light'>$category_name</a>
                      </li>";
    }
}

//Search products fucntion
function search_products()
{
	global $connection;

	if(isset($_GET['search_data_products']))
	{
		$search_value=$_GET['search_products'];
		$search_query= "SELECT * FROM `products_tb` WHERE product_keyword LIKE '%$search_value%'";

		$run_search_query = mysqli_query($connection, $search_query);

		while($row = mysqli_fetch_assoc($run_search_query))
		{
		  $product_id = $row['product_id'];
		  $product_name = $row['product_name'];
		  $product_description = $row['product_description'];
		  $product_image1 = $row['product_image1'];
		  $product_price = $row['product_price'];
		  $category_id = $row['category_id'];
		  $product_id = $row['product_id'];


		  echo "
		  <div class='col-md-4 mb-3'> 
		    <div class='card' style='width: 18rem;'>
		      <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_image1'>
		      <div class='card-body'>
		        <h5 class='card-title'>$product_name</h5>
		        <p class='card-text'>$product_description</p>
		        <p class='card-text'>Rs. $product_price</p>
		        <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
		        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View Details</a>
		      </div>
		    </div>
		  </div>
		";
		}
	}
}

function view_details()
{
	global $connection;
	if(isset($_GET['product_id'])){
		if(!isset($_GET['category'])){
			if(!isset($_GET['brand'])){
				$product_id = $_GET['product_id'];
			    $select_query= "SELECT * FROM `products_tb` WHERE product_id=$product_id";
			    $run_select_query = mysqli_query($connection, $select_query);

			    while($row = mysqli_fetch_assoc($run_select_query))
			    {
			      $product_id = $row['product_id'];
			      $product_name = $row['product_name'];
			      $product_description = $row['product_description'];
			      $product_image1 = $row['product_image1'];
			      $product_image2 = $row['product_image2'];
			      $product_price = $row['product_price'];
			      $category_id = $row['category_id'];
			      $product_id = $row['product_id'];


			      echo "
			      <div class='col-md-4 mb-3'> 
			        <div class='card' style='width: 18rem;'>
			          <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_image1'>
			          <div class='card-body'>
			            <h5 class='card-title'>$product_name</h5>
			            
			            <p class='card-text'>Rs. $product_price</p>
			            <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
			            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View Details</a>
			          </div>
			        </div>
			      </div>

			    <div class='col-md-8'> 
              		<div class='row'>
                  		<div class='col-md-12'>
                    		<h4 class='text-center'>Related Images</h4>
                  		</div>

                  		<div class='col-md-6'>
                    		<img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_image1'>
                  		</div>
                  	
                  		<div class='col-md-6'>
                    		<img src='./admin/product_images/$product_image2' class='card-img-top' alt='$product_image2'>
                  		</div>
						<div class='col-md-6'>
                    		<p class='card-text'>$product_description</p>
                  		</div>
              		</div>
            	</div>
			    ";
	    		}
			}
		}
	}
}

//Get ip Address
function getIPAddress() 
{  
   //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP']))
   {  
   		$ip = $_SERVER['HTTP_CLIENT_IP'];  
   }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
//whether ip is from the remote address  
    else
    {  
        $ip = $_SERVER['REMOTE_ADDR'];  
    }  
     return $ip;  
}

//cart function
function cart()
{
	if(isset($_GET['add_to_cart']))
	{
		global $connection;
		$get_ip = getIPAddress();
		$get_product_id = $_GET['add_to_cart'];
		$select_query = "SELECT * FROM `cart_details_tb` WHERE ip_address='$get_ip' AND product_id=$get_product_id";
		$run_select_query = mysqli_query($connection, $select_query);

		//count rows to see if there is any records
	    $count_rows=mysqli_num_rows($run_select_query);
	    if($count_rows>0)
	    {
	    	echo "<script>alert('Item is already in the cart')</script>";
	    	echo "<script>window.open('index.php','_self')</script>";
	    }
	    else
	    {
	    	$insert_query = "INSERT INTO `cart_details_tb`(product_id, ip_address, quantity) VALUES($get_product_id,'$get_ip',0)";
	    	$run_insert_query = mysqli_query($connection, $insert_query);
	    	echo "<script>window.open('index.php','_self')</script>";
	    }
	}
} 

// Get cart items count 
function cart_item()
{
	if(isset($_GET['add_to_cart']))
	{
		global $connection;
		$get_ip = getIPAddress();
		$select_query = "SELECT * FROM `cart_details_tb` WHERE ip_address='$get_ip'";
		$run_select_query = mysqli_query($connection, $select_query);
		$count_cart_items=mysqli_num_rows($run_select_query);
	}
	else
	{
		global $connection;
		$get_ip = getIPAddress();
		$select_query = "SELECT * FROM `cart_details_tb` WHERE ip_address='$get_ip'";
		$run_select_query = mysqli_query($connection, $select_query);
		$count_cart_items=mysqli_num_rows($run_select_query);
	}	
	echo $count_cart_items;
}

// Find Total Price
function total_cart_price()
{
	global $connection;
	$get_ip = getIPAddress();
	$total = 0;
	$cart_query = "SELECT * FROM `cart_details_tb` WHERE ip_address='$get_ip' ";
	$run_cart_query = mysqli_query($connection, $cart_query);
	while($row=mysqli_fetch_array($run_cart_query))
	{
		$product_id=$row['product_id'];
		$select_products = "SELECT * FROM `products_tb` WHERE product_id='$product_id'";
		$run_select_products_query = mysqli_query($connection, $select_products);
		while($row_product_price=mysqli_fetch_array($run_select_products_query))
		{
			$product_price=array($row_product_price['product_price']);
			$product_total=array_sum($product_price);
			$total += $product_total;
		}
	}
	echo $total;
}


?>
