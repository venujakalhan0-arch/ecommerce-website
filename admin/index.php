<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<!-- Navigation bar -->
	<div class="container-fluid p-0">
		<nav class="navbar navbar-expand-lg navbar-light bg-success">
        	<div class="container-fluid">
        		 <p class="text-light  mx-auto">WELCOME TO ADMIN DASHBOARD</p>
        	</div>
    	</nav>

    	<!-- Heading Area-->
    	<div class="bg-light text-center">
    		<h2> Admin Area </h2>
    	</div>

    	<!-- Options Area -->
    	
		
	<div class="container-fluid">
		<div class="row">
    		<div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
    			<!-- Avatar Area -->
    			<div>
    				<a href="#"><img src="../images/avatar.jpg" class="avatar"></a>
    				<p class="text-light text-center">Admin User</p>
    			</div>

    			<!-- Option Button Area-->
    			<div class="button text-center m-5 ">
    				<button> <a href="insert_products.php" class="nav-link bg-success text-light ">Insert Product</a> </button>
                    <button> <a href="index.php?insert_category" class="nav-link bg-success text-light">Insert Category</a> </button>
                    <button> <a href="index.php?insert_brand" class="nav-link bg-success text-light">Insert Brand</a> </button>
    			</div>
    		</div>
    	</div>
	</div>

        <!-- Contents Area -->
        <div class="container">
            <?php
                if(isset($_GET['insert_category']))
                {
                    include('insert_category.php');
                }

                if(isset($_GET['insert_brand']))
                {
                    include('insert_brand.php');
                }

                if(isset($_GET['insert_products']))
                {
                    include('insert_products.php');
                }
            ?>
        </div>
	</div>



<!-- Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>