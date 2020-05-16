<?php 
	include 'config.php';

	$record_per_page = 6;  
	$page = '';  
	$output = '';  
	if(isset($_POST["page"]))  
	{  
	    $page = $_POST["page"];  
	}  
	else  
	{  
	    $page = 1;  
	}


	$start_from = ($page - 1) * $record_per_page;  
	 $query = "SELECT * FROM product LIMIT $start_from, $record_per_page";  
	 $result = mysqli_query($conn, $query);  
	 $output .= "  
	      		<table>				
					<thead>
						<tr>
							<th><input class='check-all' type='checkbox'/></th>
							<th>Category</th>
							<th>Brand</th>
							<th>Color</th>
							<th>Tag</th>
							<th>Produt ID</th>
							<th>Produt Name</th>
							<th>Price</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>
			 ";	
					
			while($rows = mysqli_fetch_assoc($result))  
			 {  
			      $output .= '  
			           <tbody>
				           	<tr>
								<td><input type="checkbox"/></td>
								<td>'.$rows["category"].'</td>
								<td>'.$rows["brand"].'</td>
								<td>'.$rows["color"].'</td>
								<td>'.$rows["tag"].'</td>
								<td>'.$rows["product_id"].'</td>
								<td>'.$rows["product_name"].'</td>						
								<td>'.$rows["price"].'</td>
								<td>
									<a href="./upload/'.$rows['image'].'"><img src="./upload/'.$rows['image'].'." width="60" height="60">
									</a>
								</td>										
								<td>											
									<a href="update_pro.php?ID='.$rows['product_id'].'" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" />
									</a>
									<a href="delete_pro.php?ID='.$rows['product_id'].'" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" />
									</a>								
								</td>
							</tr> 
			           </tbody>';  
	 }  
	 //$output .= '</table>';  
	$page_query = "SELECT * FROM product";  
	$page_result = mysqli_query($conn, $page_query);  
	$total_prdct = mysqli_num_rows($page_result);  
	$total_pages = ceil($total_prdct/$record_per_page);
	$first = 1;
	$last = ceil($total_prdct/$record_per_page);  
	$prev = $page -1;
	$next = $page +1; 
	$output.='
				<tfoot>
					<tr>
						<td colspan="9">
							<div class="bulk-actions align-left">
								<select name="dropdown">
									<option value="option1">Choose an action...</option>
									<option value="option2">Edit</option>
									<option value="option3">Delete</option>
								</select>
								<a class="button" href="#">Apply to selected</a>
							</div>
										
							<div class="pagination">
								<span title="First Page" class="first_page " style="cursor:pointer; color: #57a000" id="'.$first.'">&laquo; First</span>&nbsp&nbsp
								<span title="Previous Page" class="prev_page" style="cursor:pointer; color: #57a000;" id="'.$prev.'"> &laquo; Previous</span>&nbsp&nbsp';						
							
								for($i=1; $i<=$total_pages; $i++) {
								$output .="<span class='pagination_link' id='".$i."' style='cursor:pointer; color: #57a000'   title=''>".$i.'&nbsp'. "</span>&nbsp";
								}

												
								$output .= '<span title="Next Page" class="next_page" style="cursor:pointer; color: #57a000" 			id="'.$next.'">Next &raquo;</span>&nbsp&nbsp
											<span title="Last Page" class="last_page" style="cursor:pointer; color: #57a000 "id="'.$last.'" >Last &raquo;
											</span>
							</div> <!-- End .pagination -->
							<div class="clear"></div>
						</td>
					</tr>
				</tfoot>	

</table>';							   
echo $output;
?>
