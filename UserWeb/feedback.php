<?php
$currentPage = 'feedback.php';
include 'shared/_header.php';


$userEmail = $_SESSION['userEmail'];
$userPwd = $_SESSION['userPass'];
$userID = $_SESSION['userID'];
if (!isset($userEmail) || !isset($userPwd)) {
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
                    .header{
        position: relative;
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
        <!-- feedback start -->
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
                        <button type="submit" name="submit" class="btn btn-primary button-style01">Submit</button>
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
