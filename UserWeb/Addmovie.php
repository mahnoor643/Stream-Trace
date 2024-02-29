<?php
$currentPage = 'home.php'; // Define the current page
include 'shared/_header.php';
$streamersEmail=$_SESSION['streamerEmail'];
$streamersPwd=$_SESSION['streamerPass'];
$streamersID=$_SESSION['streamerID'];
$movieCatQ = "select * from moviescategories";
$movieCat = mysqli_query($conn, $movieCatQ);
if (!$movieCat) {
    die(mysqli_error($conn));
}
?>
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
<!-- breadcrumb area start -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-area-content">
                    <h1>Add Movies</h1>
                </div>
            </div>
        </div>
    </div>
</section><!-- breadcrumb area end -->

<div class="container">
    <form role="form" method="post" enctype="multipart/form-data">
        <div class="content-with">
            <div class="form-group">
                <label class="control-label">Movie Title</label>
                <input maxlength="100" type="text" name="name" required="required" name="name" class="form-control"
                    placeholder="Enter Movie Title here.." />
            </div>
            <div class="form-group">
                <label class="control-label">Upload Movie</label>
                <input maxlength="100" type="file" name="movie" required="required" name="email" class="form-control" />
            </div>

            <div class="form-group">
            <label class="control-label">Select Movie Category</label>
                <select class="form-control" name="movieCat" required>
                    <?php
                    while ($fetch_cat = mysqli_fetch_array($movieCat)) {
                        ?>
                        <option value="<?php echo $fetch_cat['MovieCatID']; ?>"><?php echo $fetch_cat['MovieCat']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Title Image</label>
                <input maxlength="100" type="file" name="img" required="required" class="form-control" />
            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right button-style01" id="showDivButton" name="Register"
                type="submit">Register</button><br><br><br> 
        </div>
    </form>
</div>

<?php
if (isset($_POST['Register'])) {
    $movieTitle = $_POST['name'];
    $movieCat = $_POST['movieCat'];
    $movieBy = $streamersID;
    $img_tmp = $_FILES['img']['tmp_name'];
    $img_name = $_FILES['img']['name'];
    $img_type = $_FILES['img']['type'];
    $target_folder = "shared/MoviesTitleImages/";

    $allowed_ext = array('png', 'jpeg', 'jpg', 'gif', 'jfif');
    $ext = explode('.', $img_name);
    $img_ext = strtolower(end($ext));
    if (in_array($img_ext, $allowed_ext) == false) {
        $error[] = "not required extention";
    }
    if (empty($error) == true) {
        // $add_img = addslashes(file_get_contents($img_tmp));
        $add_img=$target_folder . $img_name;
        move_uploaded_file($img_tmp, $target_folder . $img_name);
    }

    //Movies Uploading validation
    $movie_tmp = $_FILES['movie']['tmp_name'];
    $movie_name = $_FILES['movie']['name'];
    $movie_type = $_FILES['movie']['type'];
    $targetMovieFolder = "shared/Movies/";
    $moviePath=$targetMovieFolder . $movie_name;

    $allowedExt = array('mp4', 'avi', 'mov', 'ogv', 'flv');
    $Ext = explode('.', $movie_name);
    $movieExt = strtolower(end($Ext));
    if (in_array($movieExt, $allowedExt) == false) {
        $Merror[] = "not required extention";
    }
    if (empty($Merror) == true) {
        // $add_movie = addslashes(file_get_contents($movie_tmp));
        move_uploaded_file($movie_tmp, $targetMovieFolder . $movie_name);
    }
    $addMovieQ = "insert into movies(moviePath,MovieName,MovieCategory,MovieBy,MovieTitleImg,MovieTitleImgType,movieType) values ('$moviePath','$movieTitle','$movieCat','$movieBy','$add_img','$img_type','$movie_type')";
    $addMovie= mysqli_query($conn,$addMovieQ);
    if(!$addMovie){
        die(mysqli_error($conn));
    }
}
include 'shared/_footer.php'; ?>