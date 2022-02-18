<?php
    $db = mysqli_connect("localhost","root","","e-commerce");

    function getCtg(){
        global $db;
        $get_catg = "select * from categories";

        $run_catg = mysqli_query($db, $get_catg);
        
        while ($row_catg = mysqli_fetch_array($run_catg)){
            $catg_id = $row_catg ['catg_id'];
            $catg_title = $row_catg ['catg_title'];
            echo"<li class='nav-item'><a href='index.php?category=$catg_id' class='nav-link'>$catg_title</a></li>";
        }
    }

    function getProductstodisplay(){

            global $db;

            if(!isset($_GET['category'])){

            $get_products = "select * from products order by rand() LIMIT 0,8";

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

}

function getProductsbycatg(){

    global $db;

    if(isset($_GET['category'])){
        
    $catg_id = $_GET['category'];
    
    $get_catg_products = "select * from products where catg_id = $catg_id";

    $run_catg_products = mysqli_query($db, $get_catg_products);

    while ($row_catg_products = mysqli_fetch_array($run_catg_products)){

        $pro_id = $row_catg_products ['product_id'];
        $catg_id = $row_catg_products ['catg_id'];
        $pro_title = $row_catg_products ['product_title'];
        $pro_desc = $row_catg_products ['product_desc'];
        $pro_img = $row_catg_products ['product_img'];
        $pro_excpt = $row_catg_products ['product_excerpt'];
        $pro_tags = $row_catg_products ['product_keyword'];


        echo"
        <div class = 'single-topic'>
        <h3 class= 'topic-title'><a href=''>$pro_title</a></h3>
        <a href= ''><img src='./resources/img/$pro_img' alt='' class='topic-image'></a>   
        <P class='justified'>$pro_excpt</P>
        <button class='btn'><a href='topic_detail.php?product_id=$pro_id'>Read More</a></button>
        </div>
        ";
    }
}

}

?>