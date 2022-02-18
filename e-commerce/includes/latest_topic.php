
  <!-- latest Topics-->
  <div class="wrapper">
            <section class="latest-topic js--latest-section">
                <h2 class="margin_top_bottom">Latest Topics</h2>
                <div class="topic-grid">
                            <?php 

                            if(!isset($_GET['category'])){
                            $con = mysqli_connect('localhost', 'root', '');
                            mysqli_select_db($con, 'e-commerce');
                            
                            $results_per_page = 8;

                            $sql = "SELECT * FROM products";
                            $result = mysqli_query($con, $sql);

                            $number_of_results = mysqli_num_rows($result);

                            // while ($row_products = mysqli_fetch_array($result)){

                            //     $pro_id = $row_products ['product_id'];
                            //     $catg_id = $row_products['catg_id'];
                            //     $pro_title = $row_products ['product_title'];
                            //     $pro_desc = $row_products ['product_desc'];
                            //     $pro_img = $row_products ['product_img'];
                            //     $pro_excpt = $row_products ['product_excerpt'];
                            //     $pro_tags = $row_products ['product_keyword'];
                            //     echo"
                            //     <div class = 'single-topic'>
                            //     <h3 class= 'topic-title'><a href='topic_detail.php?product_id=$pro_id'>$pro_title</a></h3>
                            //     <a href= ''><img src='./resources/img/$pro_img' alt='' class='topic-image'></a>   
                            //     <P class='justified'>$pro_excpt</P>
                            //     <button class='btn'><a href='topic_detail.php?product_id=$pro_id'>Read More</a></button>
                            //     </div>
                            //     ";
                            // }

                            $number_of_pages = ceil($number_of_results / $results_per_page);

                            if(!isset($_GET['page'])){
                                $page = 1;
                            }else{
                                $page = $_GET['page'];
                            }

                            $this_page_first_result = ($page-1)*$results_per_page;

                            $sql = "SELECT * FROM products LIMIT " .$this_page_first_result. ',' .$results_per_page;
                            $result = mysqli_query($con, $sql);

                            while ($row_products = mysqli_fetch_array($result)){
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

                            echo"<div class='pagination'>";
                            
                            for($page = 1; $page<= $number_of_pages; $page++){
                                echo '<a href="index.php?page=' .$page. '">' .$page. '</a>';
                            }
                            
                            echo"</div>";

                        }
                            getProductsbycatg();
                            ?>
                </div>
            </section>
        </div>
    <!-- End of latest Topics-->