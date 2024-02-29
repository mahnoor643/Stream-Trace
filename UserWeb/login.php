<?php
include 'shared/config.php';

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<?PHP
//streamer login
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $message = "Access denied";
  if ($_POST['role'] == 'Streamer') {
    $loginStreamerQ = "select * from serviceproviders where ProvidersEmail='$email' and ProvidersPwd='$pass'";
    $loginStreamer = mysqli_query($conn, $loginStreamerQ);
    if (!$loginStreamer) {
      die(mysqli_error($conn));
    } else {
      $fetch = mysqli_fetch_array($loginStreamer);
      if (mysqli_num_rows($loginStreamer) > 0) {
        $_SESSION['streamerEmail'] = $fetch['ProvidersEmail'];
        $_SESSION['streamerPass'] = $fetch['ProvidersPwd'];
        $_SESSION['streamerID'] = $fetch['serviceProvidersID'];
        // header("location:");
        echo "<script type='text/javascript'>
        window.location.href='home.php';
        alert('You are logged in successfully!');
        </script>";
      } else {
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }

    
    //user login
  } else {
    $loginUserQ = "select * from users where userEmail='$email' and userPwd='$pass'";
    $loginUser = mysqli_query($conn, $loginUserQ);
    if (!$loginUser) {
      die(mysqli_error($conn));
    } else {
      $fetchU = mysqli_fetch_array($loginUser);
      if (mysqli_num_rows($loginUser) > 0) {
        $_SESSION['userEmail'] = $fetchU['userEmail'];
        $_SESSION['userPass'] = $fetchU['userPwd'];
        $_SESSION['userID'] = $fetchU['userID'];
        $subscribedU=$fetchU['userID'];
        $subscribedUser="select * from users join subscriptions on subscriptions.subscriptionBy=users.userID where users.userID='$subscribedU'";
        $subscribed=mysqli_query($conn,$subscribedUser);
        if(mysqli_num_rows($subscribed)>0){
        header('location:home.php');
      }else{
        header('location:pricing.php');
      }
      } else {
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }
  }
}
?>

<style>
  img {
    width: 100%;
  }

  .login {
    height: 1000px;
    width: 100%;
    background: url(./assets/img/breadcrumb.png);
    position: relative;
    background-repeat: no-repeat;
    background-size: cover;
  }

  .login_box {
    width: 1050px;
    height: 600px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #fff;
    border-radius: 10px;
    box-shadow: 1px 4px 22px -8px #0004;
    display: flex;
    overflow: hidden;
  }

  .login_box .left {
    width: 41%;
    height: 100%;
    padding: 25px 25px;

  }

  .login_box .right {
    width: 59%;
    height: 100%
  }

  .left .top_link a {
    color: #452A5A;
    font-weight: 400;
  }

  .left .top_link {
    height: 20px
  }

  .left .contact {
    display: flex;
    align-items: center;
    justify-content: center;
    align-self: center;
    height: 100%;
    width: 73%;
    margin: auto;
  }

  .left h3 {
    text-align: center;
    margin-bottom: 40px;
  }

  .left input {
    border: none;
    width: 80%;
    margin: 15px 0px;
    border-bottom: 1px solid #4f30677d;
    padding: 7px 9px;
    width: 100%;
    overflow: hidden;
    background: transparent;
    font-weight: 600;
    font-size: 14px;
  }

  .left {
    background: linear-gradient(-45deg, #dcd7e0, #fff);
  }

  .submit {
    border: none;
    padding: 15px 70px;
    border-radius: 8px;
    display: block;
    margin: auto;
    margin-top: 120px;
    background: #583672;
    color: #fff;
    font-weight: bold;
    -webkit-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    -moz-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
  }

  .right {
    background: linear-gradient(212.38deg, rgba(54, 47, 50, 0.342) 0%, rgba(51, 28, 33, 0.527) 100%);
    color: #fff;
    position: relative;
  }

  .right .right-text {
    height: 100%;
    position: relative;
    transform: translate(0%, 45%);
  }

  .right-text h2 {
    display: block;
    width: 100%;
    text-align: center;
    font-size: 50px;
    font-weight: 500;
  }

  .right-text h5 {
    display: block;
    width: 100%;
    text-align: center;
    font-size: 19px;
    font-weight: 400;
  }

  .right .right-inductor {
    position: absolute;
    width: 70px;
    height: 7px;
    background: #fff0;
    left: 50%;
    bottom: 70px;
    transform: translate(-50%, 0%);
  }

  .top_link img {
    width: 28px;
    padding-right: 7px;
    margin-top: -3px;
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

<body>
  <section class="login">
    <div class="login_box">
      <div class="left">
        <div class="top_link"><a href="index.php" style="color: red;"><img
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAb1BMVEX///8eIB0ABwAABQAAAACfn56jpKIbHRrDw8MZHBjMzMzAwcAbHhrExcQDCQDS0tIVGBQKDgi4ubjl5eVxcnEQEw/29vbe396ur66YmJdeX13Z2di1trUlJyRRUlFlZmRERkQ5Ozg0NjN4eXhTVFLuQuL+AAADfUlEQVR4nO2dbU/bQBCE/XLFdvxSO06CAwQI9P//xiaASiDjVqrOWt3cPN8jzeh2vbt3ji9JhBBCCCGEEEIIIYQQQgghhBBC/AfjtN9Po7WK5Rg3znWdc3f31koWYlUN6Rtb92CtZRFKV6QfFK60VrMA9afBNK0OO2s93qmzC4Np6iZrQb5p3ReDaf9orcgz3w2eFtFakl/qK4NkDr/l4NvTdLAW5ZPyegXT7ZO1Ko8gg6mrrWX5o86Bwf7ZWpY/StdcG6yGW2td3oAhWnU/rXV5A5SJ8wqurHV5A5QJLoMwRIucx+B1q3ZeQaccDIYyQ2WiIzLIXiawwZzHIH2ZaFGrVjgegzhEM6IQZS8T9DmIW7WM3KBatYAoc7VqYYNDlMkge5mAAy9Tq4YnerVq4UCfg2rVQqeGnQxViCKDRBu/atVCJ9IyQd+qMW38qlULHJyD9FsWTDmI3pOptkwrqMOXsFGZCB3692T4J3r2HNThS+jgEGWqg+xlgv7wRa1a6NDnoA5fQqeGA++BxyCc6NP+6eZHwEzt7sIgCNGzxSxknHOb8e8Gw2d4LwX3AwpRDqrh/Cg59tY6FqQ/JsnaWatYFLdONsxLeFrETfLC+ph5p3hJrCUszYF+DY/JZmstYlG2r/TP0pK8Hm4f33oa3kzs+1vqvrTpio/5D+6xpefZIg+Y02zx+md+atGR9mk+nG4C5qG9/JRTiSwWKc+MH8FmcBwWO7QZRXSsFsE7UHEEKn5NqLXW5ZGyQ6s4MFmMIlD5LaJDNrJcxEWDyWIMgYosNlyBCotGRmURByqTxZlA5cpF/gYO1cWGKhcjeKLO1EUqi+ijcw3V99bhm25NzmQxhkDFFom+gzzTwHFZxKvIlYuwu4nAIlOgwj9bcllU0WCghMc2VBZhA8dlcSZQVTSCoo62gWOyGEHRaNFfaAu3ttblkZmiwWQxhkDFm4xMqzhTNKgsKhcJgA0cWS7CYxsqi7CBa8gClX8V8bENk0V8bENlcaZoyGJQzDRwTLdyx9vAcVmEUz/TX1HwXbJHa1k+wfcBM8UpvtP5zlqVV9C93J21KL/Q360OikbD5vDKYv/LWpF3vuWim6wF+edLLlaH3b9/ERwXRYPr4PSTVTN8FMOMabq4ZNw413XO3d1bK1mOcdrvp9FahRBCCCGEEEIIIYQQQgghhBBCRMtv7PxEggm3iH4AAAAASUVORK5CYII=" alt="">Return
            home</a></div>
        <div class="contact">
          <form method="post">
            <h3>SIGN IN</h3>
            <select name="role">
              <option value="User">User</option>
              <option value="Streamer">Streamer</option>
            </select>
            <input type="email" name="email" placeholder="abc@example.com">
            <input type="password" name="pass" placeholder="PASSWORD">
            <button class="submit button-style01" name="submit" type="submit">LET'S GO</button>
          </form>
        </div>
      </div>
      <div class="right">
        <div class="right-text" style="margin: 0 auto;">
          <img style="width:200px; margin: 0 auto;" class="d-flex justify-content-center" src="./assets/img/LOGO (DARK THEME).png"
            alt="logo" />
        </div>
        <div class="right-inductor"><img
            src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft"
            alt=""></div>
      </div>
    </div>
  </section>
</body>

</html>