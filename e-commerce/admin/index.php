<?php
require('top.inc.php');
isAdmin();
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$product_id=get_safe_value($con,$_GET['product_id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update products set status='$status' where product_id='$product_id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$product_id=get_safe_value($con,$_GET['product_id']);
		$delete_sql="delete from products where product_id='$product_id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from products inner join categories on products.catg_id=categories.catg_id order by product_id asc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">ALL POST </h4>
				   <h4 class="box-link"><a href="manage_post.php">ADD POST</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th>ID</th>
							   <th>CATEGORY TITLE</th>
                               <th>PRODUCT TITLE</th>
                               <th>DATE</th>
                               <th>KEYWORD</th>
                               <th>IMAGE</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
                                <td><?php echo $row['product_id']?></td>
								<td><?php echo $row['catg_title']?></td> 
							    <td><?php echo $row['product_title']?></td> 
                                <td><?php echo $row['date']?></td> 
                                <td><?php echo $row['product_keyword']?></td>
                                <td><?php echo $row['product_img']?></td>
							    <td>
								<?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&product_id=".$row['product_id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&product_id=".$row['product_id']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='manage_post.php?product_id=".$row['product_id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&product_id=".$row['product_id']."'>Delete</a></span>";
								
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>