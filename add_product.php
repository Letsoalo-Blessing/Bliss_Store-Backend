<?php

session_start();
include("includes/db.php");
include("includes/functions.php");
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Product</title>
    <meta name="description" content="Administrator">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.png">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
					<span class="menu-title"></span>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Product</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="add_product.php">Add Product</a></li>
                            <li><a href="view_product.php">View Product</a></li>
                            <li><a href="edit_product.php">Update Product</a></li>
                            <li><a href="delete_product.php">Delete Product</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Customers</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="customer_details.php">Customer Details</a></li>
                        </ul>
                    </li>
                    

  
                    <h3 class="menu-title">Administrator</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>User</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.php">Login</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.php">Register</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.png" alt="User Avatar">
                        </a>
                        
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#staticModal"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

					
                    <div class="language-select dropdown" id="language-select">
                        <h6 style="color:Grey">
                        <?php
                            if(isset($_SESSION['username'])){

                                echo $_SESSION['username'];
                            }else{

                                echo "Hi Guest";
                            }
                        ?>
                        </h6>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="Index.html">Dashboard</a></li>
                            <li><a href="Add_product.html">Product</a></li>
                            <li class="active">Add Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Add Product</strong> Form
                    </div>
                    <div class="card-body card-block" ng-app="myApp" ng-controller="ProductCtrl">
                        <form action="add_product.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product ID</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="txtprodID" name="prodID" placeholder="Enter Product ID" class="form-control" ng-model="prodID">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Description</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="txtDescr" name="Descr" placeholder="Enter Product Description" class="form-control" ng-model="Descr">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Quantity</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="number" id="txtQty" name="Qty" placeholder="Enter Product Quantity" class="form-control" ng-model="Qty">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Unit Price</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="txtunitPrice" name="unitPrice" placeholder="Enter Product Price" class="form-control" ng-model="UnitPrice">
                                </div>
                            </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Category</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="category" id="select" class="form-control" ng-model="Category">
                                            <option value="0">Please select</option>
                                            <option value="Accessories">Accessories</option>
                                            <option value="Phones">Phones & Tabloids</option>
                                            <option value="tvGames">Tv and Video Games</option>
                                            <option value="Camera">Cameras</option>
                                            <option value="Laptops">Laptops</option>
                                            <option value="Clothing">Clothing</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Product Image</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-input" name="product_img1" class="form-control-file" ng-model="image">
                                    </div>
                                </div>
                                
                                    <button type="submit" class="btn btn-primary btn-sm" name="insert_product">
                                        <i class="fa fa-dot-circle-o"></i> Insert Product
                                    </button>
                                
                        </form>
                    </div>
                    
                </div>
            </div>
            <?php
	
                if(isset($_POST['insert_product'])){
                
                //text data variables
                    $product_ID = $_POST['prodID'];
                    $product_Descr   = $_POST['Descr'];
                    $product_qty = $_POST['Qty'];
                    $product_price = $_POST['unitPrice'];
                    $product_category = $_POST['category'];
                    
                //image names
                    $product_img1 = $_FILES['product_img1']['name'];

                    
                //image temp names
                    $temp_img1 = $_FILES['product_img1']['tmp_name'];

                
                //uploading images to its folder
                    move_uploaded_file($temp_img1,"product-images/$product_img1");

        
                       
                        
                      
                            $insert_product = "insert into tblproduct (prodID,Descr,Qty,unitPrice, image, category)
                            values ('$product_ID','$product_Descr','$product_qty','$product_price','product-images/$product_img1','$product_category') ";

                            $run_product= mysqli_query($conn,$insert_product);

                            if($run_product){
                                    echo "<script>alert('Product Inserted successfully')</script>";
                                }
        }

         ?>
            <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Ready to leave</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                               Do you want to Log Out ?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="logout.php">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- .content -->
		
    </div><!-- /#right-panel -->

    <!-- Creating angular module using Javascript -->
    <script>

        var app = angular.module("myApp", []);
                app.controller("ProductCtrl", function($scope, $http) {
                    $scope.insertData=function(){
                        $http.post(
                            "Insert_mysql.php",
                            {'prodID':$http.prodID,'Descr':$http.Descr,'Qty':$http.Qty,'unitPrice':$http.unitPrice,'image':$http.image,'category':$http.Category}
                        ).success(function(data){
                            alert(data);
                        });
                    }
                });
    </script>

    <!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
