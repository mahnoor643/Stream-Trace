<!-- landing page -->
<?php
include 'shared/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Stream Trace</title>
	<!-- Favicon Icon -->
	<link rel="icon" type="image/png" href="assets/img/LOGO (DARK THEME).png" />
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>
	html {
		font-size: 62.5%;
		color: white;
	}

	a {
		color: white;
	}

	a:active,
	a:link,
	a:visited {
		text-decoration: none;
	}

	button {
		background: transparent;
		border: none;
		color: white;
	}

	:root {
		--primary-color: #e50914;
	}

	.primary--btn {
		background-color: var(--primary-color);
		line-height: normal;
		padding: 0.7rem 1.7rem;
		font-weight: 700;
		font-size: 1.5rem;
		border-radius: 0.3rem;
		text-transform: capitalize;
	}

	.section__divider {
		border: 6px solid #222;
	}

	.header {
		position: absolute;
		height: 10rem;
		width: 100%;
		top: 0;
		left: 0;
		z-index: 15;
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding: 0 3rem;
	}

	.header__logo {
		display: block;
		width: 15rem;
		padding: 0 1rem;
	}

	.header__logo img {
		height: 100%;
		width: 100%;
	}

	.banner__section {
		position: relative;
		height: 100vh;
	}

	.banner {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		object-fit: cover;
		object-position: center;
		z-index: 5;
	}

	.banner__overlay {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-image: linear-gradient(to top,
				rgba(0, 0, 0, 0.8) 0,
				rgba(0, 0, 0, 0.4) 40%,
				rgba(0, 0, 0, 0.4) 75%,
				rgba(0, 0, 0, 0.8) 100%);
		z-index: 10;
	}

	.banner__content {
		position: absolute;
		top: 50%;
		left: 50%;
		z-index: 15;
		transform: translate(-50%, -50%);
		width: 100%;
		max-width: 900px;
		text-align: center;
		padding: 0rem 5rem;
		color: white;
	}

	.banner__title {
		font-size: 4rem;
		font-weight: 700;
	}

	.banner__subtitle {
		font-size: 2.6rem;
		font-weight: 400;
		margin: 2rem 0;
	}

	.membership__form {
		display: grid;
		position: relative;
	}

	.membership__input__container {
		position: relative;
		display: flex;
		flex-wrap: wrap;
	}

	.membership__input {
		flex-basis: 100%;
		padding: 1rem;
		padding-top: 2rem;
		padding-bottom: 1.5rem;
		border: none;
		font-size: 1.6rem;
	}

	.membership__input:focus {
		outline: none;
	}

	.membership__btn {
		justify-self: center;
		width: 100%;
		max-width: 20rem;
		padding: 1.5rem 3rem;
	}

	.membership__input__message {
		flex-basis: 100%;
		text-align: start;
		margin: 1rem 0;
		color: #ffa00a;
		font-size: 1.5rem;
		content: "";
	}

	.membership__placeholder {
		position: absolute;
		color: #8c8c8c;
		top: 50%;
		left: 1rem;
		z-index: 10;
		transform: translateY(-50%);
		font-size: 1.4rem;
		transition: all 0.3s ease-in-out;
	}

	.membership__input__container.on__focus .membership__placeholder {
		top: 1rem;
		font-size: 1.2rem;
	}



	@media screen and (min-width: 600px) {
		.membership__btn {
			font-size: 2rem;
		}
	}

	@media screen and (min-width: 900px) {
		.banner__title {
			font-size: 5rem;
		}

		.banner__subtitle {
			font-size: 2rem;
		}

		.membership__form {
			grid-template-columns: 70% 1fr;
		}

		.membership__input__message {
			grid-row: 2;
		}

		.membership__btn {
			justify-self: start;
		}

		.story__card {
			grid-template-columns: 1fr 1fr;
			align-items: center;
		}

		.story__card__left {
			text-align: left;
		}

		.accordion__list {
			font-size: 3rem;
		}
	}

.second {
	color: #fff;
    box-shadow: 0 0 5px 5px #808080 inset, 0 0 2px 0 #808080;
  
	font-size: 18px;
  padding: 5px 22px 5px;

}
.second:hover {
	border-color: #000;
  color: #fff;
  box-shadow: 0 0 40px 40px #000 inset, 0 0 0 0 #000;
  transition: all 150ms ease-in-out;
  
  font-size: 18px;
  padding: 5px 22px 5px;
}

.third {
  border-color: #000;
  color: #fff;
  box-shadow: 0 0 40px 40px #000 inset, 0 0 0 0 #000;
  transition: all 150ms ease-in-out;
  
  font-size: 18px;
  padding: 5px 22px 5px;
}
.third:hover{
	color: #fff;
    box-shadow: 0 0 10px 0 #000 inset, 0 0 10px 4px #000;

}
.button-style01{
    display: flex;
     padding: 0.875em 2em;
     background: linear-gradient(90deg, #b92a2a, #5a373700) #483232;
     color: #fff;
     text-decoration: none;
     transition: background-color 1s;
     place-content: center;
     align-items: center;
	 font-size: 12px;
 }
 .button-style01:hover, .button-style01:focus {
  background-color: #bb7878;
     color: #fff !important;
 }
</style>

<body>
	<!-- header section start -->
	<header class="header" style="margin-top: 20px;">
		<a class="header__logo" href="#">
			<img src="./assets/img/LOGO (LIGHT THEME).png" alt="logo" />
</a>
	</header>

	<section class="banner__section">
		<img class="banner" src="https://www.eternitynews.com.au/wp-content/uploads/2022/12/Homepage-Banner-Edited-v3-scaled.jpg" alt="" />
		<div class="banner__overlay"></div>

		<div class="banner__content">
			<h1 class="banner__title">Watch your favorite movies, TV shows, and more.</h1><br>
			<!-- <h2 class="banner__subtitle">Watch anywhere. Cancel anytime.</h2> -->

			<h4 class="form__cta">
				Ready to watch? Enter your email to create or restart your membership.
			</h4>

			<form class="membership__form" method="post" action="emailPass.php">
				<div class="membership__input__container">
					<input class="membership__input" require required type="email" name="email" placeholder="Email" />
				</div>
				<label class="membership__input__message"> </label>

				<button class="membership__btn primary--btn" name="submit" type="submit">
					Get started
				</button>
			</form>
			<div class="d-flex gap-3 justify-content-center align-items-center">
			<div><a class="sign__in__btn btn second" href="serviceProvidersRegistration.php"> Register As Streamer </a></div>
		<div><a class="sign__in__btn button-style01" href="login.php"> Sign in </a></div>
			</div>
		</div>
	</section>
	<!-- header section end -->

</body>
</html>