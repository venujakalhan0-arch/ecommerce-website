<!-- Connecting to the database -->
<?php
include('./includes/connection.php');
include('./functions/functions.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Kitchenora</title>
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="./css/style.css">
  </head>
  <body>
    <!--START: Navbar-->
    <div class="container-fluid p-0">
      <!--START: Primary NavBar-->
      <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><a class="navbar-brand text-light" href="./index.php">KITCHENORA |</a></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
              <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="#">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="#">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="#">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cart.php">
                  <i class="fa-solid fa-cart-shopping"><sup> <?php cart_item(); ?></sup></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>.00 LKR</a>
              </li>
            </ul>
            <form class="d-flex" action="search_products.php">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_products">
              <input type="submit" name="search_data_products" value="search" class="btn btn-outline-dark">
            </form>
          </div>
        </div>
      </nav>
      <!--END: Primary NavBar-->

      <!-- calling the cart function -->
      <?php
      cart();
      ?>

      <!--START: Welcome Bar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-secondary justify-content-center">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="#">Stylish, smart essentials for modern cooking</a>
            </li>
         </ul>
      </nav>
      <!--END: Welcome Bar-->

      <!--START: Content Area Heading -->
      <div class="bg-light">
        <h3 class="text-center"> Online Store </h3>
        <p class="text-center"> My Cart </p>
      </div>
      <!--END: Content Area Heading -->

     <!-- Shopping Cart View Area -->
     <div class="container">
        <div class="row">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Remove</th>
                <th>Operations</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <!-- Load Data from Cart Details Table -->
              <?php
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
                    
                    $product_item_price=$row_product_price['product_price'];
                    $product_name=$row_product_price['product_name'];
                    $product_image=$row_product_price['product_image1'];

                    $product_total=array_sum($product_price);
                    $total += $product_total;
                    // move loop end after the <TR> ..

                    
                  
              ?>
              <tr>
                <td> <?php echo $product_name;?></td>
                <td> <img src="admin/product_images/<?php echo $product_image; ?>" width="20%"> </td>
                <td> <input type="text" name=""> </td>
                <td> <?php echo $product_item_price; ?> Rs. </td>
                <td> <input type="checkbox" name=""> </td>
                <td> 
                  <button class="bg-warning border-0 py-2 mb-2">Update Record</button>
                  <button class="bg-danger border-0 py-2"><a class="cart-dbt text-dark" href="" style="text-decoration: none;"> Delete Record </a></button>
                </td>
              </tr>
              <?php
                  // contineuing the loops so that the <TR> will loop n Number of Times..
                }
              }
              ?>
            </tbody>
          </table>  
          <!-- Total -->
          <div class="d-flex mx-3">
            <a href="index.php"> <button class="px-2 mx-2">Continue Shopping </button> </a>
            <a href="#"> <button class="px-2 mx-2">Checkout </button> </a>
          </div>        
        </div> 
       
     </div>

    </div>
    <!-- Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>