<!-- footer section start -->
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-sm-6">
				<div class="widget">
					<img  style="height: 80px;" src="assets/img/LOGO (LIGHT THEME).png" alt="about" />
					<p>North Nazimabad,  Aptech North Nazimabad, Karachi</p>
					<h6><span>Call us: </span>(+92) 21-111 278 324</h6>
				</div>
			</div>
			
			<div class="col-lg-4 col-sm-6">
				<div class="widget">
					<h4>Quick Links</h4>
					<ul>
					<?php if(isset($_SESSION['userID'])){ ?>
                                <li  <?php if ($currentPage === 'home.php')
                                        echo 'class="active"'; ?>><a href="home.php">Home</a></li>
                                <li  <?php if ($currentPage === 'movies.php')
                                        echo 'class="active"'; ?>><a href="usersMoviesAndMusics.php">Movies</a></li>
                                <li  <?php if ($currentPage === 'contact.php')
                                        echo 'class="active"'; ?>><a href="contact.php">Contact Us</a></li>
                                <li  <?php if ($currentPage === 'feedback.php')
                                        echo 'class="active"'; ?>><a href="feedback.php">Feedback</a></li>
                                <li><a class="button-style01" href="userLogout.php">Log out</a></li>
                                <?php }else if(isset($_SESSION['streamerID'])){ ?>
                                    <li><a href="home.php">Home</a></li>
                                <li><a class="active" href="Movies_Musics.php">Movies</a></li>
                                <li><a href="Addmovie.php">Add Movies</a></li>
                                <li><a href="addMusic.php">Add Music</a></li>
                                <li><a href="streamersLogout.php">Log out</a></li>
                                <?php } ?>
					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6">
				<div class="widget">
					<h4>Newsletter</h4>
					<p>Subscribe to our newsletter system now to get latest news from us.</p>
					<form action="#">
						<input type="text" placeholder="Enter your email.." />
						<button>SUBSCRIBE NOW</button>
					</form>
				</div>
			</div>
		</div>
		<hr />
	</div>
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 text-center text-lg-left">
					<div class="copyright-content">
						<p>copyright 2023 <a href="https://aptech-education.com.pk/">Aptech Students</a></p>
					</div>
				</div>
				<div class="col-lg-6 text-center text-lg-right">
					<div class="copyright-content">
						<a href="#" class="scrollToTop">
							Back to top<i class="icofont icofont-arrow-up"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer><!-- footer section end -->
<!-- jquery main JS -->
<script src="assets/js/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Slick nav JS -->
<script src="assets/js/jquery.slicknav.min.js"></script>
<!-- owl carousel JS -->
<script src="assets/js/owl.carousel.min.js"></script>
<!-- Popup JS -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!-- Isotope JS -->
<script src="assets/js/isotope.pkgd.min.js"></script>
<!-- main JS -->
<script src="assets/js/main.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/fancybox.js"></script>
</body>

</html>