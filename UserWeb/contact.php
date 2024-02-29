<?php 
$currentPage = 'contact.php';
include 'shared/_header.php';
$userEmail=$_SESSION['userEmail'];
$userPwd=$_SESSION['userPass'];
$userID=$_SESSION['userID'];
if(isset($userEmail)&& isset($userPwd)){
}
else {
 header('location:login.php');
}
$userID=4;
include 'shared/config.php';
if(isset($_POST['submit'])){
    $msg=$_POST['msg'];
    $contactQ="insert into contactus(Msg,userID) values('$msg','$userID')";
    $contact=mysqli_query($conn,$contactQ);
    if(!$contact){
        die(mysqli_error($conn));
    }else{
        echo "<script type='text/javascript'>alert('Your form is successfully submitted!');</script>";
        header('location:usersMoviesAndMusics.php');
    }
}
?>
<style>
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
<section class="container mt-5">
            				<div class="col-lg-6 text-center text-lg-left">
					    <div class="section-title">
							<h1><i class="icofont icofont-contacts"></i> Contact Us</h1>
						</div>
					</div>
<br>
					<hr />
    <!--Contact heading-->
    <div class="row mt-3 align-items-center">

        <!--Grid column-->
        <div class="col-sm-12 mb-4 col-md-5">
            <!--Form with header-->
            <div class="card border-primary rounded-0">
                <div class="card-header p-0">
                    <div style="background-color: red;" class="text-white text-center py-2">
                        <h3><i class="fa fa-envelope"></i> Write to us:</h3>
                        <p class="m-0">We’ll write rarely, but only the best content.</p>
                    </div>
                </div>
                <div class="card-body p-3">

<form method="post">
                    <div class="form-group">
                        <label>Message</label>
                        <div class="input-group mb-2 mb-sm-0">
                            <textarea name="msg" id="" cols="55" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" name="submit" value="submit"
                            class="btn btn-primary btn-block button-style01">
                    </div>
                </form>
                </div>

            </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-sm-12 col-md-7">
            <!--Google map-->
            <div class="mb-4">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3618.137712000791!2d67.0304584751764!3d24.927378142577012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33f90157042d3%3A0x93d609e8bec9a880!2sAptech%20Computer%20Education%20North%20Nazimabad%20Center!5e0!3m2!1sen!2s!4v1691748938933!5m2!1sen!2s"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!--Buttons-->
            <div class="row text-center">
                <div class="col-md-4">
                    <a style="background-color: red;" class="px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa-solid fa-address-book"></i></a>
                    <p> Your Address ….. </p>
                </div>
                <div class="col-md-4">
                    <a style="background-color: red;" class="px-3 py-2 rounded text-white mb-2 d-inline-block"><i
                            class="fa fa-phone"></i></a>
                    <p>+91- 90000000</p>
                </div>
                <div class="col-md-4">
                    <a style="background-color: red;" class="px-3 py-2 rounded text-white mb-2 d-inline-block"><i
                            class="fa fa-envelope"></i></a>
                    <p> your@gmail.com</p>
                </div>
            </div>
        </div>
        <!--Grid column-->
    </div>
</section>
<?php
include 'shared/_footer.php';
?>