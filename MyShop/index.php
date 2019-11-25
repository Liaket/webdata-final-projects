<?php
include("include/db.php");


?>


<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>My Shop</title>
<link rel="stylesheet" href="styles/style.css" media="all" />
	
	
</head>

<body>

	<div class="main_wrapper">

	
	<div class="header_wrapper">
		<img src="images/q.png" style="float: left;">
		
	
	
	
	</div>
	<div id="navbar">
		<ul id="menu">
			<li><a href="#">Home</a></li>
			<li><a href="#">All product</a></li>
			
			<li><a href="#">My Account</a></li>
			
			<li><a href="#">sing up</a></li>
			
			<li><a href="#">shopping card</a></li>
			
			<li><a href="#">contact us </a></li>
			</ul>
		<div id="form"
		<form method="get" action="results.php" enctype="multipart/form-data">
			<input type="text"name="user_query" placeholder="search a product"/>
			
			<input type="submit"name="search" value="search"/>
		</form>
		
		   </div>
	
	
	
		</div>
		
	<div class="content_wrapper">
			
		<div id="left_sidebar">
			<div>
			
			<div id="sidebar_title">Categories</div>
				
				<ul id="Cats">
					
					<?php
					$get_Cats = "select * from categories";
					$run_Cats = mysqli_query($con,$get_Cats);
					while($row_Cats=mysqli_fetch_array($run_Cats)){
						
						$cat_id = $row_Cats['cat_id'];
						$cat_title = $row_Cats['cat_title'];
						echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
					}
					
				?>
				
				</ul>
				
			<div id="sidebar_title">Brand</div>
				<ul id="Cats">
					<?php
					$get_brands = "select * from brands";
					$run_brands = mysqli_query($con,$get_brands);
					while($row_brands=mysqli_fetch_array($run_brands)){
						
						$brand_id = $row_brands['brand_id'];
						$brand_title = $row_brands['brand_title'];
						echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
					}
					
				?>
				
				</ul>
					
			
			</div>
		<div id="right_content"right content</div>	
		
	
		
	
	
     	
		
		
		
		</div>
	<div>Footer</div>
		<h1 style="color:cornflowerblue;padding-top: 30px;text-align: center; ">&copy; 2005- by www.oneline.com</l1>
	</div>
</body>
</html>