<?php $db = mysqli_connect("localhost","root","","e-commerce"); ?> 
 
 <!-- product display section-->
 <div class="wrapper">
            <section>
                <h2 class="margin_top_bottom"> Related Products</h2>
                <div class="product-display">
                    <?php 
                    global $db;

                    if(!isset($_GET['category'])){

                    $get_products = "select * from products order by rand() LIMIT 0,3";

                    $run_products = mysqli_query($db, $get_products);

                    while ($row_products = mysqli_fetch_array($run_products)){

                    $pro_id = $row_products ['product_id'];
                    $catg_id = $row_products['catg_id'];
                    $pro_title = $row_products ['product_title'];
                    $pro_desc = $row_products ['product_desc'];
                    $pro_img = $row_products ['product_img'];
                    $pro_excpt = $row_products ['product_excerpt'];
                    $pro_tags = $row_products ['product_keyword'];


                    echo"
                    <div class = 'single-topic'>
                    <h3 class= 'topic-title'><a href='topic_detail.php?product_id=$pro_id'>$pro_title</a></h3>
                    <a href= ''><img src='./resources/img/$pro_img' alt='' class='topic-image'></a>   
                    <P class='justified'>$pro_excpt</P>
                    <button class='btn'><a href='topic_detail.php?product_id=$pro_id'>Read More</a></button>
                    </div>
                    ";
                }
                } 
                ?>
                </div>
            </section>
 </div>

        <!-- End of product display section-->