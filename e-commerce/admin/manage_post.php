<?php
require('top.inc.php');
isAdmin();
$catg_id='';
$catg_title='';
$product_title='';
$product_keyword='';
$product_excerpt='';
$product_desc='';
$product_img='';
$temp_name='';
$msg='';
if(isset($_GET['product_id']) && $_GET['product_id']!=''){
	$product_id=get_safe_value($con,$_GET['product_id']);
	$res=mysqli_query($con,"select * from products inner join categories on products.catg_id=categories.catg_id where product_id='$product_id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$catg_id=$row['catg_id'];
		$catg_title=$row['catg_title'];
		$product_title=$row['product_title'];
		$product_keyword=$row['product_keyword'];
		$product_excerpt=$row['product_excerpt'];
		$product_desc=$row['product_desc'];
		$product_img=$row['product_img'];
	}else{
		header('location:index.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$catg_id=get_safe_value($con,$_POST['catg_id']);
	$product_title=get_safe_value($con,$_POST['product_title']);
    $product_keyword=get_safe_value($con,$_POST['product_keyword']);
	$product_excerpt=get_safe_value($con,$_POST['product_excerpt']);
	$product_desc=get_safe_value($con,$_POST['product_desc']);

        //Images name
        $product_img = $_FILES['product_img'] ['name'];
    
        //temp name
        $temp_name = $_FILES['product_img'] ['tmp_name'];

		$old_image = $_POST['product_old_image'];

		if ($product_img !=''){
			$update_filename = $_FILES['product_img']['name'];
		}else{
			$update_filename = $old_image;
		}

	$res=mysqli_query($con,"select * from products where product_id='$product_id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['product_id']) && $_GET['product_id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($product_id==$getData['product_id']){
			
			}else{
				$msg="POST WAS ALREADY EXIST";
			}
		}
	}
	
	if($msg==''){
		if(isset($_GET['product_id']) && $_GET['product_id']!=''){
				
			move_uploaded_file($temp_name,"../resources/img/".$product_img);

			mysqli_query($con,"update products set catg_id='$catg_id', product_title='$product_title', product_keyword='$product_keyword',product_excerpt='$product_excerpt', product_desc='$product_desc', product_img='$update_filename' where product_id='$product_id'");
			
		}
		else{
			move_uploaded_file($temp_name,"../resources/img/".$product_img);

			mysqli_query($con,"insert into products(date, catg_id, product_title, product_keyword, product_excerpt, product_desc, product_img, status) values(NOW(), '$catg_id', '$product_title', '$product_keyword', '$product_excerpt', '$product_desc', '$product_img', '1')");
		}
		header('location:index.php');
		die();
	}
}
		$get_catg = "select * from categories";
		$run_catg = mysqli_query($con, $get_catg);

?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>ADD POST</strong> </div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   <div class="form-group">
							   <div class="form-group">
							   <label for="catg_id" class=" form-control-label">SELECT CATEGORY</label>
									<select type="text" name="catg_id" class="form-control">
										<?php
											while ($row_catg = mysqli_fetch_array($run_catg)){
												$cat_id = $row_catg ['catg_id'];
												$cat_title = $row_catg ['catg_title'];
										?>
										<option value="<?php echo $cat_id ?>" <?php if($catg_id==$cat_id) echo 'selected';  ?>><?php echo $cat_title ?></option>
										<?php }  ?>
									</select>
									</div>
									<div class="form-group">
									<label for="product_title" class=" form-control-label">ADD POST TITLE</label>
									<input type="text" name="product_title" placeholder="ENTER POST TITLE" class="form-control" required value="<?php echo $product_title?>">
									</div>
									<div class="form-group">
									<label for="product_keyword" class=" form-control-label">ADD KEYWORD</label>
									<input type="text" name="product_keyword" placeholder="ADD KEYWORDS" class="form-control" required value="<?php echo $product_keyword?>">
									</div>
									<div class="form-group">
									<label for="product_excerpt" class=" form-control-label">ADD SHORT DESCRIPTION</label>
									<textarea type="text" name="product_excerpt" class="form-control"><?php echo $product_excerpt?></textarea>
									</div>
									<div class="form-group">
                                    <label for="product_desc" class=" form-control-label">ADD DESCRIPTION</label>
									<textarea type="text" id="texteratiny" name="product_desc" class="form-control"><?php echo $product_desc?></textarea>
									<script type="text/javascript" src="assets/js/init.tinymce.js"></script>
									</div>
									<div class="form-group">
									<label for="product_img" class=" form-control-label">UPLOAD FILE</label>
									<input type="file" name="product_img" class="form-control">
									<input type="hidden" name="product_old_image" value="<?php echo $product_img  ?>">
									</div>
								</div>
								<div class="text-center">
								<img src="<?php echo "../resources/img/".$product_img ?>" width="200px">

								</div>
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">SUBMIT</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.inc.php');
?>