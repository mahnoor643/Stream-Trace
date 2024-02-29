<?php include 'shared/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
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

  <section class="vh-100" style="background: url(./assets/img/breadcrumb.png); background-repeat: no-repeat; background-size: cover;
">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up As Streamer</p>

                  <form class="mx-1 mx-md-4" method="post" enctype="multipart/form-data">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" name="name" id="form3Example1c" class="form-control" />
                        <label class="form-label" for="form3Example1c">Your Name</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" name="email" id="form3Example3c" class="form-control" />
                        <label class="form-label" for="form3Example3c">Your Email</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" onChange="onChange()" name="pass" id="form3Example4c"
                          class="form-control" />
                        <label class="form-label" for="form3Example4c">Password</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" name="r-pass" onChange="onChange()" id="form3Example4cd"
                          class="form-control" />
                        <label class="form-label" for="form3Example4cd">Repeat your password</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-5">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="file" name="img" id="form3Example4cd" class="form-control" />
                        <label class="form-label" for="form3Example4cd">Add Logo here</label>
                      </div>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" name="submit" class="btn btn-primary btn-lg button-style01">Register</button>
                    </div>

                  </form>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="./assets/img/LOGO (DARK THEME).png"
                    class="img-fluid" alt="Sample image">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <?php
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['r-pass'];
    $img_tmp = $_FILES['img']['tmp_name'];
    $img_name = $_FILES['img']['name'];
    $img_type = $_FILES['img']['type'];
    $target_folder = "shared/serviceProvidersLogo/";
    // $message="Your account is not created yet";
    // $msg="Your account is created succesfully";
  
    $allowed_ext = array('png', 'jpeg', 'jpg', 'gif', 'jfif');
    $ext = explode('.', $img_name);
    $img_ext = strtolower(end($ext));
    if (in_array($img_ext, $allowed_ext) == false) {
      $error[] = "not required extention";
    }
    if (empty($error) == true) {
      $add_img = $target_folder.$img_name;
      move_uploaded_file($img_tmp, $target_folder . $img_name);
    }
    $providersRegQ = "insert into serviceproviders(ProvidersName,ProvidersEmail,ProvidersPwd,ProvidersLogo,LogoType) values('$name','$email','$pass','$add_img','$img_type')";
    $providersReg = mysqli_query($conn, $providersRegQ);
    if (!$providersReg) {
      die(mysqli_error($conn));
    }else{
      echo "<script type='text/javascript'>
      window.location.href='login.php';
      alert('Wait for your OTP for confirmation!');
      </script>";
    }
  }
  ?>
  <script>
    function onChange() {
      const password = document.querySelector('input[name=pass]');
      const confirm = document.querySelector('input[name=r-pass]');
      if (confirm.value === password.value) {
        confirm.setCustomValidity('');
      } else {
        confirm.setCustomValidity('Passwords do not match');
      }
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>