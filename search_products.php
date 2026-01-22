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
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
            <form class="d-flex">
              <input class="form-control mx-2" type="search" placeholder="Search" aria-label="Search" name="search_products">
              <input type="submit" name="search_data_products" value="search" class="btn btn-outline-dark">
            </form>
          </div>
        </div>
      </nav>
      <!--END: Primary NavBar-->

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
        <p class="text-center"> Everthing you need under one roof</p>
      </div>
      <!--END: Heading Area-->

      <!--START: Content Area -->
      <div class="row p-2">
        <!-- Products Area -->
        <div class="col-md-10">
          <div class="row">
            <!-- fetching products from database -->
            <?php
            // calling the search products function
            search_products();
            // Show only selected categories products
            getFilteredCategories();
            // show only selected brands products
            getFilteredBrands();
            ?>
          </div>
        </div>

        <!-- Sidenav Area -->
        <div class="col-md-2 bg-success p-0">

          <!-- Brands to be displayed -->
          <ul class="navbar-nav mx-auto">
            <li class="nav-item bg-secondary text-center">
              <a href="#" class="nav-link text-light"><h4>Brands</h4></a>
            </li>
            <!-- Calling the Brands Table -->
            <?php
              // calling the getBrands function
            getBrands();
            ?>
          </ul>

          <!-- Categories to be displayed -->
          <ul class="navbar-nav me-auto">
            <li class="nav-item bg-secondary text-center">
              <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
            </li>
            <!-- Caling the Categories Table -->
            <?php
            // calling getCategories function
            getCategories();
            ?>
          </ul>
        </div>

      </div>
      <!--END: Content Area-->
    </div>
    <!-- Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>