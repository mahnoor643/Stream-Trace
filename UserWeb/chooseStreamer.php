<?php
$id = $_GET['id'];
$planPrice=$_GET['planPrice'];
session_start();
$userEmail = $_SESSION['userEmail'];
$userPwd = $_SESSION['userPass'];
$userID = $_SESSION['userID'];
if (isset($userEmail) && isset($userPwd)) {
} else {
    header('location:login.php');
}
include 'shared/config.php';
$serviceProvidersQ = "select * from serviceproviders";
$serviceProviders = mysqli_query($conn, $serviceProvidersQ);
if (!$serviceProviders) {
    die(mysqli_error($conn));
}
if (isset($_POST['submitSubscriptions'])) {
    $price = $_POST['price'];

    $streamersQ = "insert into subscriptions(subscriptionFor,subscriptionBy,payedAmount,renewalDate) values('$id','$userID','$price',DATE_ADD(CURRENT_DATE(), INTERVAL 30 DAY))";
    $streamers = mysqli_query($conn, $streamersQ);
    if (!$streamers) {
        die(mysqli_error($conn));
    } else {
       echo "<script> 
       alert('you have successfully subscribed!');
       window.location.href = 'usersMoviesAndMusics.php';
       </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Streamer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <style>
        body {
            background: url(./assets/img/breadcrumb.png);
            background-repeat: no-repeat;
            background-size: cover;
            color: #ffffff;
        }

        .modal-confirm {
            color: #434e65;
            width: 525px;
        }

        .modal-confirm .modal-content {
            padding: 20px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
        }

        .modal-confirm .modal-header {
            background: #47c9a2;
            border-bottom: none;
            position: relative;
            text-align: center;
            margin: -20px -20px 0;
            border-radius: 5px 5px 0 0;
            padding: 35px;
        }

        .modal-confirm h4 {
            text-align: center;
            font-size: 36px;
            margin: 10px 0;
        }

        .modal-confirm .form-control,
        .modal-confirm .btn {
            min-height: 40px;
            border-radius: 3px;
        }

        .modal-confirm .close {
            position: absolute;
            top: 15px;
            right: 15px;
            color: #fff;
            text-shadow: none;
            opacity: 0.5;
        }

        .modal-confirm .close:hover {
            opacity: 0.8;
        }

        .modal-confirm .icon-box {
            color: #fff;
            width: 95px;
            height: 95px;
            display: inline-block;
            border-radius: 50%;
            z-index: 9;
            border: 5px solid #fff;
            padding: 15px;
            text-align: center;
        }

        .modal-confirm .icon-box i {
            font-size: 64px;
            margin: -4px 0 0 -4px;
        }

        .modal-confirm.modal-dialog {
            margin-top: 80px;
        }

        .modal-confirm .btn,
        .modal-confirm .btn:active {
            color: #fff;
            border-radius: 4px;
            background: #eeb711 !important;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            border-radius: 30px;
            margin-top: 10px;
            padding: 6px 20px;
            border: none;
        }

        .modal-confirm .btn:hover,
        .modal-confirm .btn:focus {
            background: #eda645 !important;
            outline: none;
        }

        .modal-confirm .btn span {
            margin: 1px 3px 0;
            float: left;
        }

        .modal-confirm .btn i {
            margin-left: 1px;
            font-size: 20px;
            float: right;
        }

        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
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
    <div class="container mt-3">
        <div>
            <h1 class="text-center">Choose Your Favourite Streamer</h1>
        </div>
        <div class="row mb-5 justify-content-center mt-3">
            <?php while ($providers = mysqli_fetch_array($serviceProviders)) { ?>
                <div class="col-md-6">
                    <div class="card">
                        <img style="height: 200px; object-fit: cover;" src="<?php echo $providers['ProvidersLogo']; ?>" class="card-img-top img-fluid" alt="...">
                        <form  method="post">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $providers['ProvidersName']; ?>
                                </h5>
                                <input type="hidden" name="pricingID" value="<?php echo $id; ?>">
                                <input type="hidden" name="streamersID"
                                    value="<?php echo $providers['serviceProvidersID']; ?>">
                                    <input type="hidden" name="price" value="<?php echo $planPrice; ?>">
                                <button id="submitButton" type="submit" name="submitSubscriptions"
                                    class="btn btn-sm btn-primary button-style01">Confirm Streamer</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal HTML -->
                <div id="myModal" class="modal fade">
                    <div class="modal-dialog modal-confirm">
                        <div class="modal-content">
                            <div class="modal-header justify-content-center">
                                <div class="icon-box">
                                    <i class="material-icons">&#xE876;</i>
                                </div>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body text-center">
                                <h4>Great!</h4>
                                <p>You have subscribed successfully!</p>
                                <button class="btn btn-success" data-dismiss="modal"><span>Start Exploring</span> <i
                                        class="material-icons">&#xE5C8;</i></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
           
            <!-- <div class="col-md-6">
                <div class="card">
                    <img src="https://source.unsplash.com/random/1920x1080" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Streamer 02</h5>
                        <a href="#" class="btn btn-sm btn-primary">Select</a>
                    </div>
                </div>
            </div>
        </div> -->
        </div>
</body>

</html>