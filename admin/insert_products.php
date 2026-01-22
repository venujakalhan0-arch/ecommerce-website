<?php
include('../includes/connection.php');

if(isset($_POST['insert_product']))
{
    // put form inputs into variables
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keyword=$_POST['product_keyword'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_status = 'true';

    //Accessing Product Images
    $productImage1=$_FILES['productImage1']['name'];
    $productImage2=$_FILES['productImage2']['name'];

    //Accessing Image Temp Name
    $tmp_productImage1=$_FILES['productImage1']['tmp_name'];
    $tmp_productImage2=$_FILES['productImage2']['tmp_name'];

    // Empty Conditions
    if($product_title=='' or $product_description=='' or $product_keyword=='' or $product_category=='' or $product_brand=='' or $product_price=='' or $productImage1=='' or $productImage2=='')
    {
        echo "<script>alert('Please fill all fields')</script>";
        exit();
    }
    else
    {
        // Move Images to the product_images Folder
        move_uploaded_file($tmp_productImage1,"./product_images/$productImage1");
        move_uploaded_file($tmp_productImage2,"./product_images/$productImage2");

        // Insert the query
        $insertproducts_query = "INSERT INTO `products_tb`(`product_name`, `product_description`, `product_keyword`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_price`, `date`, `status`) VALUES (' $product_title','$product_description','$product_keyword','$product_category','$product_brand','$productImage1','$productImage2','$product_price',NOW(),'$product_status')";
        $run_insertproducts_query=mysqli_query($connection, $insertproducts_query);
        if($run_insertproducts_query)
        {
            echo "<script> alert('New Product Inserted') </script>";
        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <!-- bootstrap v5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="bg-light mt-2">
    <div class="container">
        <h1 class="text-center"> Insert Product </h1>

        <!-- Insert Product Form -->
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- Product Title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Name</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Name" required="required">
            </div>

            <!-- Product Descrition-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter Product Description" required="required">
            </div>

            <!-- Product Keyword-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter Product Keyword" required="required">
            </div>

            <!-- Product category -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="product_category" class="form-select">
                    <option> Select a category </option>
                      <?php
                          $select_CategoriesQuery="SELECT * FROM `categories_tb`";
                          $run_selectCategoriesQuery=mysqli_query($connection, $select_CategoriesQuery);
                          
                          while($row_data=mysqli_fetch_assoc($run_selectCategoriesQuery))
                          {
                            $Category_Name=$row_data['category_name'];
                            $Category_ID=$row_data['category_id'];
                            echo "<option value='$Category_ID'>$Category_Name</option>";
                          }
                      ?>
                </select>
            </div>

            <!-- Product brand -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brand" id="product_brand" class="form-select">
                    <option> Select a brand </option>
                    <?php
                      $select_Query="SELECT * FROM `brands_tb`";
                      $run_selectquery=mysqli_query($connection, $select_Query);
                      
                      while($row_data=mysqli_fetch_assoc($run_selectquery))
                      {
                        $brand_Name=$row_data['brand_name'];
                        $brand_ID=$row_data['brand_id'];
                        echo "<option value='$brand_ID'>$brand_Name</option>";
                      }
                    ?>
                </select>
            </div>

            <!-- Product Images -->
            <!-- Product Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="productImage1" class="form-label">Product Image 1</label>
                <input type="file" name="productImage1" id="productImage1" class="form-control" required="required">
            </div>

            <!-- Product Image 2-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="productImage2" class="form-label">Product Image 2</label>
                <input type="file" name="productImage2" id="productImage2" class="form-control" required="required">
            </div>

            <!-- Product Price-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" required="required">
            </div>

            <!-- Product Submit-->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-success" value="Insert Product">
            </div>

        </form>
    </div>

<!-- bootstrap Javascript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>