<?php

include("include/db.php");
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
	<form method="post" action="insert_product.php" enctype="multipart/form-data">
	<table width="700" align="center" border="1">
		<tr align="center">
			<td colspan="2"><h2>Insert product:</h2></td>
			</tr>
		<tr>
			<td><b>product title</b></td>
		<td><input type="text" name="product_title" /></td>
		</tr>
		<tr>
			<td><b>product category</b></td>
	<td>
			<select name="product_cat">
				<option> select a category</option>
				
					<?php
					$get_Cats = "select * from categories";
					$run_Cats = mysqli_query($con,$get_Cats);
					while($row_Cats=mysqli_fetch_array($run_Cats)){
						
						$cat_id = $row_Cats['cat_id'];
						$cat_title = $row_Cats['cat_title'];
						echo "<option value='$cat_id'>$cat_title</option>";
					}
					
				?>
				
				
			
			</td>
		</tr>
		<tr>
			<td><b>product brand</b></td>
    <td>
		<select name="product_brand">
				<option> select a brands</option>
			<?php
					$get_brands = "select * from brands";
					$run_brands = mysqli_query($con,$get_brands);
					while($row_brands=mysqli_fetch_array($run_brands)){
						
						$brand_id = $row_brands['brand_id'];
						$brand_title = $row_brands['brand_title'];
						echo "<option value='$brand_id'>$brand_title</option>";
					}
					
				?>
				
				
		
			
			
			</td>
		</tr>
		<tr>
			<td><b>product mig1</b></td>
     <td><input type="file" name="product_img1" /></td>
		</tr>
		<tr>
			<td><b>product mig2</b></td>
		<td><input type="file" name="product_img2" /></td>
			
		</tr>
		<tr>
			<td><b>product price</b></td>
		<td><input type="text" name="product_price" /></td>
		</tr>
		<tr>
			<td><b>product description</b></td>
			
		<td><input type="text" name="product_des" /></td>
		</tr>
		<tr>
		<td><input type="submit" name="submit" /></td>
		</tr>
		</form>

</table>

</html>
<?php
if(isset($_POST['insert_product'])){
	//text data variable
	$product_title = $_POST['product_title'];
	
	$product_cat = $_POST['product_cat'];
	
	$product_brand = $_POST['product_brand'];
	
	$product_price = $_POST['product_price'];
	
	$product_des = $_POST['product_des'];
	$status = 'on';
	//image name
	$product_img1 = $_FILES['product_img1']['name'];
	$product_img2 = $_FILES['product_img2']['name'];
	//temp
	$temp_name1 = $_FILES['product_img1']['temp_name'];
	$temp_name2 = $_FILES['product_img2']['temp_name'];
	if($product_title==''or $product_cat==''or $product_brand==''or $product_price==''or $product_des==''or $product_img1==''or $product_img2==''){
		
		echo"<script>alert('fill all the field!')</script>";
		exit();
	}
	else{
		move_uploaded_file($temp_name1,"product_images/$product_img1");
		move_uploaded_file($temp_name2,"product_images/$product_img2");
		$insert_product = "insert into product (cat_id,brand_id,date,product_title,product_img1,product_img2,product_price,product_des) value ('$product_cat','$product_brand',NOW(),'$product_title','$product_img1','$product_img2','$product_price','$product_des')";
		$run_product = mysqli_query($con,$insert_product);
		echo"<script>alert('product insert successfully')</script>";
	}
	
	
	
	
	
}
?>


