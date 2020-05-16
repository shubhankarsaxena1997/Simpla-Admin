<?php
include 'header.php';
/*for inserting data from form to database*/
session_start();
if (isset($_SESSION['username'])) {
	if (isset($_POST['submit'])) {
		include('config.php');
		$category = $_POST['category'];
		$brand = $_POST['brands'];
		$color = $_POST['colors'];
		$tag = $_POST['tags'];
		$pid = $_POST['product_id'];
		$pname = $_POST['product_name'];
		$price = $_POST['price'];
		$imgname=$_FILES['image']['name'];
		$tempname=$_FILES['image']['tmp_name']; 

		$firstDestination = 'upload/' . $imgname;
		$secondDestination = '../default_fashi_template/fashi/upload/'. $imgname;
		move_uploaded_file($tempname, $firstDestination);
		copy($firstDestination, $secondDestination);
			
			$sql ="INSERT INTO product(category, brand, color, tag, product_id, product_name, image, price) VALUES ('$category','$brand','$color','$tag', '$pid', '$pname', '$imgname', '$price')";
			$run = mysqli_query($conn,$sql);
			if(!$run){
				echo "Error occured!";
			}
			else{
				header('location:dashboard.php');
			}
		}


	/*for fetching data from database to table*	
	include 'config.php';
	$query = "SELECT * FROM product ";
	$result = mysqli_query($conn,$query);*/
	
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
			
			<!-- Page Head -->
			<h2>Welcome John</h2>
			<p id="page-intro">What would you like to do?</p>
			
			<ul class="shortcut-buttons-set">
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/pencil_48.png" alt="icon" /><br />
					Write an Article
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
					Create a New Page
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/image_add_48.png" alt="icon" /><br />
					Upload an Image
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/clock_48.png" alt="icon" /><br />
					Add an Event
				</span></a></li>
				
				<li><a class="shortcut-button" href="#messages" rel="modal"><span>
					<img src="resources/images/icons/comment_48.png" alt="icon" /><br />
					Open Modal
				</span></a></li>
				
			</ul><!-- End .shortcut-buttons-set -->
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Content box</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Table</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Forms</a></li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<div class="notification attention png_bg">
							<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
							</div>
						</div>
						
						<div class="tab-content default-tab" id="pagination-data">	
							
							<!--     Pagination      -->

						</div>
						
					</div>	
					
					<div class="tab-content" id="tab2">
					
						<form action="" method="POST" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
							
								<p>
									<label class="text-input medium-input" id="cat" name="category">Product Category</label>
									<select id="category" name="category">
										<option value="">Select</option>
										<?php 
										include('config.php');
										$qry = "SELECT * FROM category";
										$run = mysqli_query($conn,$qry);
										{
											foreach ($run as $category) {?>
												<option value="<?php echo $category['cat_name']; ?>">
												<?php echo $category['cat_name']; ?></option>
										<?php } } ?>
									</select>
								</p>

								<p>
									<label class="text-input small-input" id="brand" name="brand">Product Brand</label>
									<select id="brands" name="brands">
										<option value="">Select</option>
										<?php 
										include('config.php');
										$qry = "SELECT * FROM brand";
										$run = mysqli_query($conn,$qry);
										{
											foreach ($run as $brand) {?>
												<option value="<?php echo $brand['brand_name']; ?>">
												<?php echo $brand['brand_name']; ?></option>
										<?php } } ?>
									</select>
								</p>
								<p>
									<label class="text-input small-input" id="color" name="color">Product Color</label>
									<select id="colors" name="colors">
										<option value="">Select</option>
										<?php 
										include('config.php');
										$qry = "SELECT * FROM color";
										$run = mysqli_query($conn,$qry);
										{
											foreach ($run as $color) {?>
												<option value="<?php echo $color['color_name']; ?>">
												<?php echo $color['color_name']; ?></option>
										<?php } } ?>
									</select>
								</p>

								<p>
									<label class="text-input small-input" id="tag" name="tag">Product Tag</label>
									<select id="tags" name="tags">
										<option value="">Select</option>
										<?php 
										include('config.php');
										$qry = "SELECT * FROM tag";
										$run = mysqli_query($conn,$qry);
										{
											foreach ($run as $tag) {?>
												<option value="<?php echo $tag['tag_name']; ?>">
												<?php echo $tag['tag_name']; ?></option>
										<?php } } ?>
									</select>
								</p>


								<p>
									<label>Product ID</label>
									<!--<label>Small form input</label>-->
										<input class="text-input small-input" type="text" id="small-input" name="product_id" /><!-- <span class="input-notification success png_bg">Successful message</span> --><!-- Classes for input-notification: success, error, information, attention -->
									<!--	<br /><small>A small description of the field</small>-->
								</p>
								
								<p>
									<label>Product Name</label>
									<input class="text-input small-input datepicker" type="text" id="small-input" name="product_name" /><!-- <span class="input-notification error png_bg">Error message</span>-->
								</p>
								<p>
									<label>Price</label>
									<input class="text-input small-input datepicker" type="text" id="small-input" name="price" /><!-- <span class="input-notification error png_bg">Error message</span>-->
								</p>
								<p>
									<label>Image</label>
									<input type="file" name="image">
								</p>		

								<p>
									<input class="button" type="submit" name="submit" value="Submit">
								</p>						
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear --> 
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box --> 
			
			<div class="content-box column-left">
				
				<div class="content-box-header">
					
					<h3>Content box left</h3>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab">
					
						<h4>Maecenas dignissim</h4>
						<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo.
						</p>
						
					</div> <!-- End #tab3 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			<div class="content-box column-right closed-box">
				
				<div class="content-box-header"> <!-- Add the class "closed" to the Content box header to have it closed by default -->
					
					<h3>Content box right</h3>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab">
					
						<h4>This box is closed by default</h4>
						<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo.
						</p>
						
					</div> <!-- End #tab3 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			<div class="clear"></div>
			
			
			<!-- Start Notifications -->
			
			<div class="notification attention png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. 
				</div>
			</div>
			
			<div class="notification information png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Information notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<div class="notification success png_bg">
				<a href="#" class="close">
					<img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Success notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<div class="notification error png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Error notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<!-- End Notifications -->
			
			<?php include 'footer.php'; ?>
			
		</div> <!-- End #main-content -->
	</div>
</body>
</html>

<script>
	$(document).ready(function () {
		loadTable();
		function loadTable(page){
		$j.ajax({
			url : "pagination.php",
			type : "POST",
			data : {page : page},
			success : function(data){
				$("#pagination-data").html(data);
			}

		})
		}
		$j(document).on('click', '.pagination_link', function(){  
		 	var page = $(this).attr("id");  
			loadTable(page);  
		});  
		$j(document).on('click', '.first_page', function(){
			var page = $(this).attr("id");
			loadTable(page);
		});
		$j(document).on('click', '.last_page', function(){
			var page = $(this).attr("id");
			
			loadTable(page);
		});

		$j(document).on('click', '.prev_page', function(){
			var page = $(this).attr("id");
			loadTable(page);
		})

		$j(document).on('click', '.next_page', function(){
			var page = $(this).attr("id");
			loadTable(page);
		});			
	});  
</script> 
<!-- <div class="tab-content default-tab" id="pagination-data">	 -->


}?>

<?php
}
else{
	
 	header('location:index.php');
}
?>
