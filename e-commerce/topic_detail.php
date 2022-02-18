<?php
    include("includes/db.php");
    include("includes/header.php");
?>
<div class="wrapper">
<?php

if(isset($_GET['product_id'])){

    global $conn;

    $product_id = $_GET['product_id'];

    $get_products = "select * from products where product_id = $product_id";

    $run_products = mysqli_query($conn, $get_products);

    while ($row_products = mysqli_fetch_array($run_products)){

    $pro_id = $row_products ['product_id'];
    $catg_id = $row_products['catg_id'];
    $pro_title = $row_products ['product_title'];
    $pro_desc = $row_products ['product_desc'];
    $pro_img = $row_products ['product_img'];
    $pro_excpt = $row_products ['product_excerpt'];
    $pro_tags = $row_products ['product_keyword'];
    $date = $row_products['date'];


    echo"
    <h2>$pro_title</h2>
    <p class='margin_top_bottom'>Published Date: $date</p>
    <div class='inner'>
    <img src='resources/img/$pro_img' alt=''>
    <p class='justified'>$pro_desc</p>
     </div>
    ";
}
}
?>
</div>

<?php include("includes/related_product.php");?>


<?php include("includes/footer.php");?>