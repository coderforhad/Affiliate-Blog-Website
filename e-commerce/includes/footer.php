 <!--footer section-->
 <footer class="footer">
            <div class="footer-wrapper">
                <div class="one">
                    <h3>Company Name</h3>
                    <div class="footer-link">
                        <ul>
                            <li><a href=""> About Us</a></li>
                            <li><a href=""> Our Services</a></li>
                            <li><a href=""> Affiliated Program</a></li>
                        </ul>
                    </div>
                </div>
                <div class="two">
                    <h3>Products </h3>
                    <div class="footer-link">
                        <ul>
                            <li><a href="">Popular</a></li>
                            <li><a href="">Latest</a></li>
                            <li><a href=""> Best Selling</a></li>
                            <li><a href="">Home Decor</a></li>
                        </ul>
                    </div>
                </div>
                <div class="three">
                    <h3>About </h3>
                    <div class="footer-link">
                        <ul>
                            <li><a href=""> Contact Us</a></li>
                            <li><a href=""> Terms of Condition</a></li>
                            <li><a href=""> Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="Four">
                    <h3>Follow Us </h3>
                    <div class="footer-link">
                        <ul>
                             <li><a href=""><i class="fab fa-facebook"></i></a></li>
                             <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                             <li><a href=""><i class="fab fa-twitter"></i></a></li>
                             <li><a href=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>


    <script type="text/javascript">
        window.addEventListener("scroll", function () {
            var nav = document.querySelector(".navbar");
            nav.classList.toggle("sticky", window.scrollY > 0);
        })
   
        const hamburger = document.querySelector(".hamburger");
       const navbarLinks = document.querySelector(".nav-links");

hamburger.addEventListener("click", () => {

    hamburger.classList.toggle("active");
    navbarLinks.classList.toggle("active");
})
    </script>

</body>

</html>