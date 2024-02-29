<?php
session_start();

$userEmail = $_SESSION['userEmail'];
$userPwd = $_SESSION['userPass'];
$userID = $_SESSION['userID'];

if (isset($userEmail) && isset($userPwd)) {
} else {
	header('location:login.php');
}
include 'shared/config.php';
$planFetchQ="select * from plan";
$planFetch=mysqli_query($conn,$planFetchQ);
if(!$planFetch){
    die(mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plans</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <style>
        body{
            color: #fff
        }
        section{
            background: url(./assets/img/breadcrumb.png);
            background-repeat: no-repeat;
            background-size: cover;

        }
        .price-innerdetail h5 {
        font-weight: 400;
        letter-spacing: 2px;
        font-size: 15px;
    }
    
    .price-innerdetail p {
        font-size: 50px;
    }
    
    .detail-pricing {
        border-bottom: 1px solid;
        padding: 30px 0 30px 0;
    }
    
    .detail-pricing .float-left {
        padding: 0 0 0 40px;
    }
    
    .detail-pricing .float-left i {
        position: absolute;
        left: 0;
        font-size: 20px;
    }
    
    .detail-pricing span {
        display: inline-block;
        position: relative;
        font-weight: 400;
    }
    
    .wrap-price {
        background: rgb(117 12 12 / 21%);
        padding: 50px 20px 50px;
        border-radius: 10px;
    }
    
    .center-wrap {
        background: #070707;
        color: #fff;
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
</head>
<body>
    <section id="price-section">
        <div class="container justify-content-center">
            <div class="row justify-content-center gapsectionsecond">
                <div class="col-lg-7 text-center justify-content-center">
                    <div class="title-big mt-3">
                        <h3>CHOOSE A PLAN</h3>
                    </div>
                    <p class="description-p pe-0 pe-lg-0">Choose a right plan according to your need.
                    </p>
                </div>
            </div>
            <div class="row pt-5 justify-content-center">
                <?php
                while($plan=mysqli_fetch_array($planFetch)){
                ?>
                <div class="col-lg-4 pb-5 pb-lg-0">
                    <div class="wrap-price">
                        <div class="price-innerdetail text-center">
                            <h5><?php echo $plan['plan']; ?></h5>
                            <p class="prices"><?php echo $plan['planPrice']; ?> Price</p>
                            <div class="detail-pricing">
                                <span class="float-right"><?php echo $plan['planForDays']; ?> days Subscription</span>
                            </div>
                            <div class="detail-pricing">
                                <span class="float-right"><?php echo $plan['planScreenSharing']; ?></span>
                            </div>
                            <div class="detail-pricing">
                                <span class="float-right"><?php echo $plan['planQuality']; ?> video quality</span>
                            </div>
                            <a href="chooseStreamer.php?id=<?php echo $plan['planID']; ?>&planPrice=<?php echo $plan['planPrice']; ?>" class="btn btn-secondary mt-5 button-style01">Buy Now</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- <div class="col-lg-4 pb-5 pb-lg-0">
                    <div class="wrap-price center-wrap">
                        <div class="price-innerdetail text-center">
                            <h5>PRO SERVICE</h5>
                            <p class="prices">350$</p>
                            <div class="detail-pricing">
                                <span class="float-right">30 days Subscription</span>
                            </div>
                            <div class="detail-pricing">
                                <span class="float-right">4 screen</span>
                            </div>
                            <div class="detail-pricing">
                                <span class="float-left"> <i class="bi bi-check2-circle"></i> Consultation</span>
                                <span class="float-right">1080px video quality</span>
                            </div>
                            <a href="#" class="btn btn-secondary mt-5">Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pb-5 pb-lg-0">
                    <div class="wrap-price">
                        <div class="price-innerdetail text-center">
                            <h5>STANDART SERVICE</h5>
                            <p class="prices">250$</p>
                            <div class="detail-pricing">
                                <span class="float-right">30 days Subscription</span>
                            </div>
                            <div class="detail-pricing">
                                <span class="float-right">2 screen</span>
                            </div>
                            <div class="detail-pricing">
                                <span class="float-right">720px video quality</span>
                            </div>
                            <a href="#" class="btn btn-secondary mt-5">Buy Now</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
</body>
</html>