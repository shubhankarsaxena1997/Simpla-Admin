<?php 
include 'header.php';

session_start();
if (isset($_SESSION['username'])) {
include('config.php');
	$pid = $_GET['ID'];
	$sql = "SELECT * FROM product WHERE product_id='$pid'";
	$data = mysqli_query($conn,$sql);
	$res = mysqli_fetch_assoc($data);
	if(isset($_POST['submit'])) {
		include('config.php');
		$category = $_POST['category'];
		$brand = $_POST['brands'];		
		$color = $_POST['colors'];		
		$tag = $_POST['tags'];		
		$pname = $_POST['product_name'];
		$price = $_POST['price'];
		if ($_FILES['image']['name']) {
			$imgname=$_FILES['image']['name'];
			$tempname=$_FILES['image']['tmp_name'];
			move_uploaded_file($tempname, "./upload/$imgname");
		}
		else{
			$imgname = $res['image'];
		}
					
			$qry = "UPDATE product SET category='$category', brand='$brand', color='$color',tag='$tag', product_name='$pname', image='$imgname', price='$price' WHERE product_id='$pid'";
			$run = mysqli_query($conn,$qry);

			if(!$run){
				echo "Error occured!";
			}
			else{
				header("location:dashboard.php");
			}
	}
	?>

	<body>
		<?php
		include 'sidebar.php';
		?>
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Content box</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab2">Update Forms</a></li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">


					<div class="tab-content default-tab" id="tab2">
					
						<form action="" method="POST" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
							
								<p>
									<label class="text-input medium-input" id="cat" name="category">Category</label>
									<select id="category" name="category">
										<option <?php if($res['category']=='Clothing'){ echo 'selected';}?> value="clothing">Clothing</option>
										<option <?php if($res['category']=='Electronics'){ echo 'selected';}?> value="electronics">Electronics</option>
										<option <?php if($res['category']=='Sports'){ echo 'selected';}?> value="sports">Sports</option>
									</select>
								</p>

								<p>
									<label class="text-input medium-input" id="brand" name="brand">Brand</label>
									<select id="brands" name="brands">
										<option <?php if($res['brand']=='Diesel'){ echo 'selected';}?> value="Diesel">Diesel</option>
										<option <?php if($res['brand']=='Calvin Klein'){ echo 'selected';}?> value="Calvin Klein">Calvin Klein</option>
										<option <?php if($res['brand']=='Tommy Hilfiger'){ echo 'selected';}?> value="Tommy Hilfiger">Tommy Hilfiger</option>
										<option <?php if($res['brand']=='Polo'){ echo 'selected';}?> value="Polo">Polo</option>
									</select>
								</p>

								<p>
									<label class="text-input medium-input" id="color" name="color">Color</label>
									<select id="colors" name="colors">
										<option <?php if($res['color']=='Violet'){ echo 'selected';}?> value="Violet">Violet</option>
										<option <?php if($res['color']=='Red'){ echo 'selected';}?> value="Red">Red</option>
										<option <?php if($res['color']=='Green'){ echo 'selected';}?> value="Green">Green</option>
										<option <?php if($res['color']=='Yellow'){ echo 'selected';}?> value="Yellow">Yellow</option>
										<option <?php if($res['color']=='Blue'){ echo 'selected';}?> value="Blue">Blue</option>
										<option <?php if($res['color']=='Black'){ echo 'selected';}?> value="Black">Black</option>
									</select>
								</p>

								<p>
									<label class="text-input medium-input" id="tag" name="tag">tag</label>
									<select id="tags" name="tags">
										<option <?php if($res['tag']=='Towel'){ echo 'selected';}?> value="Towel">Towel</option>
										<option <?php if($res['tag']=='Shoes'){ echo 'selected';}?> value="Shoes">Shoes</option>
										<option <?php if($res['tag']=='Coat'){ echo 'selected';}?> value="Coat">Coat</option>
										<option <?php if($res['tag']=='Dresses'){ echo 'selected';}?> value="Dresses">Dresses</option>
										<option <?php if($res['tag']=='Trousers'){ echo 'selected';}?> value="Trousers">Trousers</option>
										<option <?php if($res['tag']=='Backpack'){ echo 'selected';}?> value="Backpack">Backpack</option>
									</select>
								</p>

								<p>
									<label>Product ID</label>
									<!--<label>Small form input</label>-->
										<input class="text-input small-input" type="text" id="small-input" name="product_id" value="<?php echo $res['product_id']; ?>" /><!-- <span class="input-notification success png_bg">-->
								</p>
								
								<p>
									<label>Product Name</label>
									<input class="text-input small-input datepicker" type="text" id="small-input" name="product_name" value="<?php echo $res['product_name']; ?>" /><!-- <span class="input-notification error png_bg">Error message</span>-->
								</p>

								<p>
									<label>Price</label>
									<input class="text-input small-input datepicker" type="text" id="small-input" name="price" value="<?php echo $res['price']; ?>"/><!-- <span class="input-notification error png_bg">Error message</span>-->
								</p>
								<p>
									<label>Image</label>
									<input type="file" name="image">
									<a href="./upload/<?php echo $res['image']; ?>"><img src="./upload/<?php echo $res['image']; ?>" height="70" width="70"></a>
								</p>		

								<p>
									<input class="button" type="submit" name="submit" value="Submit">
								</p>
								
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear --> 
							
						</form>
						
					
			<div class="clear"></div>
			
			
			<?php include 'footer.php'; ?>
			
		</div> <!-- End #main-content -->
	</div></body>
</html>



<?php
}
else{
	
 	header('location:index.php');
 }
 ?>