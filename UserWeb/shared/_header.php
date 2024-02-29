<?php 
session_start();
include 'shared/config.php' ?>
<!DOCTYPE HTML>
<html lang="zxx">
    
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Moviepoint - Online Movie,Vedio and TV Show HTML Template</title>
        <!-- Favicon Icon -->
        <link rel="icon" type="image/png" href="assets/img/favcion.png" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all" />
        <!-- Slick nav CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/slicknav.min.css" media="all" />
        <!-- Iconfont CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/icofont.css" media="all" />
        <!-- Owl carousel CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
        <!-- Popup CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">
        <!-- Main style CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all" />
        <!-- Responsive CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="all" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
        <!-- fontawesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <!-- music player css -->
        <link rel="stylesheet" href="assets/fancybox.css">
        <style>
.mainmenu li.active a, .mainmenu li a:hover {
    color: #eb315a;
}
.button-style01{
    display: flex;
     padding: 0.875em 2em;
     background: linear-gradient(90deg, #b92a2a, #5a373700) #483232;
     font-family: inherit;
     color: #fff;
     text-decoration: none;
     transition: background-color 1s;
     place-content: center;
     align-items: center;
 }
 .button-style01:hover, .button-style01:focus {
  background-color: #bb7878;
     color: #fff !important;
 }

        </style>
        </style>
    </head>
    <body>
        <!-- Page loader -->
        <!-- <div id="preloader"></div> -->
        <!-- header section start -->
        <header class="header">
            <div class="container">
                <div class="header-area">
                    <div class="logo">
                        <a href="index-2.html"><img style="height: 80px;" src="assets/img/LOGO (LIGHT THEME).png" alt="logo" /></a>
                    </div>
                    <div class="header-right">
                        <form action="usersMoviesAndMusics.php" method="post">
                            <select name="sortFor">
                                <option value="Movies">Movies</option>
                                <option value="Musics">Music Albums</option>
                            </select>
                            <input type="text" name="result"/>
                            <button type="submit" name="search"><i class="icofont icofont-search"></i></button>
                        </form>
                        <!-- <ul>
                            <li><a href="#">Welcome Guest!</a></li>
                            <li><a class="login-popup" href="#">Login</a></li>
                        </ul> -->
                    </div>
                    <div class="menu-area">
                        <div class="responsive-menu"></div>
                        <div class="mainmenu">
                            <ul id="primary-menu">
                                <?php if(isset($_SESSION['userID'])){ ?>
                                <li  <?php if ($currentPage === 'home.php')
                                        echo 'class="active"'; ?>><a href="home.php">Home</a></li>
                                <li  <?php if ($currentPage === 'usersMoviesAndMusics.php')
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

                                <!-- <li><a href="#">Pages <i class="icofont icofont-simple-down"></i></a>
                                    <ul>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                        <li><a href="movie-details.html">Movie Details</a></li>
                                    </ul>
                                </li>
                                <li><a class="theme-btn" href="#"><i class="icofont icofont-ticket"></i> Tickets</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="login-area">
            <div class="login-box">
                <a href="#"><i class="icofont icofont-close"></i></a>
                <h2>LOGIN</h2>
                <form action="#">
                    <h6>USERNAME OR EMAIL ADDRESS</h6>
                    <input type="text" />
                    <h6>PASSWORD</h6>
                    <input type="text" />
                    <div class="login-remember">
                        <input type="checkbox" />
                        <span>Remember Me</span>
                    </div>
                    <div class="login-signup">
                        <span>SIGNUP</span>
                    </div>
                    <a href="#" class="theme-btn">LOG IN</a>
                    <span>Or Via Social</span>
                    <div class="login-social">
                        <a href="#"><i class="icofont icofont-social-facebook"></i></a>
                        <a href="#"><i class="icofont icofont-social-twitter"></i></a>
                        <a href="#"><i class="icofont icofont-social-linkedin"></i></a>
                        <a href="#"><i class="icofont icofont-social-google-plus"></i></a>
                        <a href="#"><i class="icofont icofont-camera"></i></a>
                    </div>
                </form>
                
            </div>
        </div>
        <div class="buy-ticket">
            <div class="container">
                <div class="buy-ticket-area">
                    <a href="#"><i class="icofont icofont-close"></i></a>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="buy-ticket-box">
                                <h4>Buy Tickets</h4>
                                <h5>Seat</h5>
                                <h6>Screen</h6>
                                <div class="ticket-box-table">
                                    <table class="ticket-table-seat">
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                    </table>
                                    <table>
                                        <tr>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                        </tr>
                                    </table>
                                    <table class="ticket-table-seat">
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td class="active">1</td>
                                            <td class="active">1</td>
                                            <td class="active">1</td>
                                            <td class="active">1</td>
                                            <td class="active">1</td>
                                            <td class="active">1</td>
                                            <td class="active">1</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                    </table>
                                    <table>
                                        <tr>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                        </tr>
                                    </table>
                                    <table class="ticket-table-seat">
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="ticket-box-available">
                                    <input type="checkbox" />
                                    <span>Available</span>
                                    <input type="checkbox" checked />
                                    <span>Unavailable</span>
                                    <input type="checkbox" />
                                    <span>Selected</span>
                                </div>
                                <a href="#" class="theme-btn">previous</a>
                                <a href="#" class="theme-btn">Next</a>
                            </div>
                        </div>
                        <div class="col-lg-3 offset-lg-1">
                            <div class="buy-ticket-box mtr-30">
                                <h4>Your Information</h4>
                                <ul>
                                    <li>
                                        <p>Location</p>
                                        <span>HB Cinema Box Corner</span>
                                    </li>
                                    <li>
                                        <p>TIME</p>
                                        <span>2018.07.09   20:40</span>
                                    </li>
                                    <li>
                                        <p>Movie name</p>
                                        <span>Home Alone</span>
                                    </li>
                                    <li>
                                        <p>Ticket number</p>
                                        <span>2 Adults, 2 Children, 2 Seniors</span>
                                    </li>
                                    <li>
                                        <p>Price</p>
                                        <span>89$</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- header section end -->