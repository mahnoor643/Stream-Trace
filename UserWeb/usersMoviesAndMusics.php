<?php
$currentPage = 'usersMoviesAndMusics.php'; // Define the current page
include 'shared/_header.php';
$userEmail = $_SESSION['userEmail'];
$userPwd = $_SESSION['userPass'];
$userID = $_SESSION['userID'];
if (isset($userEmail) && isset($userPwd)) {
} else {
	header('location:login.php');
}

		$musicQ = "select * from musicalbum ";
	$musicQRun = mysqli_query($conn, $musicQ);
	if (!$musicQRun) {
		die(mysqli_error($conn));
	}
	$movieQ = "select * from movies ";
	$movieQRun = mysqli_query($conn, $movieQ);
	if (!$movieQRun) {
		die(mysqli_error($conn));
	} 

// } else {
	if(isset($_POST['search'])){


$result = $_POST['result'];
	if ($_POST['sortFor'] == 'Movies') {
		$searchMovieQ = "select * from movies m where m.MovieName like'" . $result . "%' ";
		$movieQRun = mysqli_query($conn, $searchMovieQ);
		if (!$movieQRun) {
			die(mysqli_error($conn));
		} else {
			$movie = mysqli_fetch_array($movieQRun);
		}
	} else {
		$searchMusicQ = "select * from musicalbum where MusicTitle like'" . $result . "%' ";
		$musicQRun = mysqli_query($conn, $searchMusicQ);
		if (!$musicQRun) {
			die(mysqli_error($conn));
		} else {
			$music = mysqli_fetch_array($musicQRun);
		}

	}
}
	

?>
<!-- breadcrumb area start -->
<section class="breadcrumb-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-area-content">
					<h1>Movies Page</h1>
				</div>
			</div>
		</div>
	</div>
</section><!-- breadcrumb area end -->


<!-- portfolio section start -->
<section class="portfolio-area pt-60">
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
						<!-- <li data-filter=".top">Top Rated</li>
								<li data-filter=".released">Recently Released</li> -->
					</ul>
				</div>
			</div>
		</div>
		<hr />
		<div class="row portfolio-item">
			<?php
			while ($music = mysqli_fetch_array($musicQRun)) { ?>
				<div class="col-lg-3 col-md-4 col-sm-6 music released">
					<div class="single-portfolio">
						<div class="single-portfolio-img">
							<img src="<?php echo $music['MusicTitleImg']; ?>" alt="portfolio" />
						</div>
						<div class="portfolio-content">
							<h2>
								<?php echo $music['MusicTitle']; ?>
							</h2>
							<h5>Singer:
								<?php echo $music['Singer']; ?>
							</h5>
							<div class="review">
								<a href="deleteMusics.php?id=<?php echo $music['MusicID']; ?>" class="btn">Delete</a>
								<a href="#audio-player" data-fancybox>Open Audio Player</a>

								<div style="display: none;">
									<audio controls id="audio-player">
										<source src="<?php echo $music['musicPath']; ?>" type="audio/mpeg">
										Your browser does not support the audio element.
									</audio>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php }
		while ($movie = mysqli_fetch_array($movieQRun)) {
				?>
				<div class="col-lg-3 col-md-4 col-sm-6 movies released">
					<div class="single-portfolio">
						<div class="single-portfolio-img">
							<img src="<?php echo $movie['MovieTitleImg']; ?>"
								alt="portfolio" />
							<a href="<?php echo $movie['moviePath']; ?>" class="popup-youtube">
								<i class="icofont icofont-ui-play"></i>
							</a>
						</div>
						<div class="portfolio-content">
							<h2>
								<?php echo $movie['MovieName']; ?>
							</h2>
							<div class="review">
								<a href="deleteMovies.php?id=<?php echo $movie['MovieID']; ?>" class="btn">Delete</a>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
			?>
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
</section><!-- portfolio section end -->
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
					<div class="col-md-12">
						<div class="video-slider mt-20">
							<div class="video-area">
								<img src="assets/img/video/video2.png" alt="video" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="video-area">
								<img src="assets/img/video/video3.png" alt="video" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="video-area">
								<img src="assets/img/video/video4.png" alt="video" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="video-area">
								<img src="assets/img/video/video5.png" alt="video" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="video-area">
								<img src="assets/img/video/video2.png" alt="video" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="video-area">
								<img src="assets/img/video/video3.png" alt="video" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="video-area">
								<img src="assets/img/video/video4.png" alt="video" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="video-area">
								<img src="assets/img/video/video5.png" alt="video" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->
<!-- video section end -->
<br>
<br>
<script>
	const audioPlayer = document.getElementById('audio-player');
	const playButton = document.getElementById('play-button');
	const pauseButton = document.getElementById('pause-button');
	const volumeSlider = document.getElementById('volume-slider');

	playButton.addEventListener('click', () => {
		audioPlayer.play();
	});

	pauseButton.addEventListener('click', () => {
		audioPlayer.pause();
	});

	volumeSlider.addEventListener('input', () => {
		audioPlayer.volume = volumeSlider.value;
	});
</script>
<?php include 'shared/_footer.php'; ?>