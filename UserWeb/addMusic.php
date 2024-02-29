<?php
$currentPage = 'addMusic.php'; // Define the current page
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
                    <h1>Add Music</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->

<div class="container">
    <form role="form" method="post" enctype="multipart/form-data">
        <div class="content-with">
            <div class="form-group">
                <label class="control-label">Music Title</label>
                <input maxlength="100" type="text" name="name" required="required" name="name" class="form-control"
                    placeholder="Enter Movie Title here.." />
            </div>
            <div class="form-group">
                <label class="control-label">Singer</label>
                <input maxlength="100" type="text" name="singer" required="required" name="email" class="form-control" />
            </div>
            <div class="form-group">
                <label class="control-label">Music</label>
                <input maxlength="100" type="file" name="music" required="required" name="email" class="form-control" />
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
    $musicTitle = $_POST['name'];
    $musicBy =$streamersID;
    $singer=$_POST['singer'];
    $img_tmp = $_FILES['img']['tmp_name'];
    $img_name = $_FILES['img']['name'];
    $img_type = $_FILES['img']['type'];
    $target_folder = "shared/MusicAlbum/";

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

     //Music Uploading validation
     $music_tmp = $_FILES['music']['tmp_name'];
     $music_name = $_FILES['music']['name'];
     $music_type = $_FILES['music']['type'];
     $targetMusicFolder = "shared/Musics/";
     $musicPath=$targetMusicFolder . $music_name;
 
     $allowedExt = array('aac', 'mp3', 'ogg', 'ape', 'aiff');
     $Ext = explode('.', $music_name);
     $musicExt = strtolower(end($Ext));
     if (in_array($musicExt, $allowedExt) == false) {
         $Merror[] = "not required extention";
     }
     if (empty($Merror) == true) { 
         move_uploaded_file($music_tmp, $targetMusicFolder . $music_name);
     }

     try{ $addMusicQ="insert into musicalbum(MusicTitle,Singer,MusicBy,MusicTitleImg,MusicTitleImgType,musicPath) values('$musicTitle','$singer','$streamersID','$add_img','$img_type','$musicPath')";
     $addMusic=mysqli_query($conn,$addMusicQ);}
     catch (mysqli_sql_exception $e) { 
        var_dump($e);
        exit; 
     } 
     if(!$addMusic){
        die(mysqli_error($conn));
     }
     

}
include 'shared/_footer.php'; ?>