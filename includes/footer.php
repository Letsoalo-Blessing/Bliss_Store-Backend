<?php

	$servername ="localhost";
	$username="root";
	$password="";
	$dbname="projectDB";

	//create connection
	$db = mysqli_connect($servername,$username,$password,$dbname);
	
function prodModal(){
	global $db;
	if(!isset($_GET['prodModal'])){

		$pro_id = $_GET['prodModal'];
		
		$get_products = "select * from tblproduct where prodID='$pro_id'";
	
		
		$run_products = mysqli_query($db,$get_products);

		if(mysqli_num_rows($run_products)>0){
			echo "No product Found";
		}

		while($row_products =mysql_fetch_array($get_products, MYSQL_BOTH)){

			$pro_id = $row_products['prodID'];
			$pro_Descr = $row_products['Descr'];
			$pro_cat = $row_products['category'];
			$pro_price = $row_products['unitPrice'];
			$pro_image = $row_products['image'];

			echo "
		<!-- Product Content -->

			<!-- breadcrumb -->
			<div class='bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm'>
				<a href='index.php' class='s-text16'>
					Home
					<i class='fa fa-angle-right m-l-8 m-r-9' aria-hidden='true'></i>
				</a>

				<a href='#' class='s-text16'>
					$pro_cat
					<i class='fa fa-angle-right m-l-8 m-r-9' aria-hidden='true'></i>
				</a>

				<span class='s-text17'>
					$pro_Descr
				</span>
			</div>

			<!-- Product Detail -->
<div class='container bgwhite p-t-35 p-b-80'>
	<div class='flex-w flex-sb'>
		<div class='w-size13 p-t-30 respon5'>
			<div class='wrap-slick3 flex-sb flex-w'>
				<div class='slick3'>
						<div class='wrap-pic-w'>
							<img src='$pro_image' alt='$pro_image'>
						</div>
				</div>
			</div>
		</div>

		<div class='w-size14 p-t-30 respon5'>
			<h4 class='product-detail-name m-text16 p-b-13'>
			$pro_Descr
			</h4>

			<span class='m-text17'>
				$pro_price
			</span><br />
			<!--  -->

			<div class='m-text17'>
				<span class='s-text8 m-r-35'>SKU: $pro_id</span>
				<span class='s-text8'>Categories: $pro_cat</span>
			</div><br />

			<!--  -->
			<div class='wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content'>
				<h5 class='js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4'>
					Description
					<i class='down-mark fs-12 color1 fa fa-minus dis-none' aria-hidden='true'></i>
					<i class='up-mark fs-12 color1 fa fa-plus' aria-hidden='true'></i>
				</h5>

				<div class='dropdown-content dis-none p-t-15 p-b-23'>
					<p class='s-text8'>
						Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
					</p>
				</div>
			</div>
			
			<div class='p-t-33 p-b-60'>
				<div class='flex-r-m flex-w p-t-10'>
					<div class='w-size16 flex-m flex-w'>
						<div class='btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10'>
							<!-- Button -->
							<button class='flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4'>
								Add to Cart
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Product Content -->

		";
		}
	}
			
	}
//displaying all products
function getPro(){
	global $db;
	if(!isset($_GET['cat'])){
	
					$get_products = "select * from tblproduct";
	}
	
	//showing particular category products
	else{
					$pro_id = $_GET['ProdID'];
					$get_products = "select * from tblproduct where prodID='$pro_id' order ASC";
	}
					$run_products = mysqli_query($db,$get_products);
					
					$count = mysqli_num_rows($run_products);
					if($count==0){
						echo "<br /><br/>
						<h2 class='m-text14 p-b-7'>
						No Products Found !!
						</h2>";	
					}
					
					while($row_products = mysqli_fetch_array($run_products)){
						
						$pro_id = $row_products['prodID'];
						$pro_title = $row_products['Descr'];
						$pro_price = $row_products['unitPrice'];
						$pro_img1 = $row_products['image'];
					
					
					echo "
					<div class='col-sm-12 col-md-6 col-lg-4 p-b-50'>
					<!-- Block2 -->
					<div class='block2'>
						<div class='block2-img wrap-pic-w of-hidden pos-relative'>
							<img src='$pro_img1' alt='IMG-PRODUCT'>
							<div class='block2-overlay trans-0-4'>
								<a href='#' class='block2-btn-addwishlist hov-pointer trans-0-4'>
									<i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>
									<i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i>
								</a>

								<div class='block2-btn-addcart w-size1 trans-0-4'>
									<!-- Button -->
									<a href='product.php?add_cart=$pro_id' class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>
										Add to Cart
									</a>
									
								</div>
							</div>
						</div>
						<div class='block2-txt p-t-20'>
						<a href='product-detail.php?prodModal=$pro_id'>
								$pro_title
						</a><br />
							<span class='block2-price m-text6 p-r-5' name='unitPrice'>
								R $pro_price
							</span>
						</div>
					</div>
				</div>";
					}
					
	
}
function getClothing(){
	global $db;
	if(!isset($_GET['cat'])){
	
					$get_products = "select * from tblproduct where category like 'clothing'";
	}
	
	//showing particular category products
	else{
					$pro_id = $_GET['ProdID'];
					$get_products = "select * from tblproduct where prodID='$pro_id' order ASC";
	}
					$run_products = mysqli_query($db,$get_products);
					
					$count = mysqli_num_rows($run_products);
					if($count==0){
						echo "<br /><br/>
						<h2 class='m-text14 p-b-7'>
						No Products Found !!
						</h2>";	
					}
					
					while($row_products = mysqli_fetch_array($run_products)){
						
						$pro_id = $row_products['prodID'];
						$pro_title = $row_products['Descr'];
						$pro_price = $row_products['unitPrice'];
						$pro_img1 = $row_products['image'];
					
					
					echo "
					<div class='col-sm-12 col-md-6 col-lg-4 p-b-50'>
					<!-- Block2 -->
					<div class='block2'>
						<div class='block2-img wrap-pic-w of-hidden pos-relative'>
							<img src='$pro_img1' alt='IMG-PRODUCT' width='620' height='350' >
							<div class='block2-overlay trans-0-4'>
								<a href='#' class='block2-btn-addwishlist hov-pointer trans-0-4'>
									<i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>
									<i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i>
								</a>

								<div class='block2-btn-addcart w-size1 trans-0-4'>
									<!-- Button -->
									<a href='product.php?add_cart=$pro_id' class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>
										Add to Cart
									</a>
									
								</div>
							</div>
						</div>
						<div class='block2-txt p-t-20'>
						<a href='product-detail.php?prodModal=$pro_id'>
								$pro_title
						</a><br />
							<span class='block2-price m-text6 p-r-5' name='unitPrice'>
								R $pro_price
							</span>
						</div>
					</div>
				</div>";
					}
					
	
}
function getAccessories(){
	global $db;
	if(!isset($_GET['cat'])){
	
					$get_products = "select * from tblproduct where category like 'accessories'";
	}
	
	//showing particular category products
	else{
					$pro_id = $_GET['ProdID'];
					$get_products = "select * from tblproduct where prodID='$pro_id' order ASC";
	}
					$run_products = mysqli_query($db,$get_products);
					
					$count = mysqli_num_rows($run_products);
					if($count==0){
						echo "<br /><br/>
						<h2 class='m-text14 p-b-7'>
						No Products Found !!
						</h2>";	
					}
					
					while($row_products = mysqli_fetch_array($run_products)){
						
						$pro_id = $row_products['prodID'];
						$pro_title = $row_products['Descr'];
						$pro_price = $row_products['unitPrice'];
						$pro_img1 = $row_products['image'];
					
					
					echo "
					<div class='col-sm-12 col-md-6 col-lg-4 p-b-50'>
					<!-- Block2 -->
					<div class='block2'>
						<div class='block2-img wrap-pic-w of-hidden pos-relative'>
							<img src='$pro_img1' alt='IMG-PRODUCT' width='620' height='350' >
							<div class='block2-overlay trans-0-4'>
								<a href='#' class='block2-btn-addwishlist hov-pointer trans-0-4'>
									<i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>
									<i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i>
								</a>

								<div class='block2-btn-addcart w-size1 trans-0-4'>
									<!-- Button -->
									<a href='product.php?add_cart=$pro_id' class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>
										Add to Cart
									</a>
									
								</div>
							</div>
						</div>
						<div class='block2-txt p-t-20'>
						<a href='product-detail.php?prodModal=$pro_id'>
								$pro_title
						</a><br />
							<span class='block2-price m-text6 p-r-5' name='unitPrice'>
								R $pro_price
							</span>
						</div>
					</div>
				</div>";
					}
					
	
}
function getLaptops(){
	global $db;
	if(!isset($_GET['cat'])){
	
					$get_products = "select * from tblproduct where category like 'Laptops'";
	}
	
	//showing particular category products
	else{
					$pro_id = $_GET['ProdID'];
					$get_products = "select * from tblproduct where prodID='$pro_id' order ASC";
	}
					$run_products = mysqli_query($db,$get_products);
					
					$count = mysqli_num_rows($run_products);
					if($count==0){
						echo "<br /><br/>
						<h2 class='m-text14 p-b-7'>
						No Products Found !!
						</h2>";	
					}
					
					while($row_products = mysqli_fetch_array($run_products)){
						
						$pro_id = $row_products['prodID'];
						$pro_title = $row_products['Descr'];
						$pro_price = $row_products['unitPrice'];
						$pro_img1 = $row_products['image'];
					
					
					echo "
					<div class='col-sm-12 col-md-6 col-lg-4 p-b-50'>
					<!-- Block2 -->
					<div class='block2'>
						<div class='block2-img wrap-pic-w of-hidden pos-relative'>
							<img src='$pro_img1' alt='IMG-PRODUCT' width='620' height='350' >
							<div class='block2-overlay trans-0-4'>
								<a href='#' class='block2-btn-addwishlist hov-pointer trans-0-4'>
									<i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>
									<i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i>
								</a>

								<div class='block2-btn-addcart w-size1 trans-0-4'>
									<!-- Button -->
									<a href='product.php?add_cart=$pro_id' class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>
										Add to Cart
									</a>
									
								</div>
							</div>
						</div>
						<div class='block2-txt p-t-20'>
						<a href='product-detail.php?prodModal=$pro_id'>
								$pro_title
						</a><br />
							<span class='block2-price m-text6 p-r-5' name='unitPrice'>
								R $pro_price
							</span>
						</div>
					</div>
				</div>";
					}
					
	
}
function getCameras(){
	global $db;
	if(!isset($_GET['cat'])){
	
					$get_products = "select * from tblproduct where category like 'Camera'";
	}
	
	//showing particular category products
	else{
					$pro_id = $_GET['ProdID'];
					$get_products = "select * from tblproduct where prodID='$pro_id' order ASC";
	}
					$run_products = mysqli_query($db,$get_products);
					
					$count = mysqli_num_rows($run_products);
					if($count==0){
						echo "<br /><br/>
						<h2 class='m-text14 p-b-7'>
						No Products Found !!
						</h2>";	
					}
					
					while($row_products = mysqli_fetch_array($run_products)){
						
						$pro_id = $row_products['prodID'];
						$pro_title = $row_products['Descr'];
						$pro_price = $row_products['unitPrice'];
						$pro_img1 = $row_products['image'];
					
					
					echo "
					<div class='col-sm-12 col-md-6 col-lg-4 p-b-50'>
					<!-- Block2 -->
					<div class='block2'>
						<div class='block2-img wrap-pic-w of-hidden pos-relative'>
							<img src='$pro_img1' alt='IMG-PRODUCT' width='620' height='350' >
							<div class='block2-overlay trans-0-4'>
								<a href='#' class='block2-btn-addwishlist hov-pointer trans-0-4'>
									<i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>
									<i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i>
								</a>

								<div class='block2-btn-addcart w-size1 trans-0-4'>
									<!-- Button -->
									<a href='product.php?add_cart=$pro_id' class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>
										Add to Cart
									</a>
									
								</div>
							</div>
						</div>
						<div class='block2-txt p-t-20'>
						<a href='product-detail.php?prodModal=$pro_id'>
								$pro_title
						</a><br />
							<span class='block2-price m-text6 p-r-5' name='unitPrice'>
								R $pro_price
							</span>
						</div>
					</div>
				</div>";
					}
					
	
}
function gettvGames(){
	global $db;
	if(!isset($_GET['cat'])){
	
					$get_products = "select * from tblproduct where category like 'tvGames'";
	}
	
	//showing particular category products
	else{
					$pro_id = $_GET['ProdID'];
					$get_products = "select * from tblproduct where prodID='$pro_id' order ASC";
	}
					$run_products = mysqli_query($db,$get_products);
					
					$count = mysqli_num_rows($run_products);
					if($count==0){
						echo "<br /><br/>
						<h2 class='m-text14 p-b-7'>
						No Products Found !!
						</h2>";	
					}
					
					while($row_products = mysqli_fetch_array($run_products)){
						
						$pro_id = $row_products['prodID'];
						$pro_title = $row_products['Descr'];
						$pro_price = $row_products['unitPrice'];
						$pro_img1 = $row_products['image'];
					
					
					echo "
					<div class='col-sm-12 col-md-6 col-lg-4 p-b-50'>
					<!-- Block2 -->
					<div class='block2'>
						<div class='block2-img wrap-pic-w of-hidden pos-relative'>
							<img src='$pro_img1' alt='IMG-PRODUCT' width='620' height='350' >
							<div class='block2-overlay trans-0-4'>
								<a href='#' class='block2-btn-addwishlist hov-pointer trans-0-4'>
									<i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>
									<i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i>
								</a>

								<div class='block2-btn-addcart w-size1 trans-0-4'>
									<!-- Button -->
									<a href='product.php?add_cart=$pro_id' class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>
										Add to Cart
									</a>
									
								</div>
							</div>
						</div>
						<div class='block2-txt p-t-20'>
						<a href='product-detail.php?prodModal=$pro_id'>
								$pro_title
						</a><br />
							<span class='block2-price m-text6 p-r-5' name='unitPrice'>
								R $pro_price
							</span>
						</div>
					</div>
				</div>";
					}
					
	
}
function getPhones(){
	global $db;
	if(!isset($_GET['cat'])){
	
					$get_products = "select * from tblproduct where category like 'phones'";
	}
	
	//showing particular category products
	else{
					$pro_id = $_GET['ProdID'];
					$get_products = "select * from tblproduct where prodID='$pro_id' order ASC";
	}
					$run_products = mysqli_query($db,$get_products);
					
					$count = mysqli_num_rows($run_products);
					if($count==0){
						echo "<br /><br/>
						<h2 class='m-text14 p-b-7'>
						No Products Found !!
						</h2>";	
					}
					
					while($row_products = mysqli_fetch_array($run_products)){
						
						$pro_id = $row_products['prodID'];
						$pro_title = $row_products['Descr'];
						$pro_price = $row_products['unitPrice'];
						$pro_img1 = $row_products['image'];
					
					
					echo "
					<div class='col-sm-12 col-md-6 col-lg-4 p-b-50'>
					<!-- Block2 -->
					<div class='block2'>
						<div class='block2-img wrap-pic-w of-hidden pos-relative'>
							<img src='$pro_img1' alt='IMG-PRODUCT' width='620' height='350' >
							<div class='block2-overlay trans-0-4'>
								<a href='#' class='block2-btn-addwishlist hov-pointer trans-0-4'>
									<i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>
									<i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i>
								</a>

								<div class='block2-btn-addcart w-size1 trans-0-4'>
									<!-- Button -->
									<a href='product.php?add_cart=$pro_id' class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>
										Add to Cart
									</a>
									
								</div>
							</div>
						</div>
						<div class='block2-txt p-t-20'>
						<a href='product-detail.php?prodModal=$pro_id'>
								$pro_title
						</a><br />
							<span class='block2-price m-text6 p-r-5' name='unitPrice'>
								R $pro_price
							</span>
						</div>
					</div>
				</div>";
					}
					
	
}
//getting user IP
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

//adding to cart  
function cart(){
	
	if(isset($_GET['add_cart'])){
		global $conn;
		$ip=getIp();
		$pro_id = $_GET['add_cart'];
		$check_pro = "select * from tblcart where ip_add='$ip' AND prod_id='$pro_id'";
		
		$run_check = mysqli_query($conn,$check_pro);
		
		if(mysqli_num_rows($run_check)>0){
			echo "";	
		}
		else{
			$insert_pro = "insert into tblcart (prod_id,ip_add,qty) values ('$pro_id','$ip',1)";
			$run_pro = mysqli_query($conn,$insert_pro);
			
			echo "<script>window.open('product.php','_self')</script>";
		}
	}
}

//Truncate items in the cart
function Truncate(){
	global $conn;
	$ip=getIp();
	$get_items = "Truncate * from tblcart where ip_add='$ip'";
	$run_items = mysqli_query($conn,$get_items);
	
	
}

//getting total items in the cart
function total_items(){
	global $conn;
	$ip=getIp();
	$get_items = "select * from tblcart where ip_add='$ip'";
	$run_items = mysqli_query($conn,$get_items);
	$count_items = mysqli_num_rows($run_items);
	
	echo $count_items;
}

//getting total price pf the cart
function total_price(){
	
	$total=0;
	
	global $conn;
	$ip=getIp();
	$get_items = "select * from tblcart where ip_add='$ip'";
	$run_items = mysqli_query($conn,$get_items);
	
	while($p_price=mysqli_fetch_array($run_items)){
		
		$pro_id = $p_price['prod_id'];
		$pro_price="select * from tblproduct where prodID='$pro_id'"; 
		$run_pro_price = mysqli_query($conn,$pro_price);
		
			while($pp_price=mysqli_fetch_array($run_pro_price)){
					$pro_price = array($pp_price['unitPrice']);
					$values = array_sum($pro_price);
					
					$total+=$values;
			}
	}
	echo "R ".$total;
}


?>






