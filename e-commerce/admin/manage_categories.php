<?php
require('top.inc.php');
isAdmin();
$catg_title='';
$msg='';
if(isset($_GET['catg_id']) && $_GET['catg_id']!=''){
	$catg_id=get_safe_value($con,$_GET['catg_id']);
	$res=mysqli_query($con,"select * from categories where catg_id='$catg_id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$catg_title=$row['catg_title'];
	}else{
		header('location:categories.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$catg_title=get_safe_value($con,$_POST['catg_title']);
	$res=mysqli_query($con,"select * from categories where catg_title='$catg_title'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['catg_id']) && $_GET['catg_id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($catg_id==$getData['catg_id']){
			
			}else{
				$msg="CATEGORIES ALREADY EXIST";
			}
		}else{
			$msg="CATEGORIES ALREADY EXIST";
		}
	}
	
	if($msg==''){
		if(isset($_GET['catg_id']) && $_GET['catg_id']!=''){
			mysqli_query($con,"update categories set catg_title='$catg_title' where catg_id='$catg_id'");
		}else{
			mysqli_query($con,"insert into categories(catg_title,status) values('$catg_title','1')");
		}
		header('location:categories.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>CATEGORIES FORM</strong> </div>
                        <form method="post">
							<div class="card-body card-block">
							   <div class="form-group">
									<label for="catg_title" class=" form-control-label">Categories</label>
									<input type="text" name="catg_title" placeholder="ENTER CATEGORIES NAME" class="form-control" required value="<?php echo $catg_title?>">
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