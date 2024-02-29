<?php
$currentPage = 'home.php'; // Define the current page
include 'shared/_header.php';


if (isset($_SESSION['userID'])) {
	$userEmail = $_SESSION['userEmail'];
	$userPass = $_SESSION['userPass'];
	$userID = $_SESSION['userID'];



	$musicQ = "select * from musicalbum where MusicBy='$userID'";
	// where MusicBy='$serviceProvidersID'
	$musicQRun = mysqli_query($conn, $musicQ);
	if (!$musicQRun) {
		die(mysqli_error($conn));
	}
	$movieQ = "select * from movies where MovieBy='$userID'";
	// where MovieBy='$serviceProvidersID'
	$movieQRun = mysqli_query($conn, $movieQ);
	if (!$movieQRun) {
		die(mysqli_error($conn));
	}


} elseif (isset($_SESSION['streamerID'])) {
	$streamerEmail = $_SESSION['streamerEmail'];
	$streamerPass = $_SESSION['streamerPass'];
	$streamerID = $_SESSION['streamerID'];
	$musicQ = "select * from musicalbum where MusicBy='$streamerID'";
	// where MusicBy='$serviceProvidersID'
	$musicQRun = mysqli_query($conn, $musicQ);
	if (!$musicQRun) {
		die(mysqli_error($conn));
	}
	$movieQ = "select * from movies where MovieBy='$streamerID'";
	// where MovieBy='$serviceProvidersID'
	$movieQRun = mysqli_query($conn, $movieQ);
	if (!$movieQRun) {
		die(mysqli_error($conn));
	}
} else {
	header('location:login.php');
	exit();
}
include 'shared/config.php';
if (isset($_POST['submit'])) {
	$msg = $_POST['feedback'];
	$feedbackQ = "INSERT INTO feedback(feedbackMsg, userID) VALUES ('$msg', '$userID')";
	$feedback = mysqli_query($conn, $feedbackQ);
	if (!$feedback) {
		die(mysqli_error($conn));
	} else {
		echo "<script>
        alert('Your feedback is successfully submitted!');
        window.location.href = 'usersMoviesAndMusics.php';
        </script>";
	}
}

$feedbacksinsertedQ = "SELECT * FROM feedback JOIN users u ON feedback.userID = u.userID";
$feedbacksinserted = mysqli_query($conn, $feedbacksinsertedQ);
if (!$feedbacksinserted) {
	die(mysqli_error($conn));
}

?>
<style>
	.carousel-indicators {
		bottom: 0;
	}

	.carousel-item {
		text-align: center;
	}

	.carousel {
		width: auto;
		margin: 0 auto;
		padding-bottom: 50px;
	}

	.carousel .carousel-item {
		color: #999;
		font-size: 14px;
		text-align: center;
		overflow: hidden;
		min-height: 340px;
	}

	.carousel .carousel-item a {
		color: #eb7245;
	}

	.carousel .img-box {
		width: 145px;
		height: 145px;
		margin: 0 auto;
		border-radius: 50%;
	}

	.carousel .img-box img {
		width: 100%;
		height: 100%;
		display: block;
		border-radius: 50%;
	}

	.carousel .testimonial {
		padding: 30px 0 10px;
	}

	.carousel .overview {
		text-align: center;
		padding-bottom: 5px;
	}

	.carousel .overview b {
		color: #fff;
		font-size: 15px;
		text-transform: uppercase;
		display: block;
		padding-bottom: 5px;
	}

	.carousel .star-rating i {
		font-size: 18px;
		color: #ffdc12;
	}

	.carousel-control-prev,
	.carousel-control-next {
		width: 30px;
		height: 30px;
		border-radius: 50%;
		background: #999;
		text-shadow: none;
		top: 4px;
	}

	.carousel-control-prev i,
	.carousel-control-next i {
		font-size: 20px;
		margin-right: 2px;
	}

	.carousel-control-prev {
		left: auto;
		right: 40px;
	}

	.carousel-control-next i {
		margin-right: -2px;
	}

	.carousel .carousel-indicators {
		bottom: 15px;
		margin-bottom: 100px;
	}

	.carousel-indicators li,
	.carousel-indicators li.active {
		width: 11px;
		height: 11px;
		margin: 1px 5px;
		border-radius: 50%;
	}

	.carousel-indicators li {
		background: #e2e2e2;
		border: none;
	}

	.carousel-indicators li.active {
		background: #888;
	}
</style>
<!-- hero area start -->
<section class="hero-area" id="home">
	<div class="container">
		<div class="hero-area-slider">
			<div class="row hero-area-slide align-items-center">
				<div class="col-lg-6 col-md-5">
					<div class="hero-area-content">
						<img src="assets/img/slide2.png" alt="about" />
					</div>
				</div>
				<div class="col-lg-6 col-md- align-items-center7">
					<div class="hero-area-content pr-50">
						<h2>The Devil Princess</h2>
						<div class="review">
							<div class="author-review">
								<i class="icofont icofont-star"></i>
								<i class="icofont icofont-star"></i>
								<i class="icofont icofont-star"></i>
								<i class="icofont icofont-star"></i>
								<i class="icofont icofont-star"></i>
							</div>
							<h4>180k voters</h4>
						</div>
						<p>She is a devil princess from the demon world. She grew up sheltered by her parents and
							doesn't really know how to be evil or any of the common actions, She is unable to cry due to
							Keita's accidental first wish, despite needed for him to wish...</p>
						<div class="slide-trailor">
							<a class="button-style01" href="#WatchMovies"><i class="icofont icofont-play"></i>Watch Movies</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row hero-area-slide align-items-center">
				<div class="col-lg-6 col-md-5 align-items-center">
					<div class="hero-area-content">
						<img src="assets/img/slide1.png" alt="about" />
					</div>
				</div>
				<div class="col-lg-6 col-md-7">
					<div class="hero-area-content pr-50">
						<h2>Last Avatar</h2>
						<div class="review">
							<div class="author-review">
								<i class="icofont icofont-star"></i>
								<i class="icofont icofont-star"></i>
								<i class="icofont icofont-star"></i>
								<i class="icofont icofont-star"></i>
								<i class="icofont icofont-star"></i>
							</div>
							<h4>180k voters</h4>
						</div>
						<p>She is a devil princess from the demon world. She grew up sheltered by her parents and
							doesn't really know how to be evil or any of the common actions, She is unable to cry due to
							Keita's accidental first wish, despite needed for him to wish...</p>

						<div class="slide-trailor">
						<a class="button-style01" href="#WatchMovies"><i class="icofont icofont-play"></i>Watch Movies</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row hero-area-slide align-items-center">
				<div class="col-lg-6 col-md-5">
					<div class="hero-area-content">
						<img src="assets/img/slide3.png" alt="about" />
					</div>
				</div>
				<div class="col-lg-6 col-md-7 align-items-center">
					<div class="hero-area-content pr-50">
						<h2>The Deer God</h2>
						<div class="review">
							<div class="author-review">
								<i class="icofont icofont-star"></i>
								<i class="icofont icofont-star"></i>
								<i class="icofont icofont-star"></i>
								<i class="icofont icofont-star"></i>
								<i class="icofont icofont-star"></i>
							</div>
							<h4>180k voters</h4>
						</div>
						<p>She is a devil princess from the demon world. She grew up sheltered by her parents and
							doesn't really know how to be evil or any of the common actions, She is unable to cry due to
							Keita's accidental first wish, despite needed for him to wish...</p>
						
						<div class="slide-trailor">
						<a class="button-style01" href="#WatchMovies"><i class="icofont icofont-play"></i>Watch Movies</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="hero-area-thumb">
			<div class="thumb-prev">
				<div class="row hero-area-slide align-items-center">
					<div class="col-lg-6 align-items-center">
						<div class="hero-area-content">
							<img src="assets/img/slide3.png" alt="about" />
						</div>
					</div>
					<div class="col-lg-6">
						<div class="hero-area-content pr-50">
							<h2>Last Avatar</h2>
							<div class="review">
								<div class="author-review">
									<i class="icofont icofont-star"></i>
									<i class="icofont icofont-star"></i>
									<i class="icofont icofont-star"></i>
									<i class="icofont icofont-star"></i>
									<i class="icofont icofont-star"></i>
								</div>
								<h4>180k voters</h4>
							</div>
							<p>She is a devil princess from the demon world. She grew up sheltered by her parents and
								doesn't really know how to be evil or any of the common actions, She is unable to cry
								due to Keita's accidental first wish, despite needed for him to wish...</p>
							
							<div class="slide-trailor">
							<a class="button-style01" href="#WatchMovies"><i class="icofont icofont-play"></i>Watch Movies</a>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="thumb-next">
				<div class="row hero-area-slide align-items-center">
					<div class="col-lg-6">
						<div class="hero-area-content">
							<img src="assets/img/slide1.png" alt="about" />
						</div>
					</div>
					<div class="col-lg-6 align-items-center">
						<div class="hero-area-content pr-50">
							<h2>The Deer God</h2>
							<div class="review">
								<div class="author-review">
									<i class="icofont icofont-star"></i>
									<i class="icofont icofont-star"></i>
									<i class="icofont icofont-star"></i>
									<i class="icofont icofont-star"></i>
									<i class="icofont icofont-star"></i>
								</div>
								<h4>180k voters</h4>
							</div>
							<p>She is a devil princess from the demon world. She grew up sheltered by her parents and
								doesn't really know how to be evil or any of the common actions, She is unable to cry
								due to Keita's accidental first wish, despite needed for him to wish...</p>
						
							<div class="slide-trailor">
							<a class="button-style01" href="#WatchMovies"><i class="icofont icofont-play"></i>Watch Movies</a>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section><!-- hero area end -->

<section class="portfolio-area pt-60" id="WatchMovies">
    <div class="container">
        <div class="row flexbox-center">
            <div class="col-lg-6 text-center text-lg-left">
                <div class="section-title">
                    <h1><i class="icofont icofont-movie"></i> Spotlight This Month</h1>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="portfolio-menu">
                    <ul>
                        <li data-filter=".movies">Movies</li>
                        <li data-filter=".music">Music Albums</li>
                    </ul>
                </div>
            </div>
        </div>
        <hr />
        <div class="row portfolio-item">
        <?php
            while ($movie = mysqli_fetch_array($movieQRun)) {
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 movies released">
                        <div class="single-portfolio">
                            <div class="single-portfolio-img">
                                <img src="data:<?php echo $movie['MovieTitleImgType']; ?>;base64,<?php echo base64_encode($movie['MovieTitleImg']); ?>"
                                    alt="portfolio" />
                                <a href="<?php echo $movie['moviePath']; ?>" class="popup-youtube">
                                    <i class="icofont icofont-ui-play"></i>
                                </a>
                            </div>
                            <div class="portfolio-content">
                                <h4>
                                    <?php echo $movie['MovieName']; ?>
                                </h4>
                                <div class="review">
                                    <a href="deleteMovies.php?id=<?php echo $movie['MovieID']; ?>" class="btn">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
            }
            ?>
            <?php while ($music = mysqli_fetch_array($musicQRun)) { ?>
                <div class="col-lg-3 col-md-4 col-sm-6 music released">
                    <div class="single-portfolio">
                        
                        <a href="#openModalBtn" id="openModalBtn">
                            <div class="single-portfolio-img">
                            <img src="<?php echo $music['MusicTitleImg']; ?>" alt="portfolio" />
                                </div>
                            
                                <div class="portfolio-conteny">
                                	<h3>
                                    <?php echo $music['MusicTitle']; ?>
                                    </h3>
                                    <h5>Singer:
                                        <?php echo $music['Singer']; ?>
                                    </h5>
                                    </div>
            </a>
                                    <div class="review">
                                        <a class="button-style01" href="deleteMusics.php?id=<?php echo $music['MusicID']; ?>" class="btn">Delete</a>
                                

                                <div id="modal" class="modal">
                                    <div class="modal-content">
                                        <span class="close">&times;</span>
                                        <audio controls id="audio-player">
                                            <source src="<?php echo $music['musicPath']; ?>" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                </div>
                                    </div>
                
                            </div>
                        </div>
                    </div>
                <?php } ?> 
                <!-- <div class="col-lg-3 col-md-4 col-sm-6 soon">
                        <div class="single-portfolio">
                            <div class="single-portfolio-img">
                                <img src="assets/img/portfolio/portfolio3.png" alt="portfolio" />
                                <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                    <i class="icofont icofont-ui-play"></i>
                                </a>
                            </div>
                            <div class="portfolio-content">
                                <h2>The Lost City of Z</h2>
                                <div class="review">
                                    <div class="author-review">
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                    </div>
                                    <h4>180k voters</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 top released">
                        <div class="single-portfolio">
                            <div class="single-portfolio-img">
                                <img src="assets/img/portfolio/portfolio4.png" alt="portfolio" />
                                <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                    <i class="icofont icofont-ui-play"></i>
                                </a>
                            </div>
                            <div class="portfolio-content">
                                <h2>Beast Beauty</h2>
                                <div class="review">
                                    <div class="author-review">
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                    </div>
                                    <h4>180k voters</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 released">
                        <div class="single-portfolio">
                            <div class="single-portfolio-img">
                                <img src="assets/img/portfolio/portfolio5.png" alt="portfolio" />
                                <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                    <i class="icofont icofont-ui-play"></i>
                                </a>
                            </div>
                            <div class="portfolio-content">
                                <h2>In The Fade</h2>
                                <div class="review">
                                    <div class="author-review">
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                    </div>
                                    <h4>180k voters</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 soon top">
                        <div class="single-portfolio">
                            <div class="single-portfolio-img">
                                <img src="assets/img/portfolio/portfolio6.png" alt="portfolio" />
                                <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                    <i class="icofont icofont-ui-play"></i>
                                </a>
                            </div>
                            <div class="portfolio-content">
                                <h2>Last Hero</h2>
                                <div class="review">
                                    <div class="author-review">
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                    </div>
                                    <h4>180k voters</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 soon">
                        <div class="single-portfolio">
                            <div class="single-portfolio-img">
                                <img src="assets/img/portfolio/portfolio3.png" alt="portfolio" />
                                <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                    <i class="icofont icofont-ui-play"></i>
                                </a>
                            </div>
                            <div class="portfolio-content">
                                <h2>The Lost City of Z</h2>
                                <div class="review">
                                    <div class="author-review">
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                    </div>
                                    <h4>180k voters</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 top released">
                        <div class="single-portfolio">
                            <div class="single-portfolio-img">
                                <img src="assets/img/portfolio/portfolio4.png" alt="portfolio" />
                                <a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
                                    <i class="icofont icofont-ui-play"></i>
                                </a>
                            </div>
                            <div class="portfolio-content">
                                <h2>Beast Beauty</h2>
                                <div class="review">
                                    <div class="author-review">
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                    </div>
                                    <h4>180k voters</h4>
                                </div>
                            </div>
                        </div>
                    </div> -->
            </div>
        </div>
</section>

<!-- portfolio section start -->
<!-- <section class="portfolio-area pt-60">
	<div class="container">
		<div class="row flexbox-center">
			<div class="col-lg-6 text-center text-lg-left">
				<div class="section-title">
					<h1><i class="icofont icofont-movie"></i> Spotlight This Month</h1>
				</div>
			</div>
			<div class="col-lg-6 text-center text-lg-right">
				<div class="portfolio-menu">
					<ul>
						<li data-filter="*" class="active">Latest</li>
						<li data-filter=".soon">Comming Soon</li>
						<li data-filter=".top">Top Rated</li>
						<li data-filter=".released">Recently Released</li>
					</ul>
				</div>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-lg-9">
				<div class="row portfolio-item">
					<div class="col-md-4 col-sm-6 soon released">
						<div class="single-portfolio">
							<div class="single-portfolio-img">
								<img src="assets/img/portfolio/portfolio1.png" alt="portfolio" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="portfolio-content">
								<h2>Boyz II Men</h2>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k voters</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 top">
						<div class="single-portfolio">
							<div class="single-portfolio-img">
								<img src="assets/img/portfolio/portfolio2.png" alt="portfolio" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="portfolio-content">
								<h2>Tale of Revemge</h2>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k voters</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 soon">
						<div class="single-portfolio">
							<div class="single-portfolio-img">
								<img src="assets/img/portfolio/portfolio3.png" alt="portfolio" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="portfolio-content">
								<h2>The Lost City of Z</h2>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k voters</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 top released">
						<div class="single-portfolio">
							<div class="single-portfolio-img">
								<img src="assets/img/portfolio/portfolio4.png" alt="portfolio" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="portfolio-content">
								<h2>Beast Beauty</h2>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k voters</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 released">
						<div class="single-portfolio">
							<div class="single-portfolio-img">
								<img src="assets/img/portfolio/portfolio5.png" alt="portfolio" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="portfolio-content">
								<h2>In The Fade</h2>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k voters</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 soon top">
						<div class="single-portfolio">
							<div class="single-portfolio-img">
								<img src="assets/img/portfolio/portfolio6.png" alt="portfolio" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="portfolio-content">
								<h2>Last Hero</h2>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k voters</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 text-center text-lg-left">
				<div class="portfolio-sidebar">
					<img src="assets/img/sidebar/sidebar1.png" alt="sidebar" />
					<img src="assets/img/sidebar/sidebar2.png" alt="sidebar" />
					<img src="assets/img/sidebar/sidebar3.png" alt="sidebar" />
					<img src="assets/img/sidebar/sidebar4.png" alt="sidebar" />
				</div>
			</div>
		</div>
	</div> 
</section> -->
<!-- portfolio section end -->
<!-- video section start -->
<!-- <section class="video ptb-90">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title pb-20">
					<h1><i class="icofont icofont-film"></i> Trailers & Videos</h1>
				</div>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-md-9">
				<div class="video-area">
					<img src="assets/img/video/video1.png" alt="video" />
					<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
						<i class="icofont icofont-ui-play"></i>
					</a>
					<div class="video-text">
						<h2>Angle of Death</h2>
						<div class="review">
							<div class="author-review">
								<i class="icofont icofont-star"></i>
								<i class="icofont icofont-star"></i>
								<i class="icofont icofont-star"></i>
								<i class="icofont icofont-star"></i>
								<i class="icofont icofont-star"></i>
							</div>
							<h4>180k voters</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="row">
					<div class="col-md-12 col-sm-6">
						<div class="video-area">
							<img src="assets/img/video/video2.png" alt="video" />
							<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
								<i class="icofont icofont-ui-play"></i>
							</a>
						</div>
					</div>
					<div class="col-md-12 col-sm-6">
						<div class="video-area">
							<img src="assets/img/video/video3.png" alt="video" />
							<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
								<i class="icofont icofont-ui-play"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> -->
<!-- video section end -->
<!-- feedback start -->
<br><br>
<div class="container">
	<div class="col-lg-6 text-center text-lg-left">
		<div class="section-title">
			<h1><i class="icofont icofont-match-review"></i> Users Feedback</h1>
		</div>
	</div>
	<br>
	<hr />

	<div class="row gy-5 d-flex flex-wrap mt-3 align-items-center">
		<div class="col-md-6">
			<form method="post">
				<div class="form-group">
					<label for="exampleFormControlTextarea1">
						<h4>Write Your Feedback</h4>
					</label>
					<textarea class="form-control" name="feedback" id="exampleFormControlTextarea1" rows="3"></textarea>
				</div>
				<button type="submit" name="submit" class="button-style01">Submit</button>
			</form>
		</div>
		<div class="col-md-6">
			<!-- Carousel wrapper -->
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Carousel indicators -->

				<ol class="carousel-indicators">
					<?php
					$count = mysqli_num_rows($feedbacksinserted);
					for ($i = 0; $i < $count; $i++) {
						$indicatorClass = ($i === 0) ? 'active' : '';
						echo '<li data-target="#myCarousel" data-slide-to="' . $i . '" class="' . $indicatorClass . '"></li>';
					}
					?>
				</ol>
				<!-- Wrapper for carousel items -->
				<div class="carousel-inner">
					<?php
					$active = true;
					while ($feedback_fetch = mysqli_fetch_array($feedbacksinserted)) {
						$carouselItemClass = ($active) ? 'active' : '';
						$active = false;
						?>
						<div style="text-align: center; align-items: center;"
							class="carousel-item <?php echo $carouselItemClass; ?>">
							<div class="img-box"><img
									src="https://w7.pngwing.com/pngs/340/946/png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes-thumbnail.png"
									alt="" style="height: 150px;"></div>
							<div class="carousel-content">
								<p class="testimonial">
									<?php echo $feedback_fetch['feedbackMsg']; ?>
								</p>
								<p class="overview"><b>
										<?php echo $feedback_fetch['userName']; ?>
									</b></p>
							</div>
						</div>
						<?php
					}
					?>
				</div>

				<!-- Carousel controls -->
				<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>

			</div>
			<!-- Carousel wrapper -->
		</div>
	</div>
</div>
<!-- feedback end -->
<!-- footer section start -->
<?php
include 'shared/_footer.php';
?>
<!-- footer section end -->
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
<script>
	let card = document.querySelector(".card"); //declearing profile card element
	let displayPicture = document.querySelector(".display-picture"); //declearing profile picture

	displayPicture.addEventListener("click", function () { //on click on profile picture toggle hidden class from css
		card.classList.toggle("hidden")
	})
</script>