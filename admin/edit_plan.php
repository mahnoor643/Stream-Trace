

<?php

include "shared/config.php";
require "shared/header.php";
error_reporting(0);
  $id=$_GET['id'];
  $price=$_POST['price'];
  $days=$_POST['days'];
  $screen=$_POST['screen'];
  $video=$_POST['video'];
  $plan=$_POST['plane'];
  
  $edit="UPDATE `plan` SET planPrice='$price' , planQuality='$video',  planScreenSharing ='$screen' , planForDays ='$days',
  plan='$plan' where  planID='$id'";
  $edit_run=mysqli_query($conn,$edit);
  if($edit_run){
    echo "it not working";

  }else
  {
    echo "working";
  }
 




?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create account - Windmill Dashboard</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../assets/css/tailwind.output.css" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="../assets/js/init-alpine.js"></script>
  </head>
  <body>
  <?php
                $edit_n="SELECT * From `plan`";
                $edit_q=mysqli_query($conn,$edit_n);
                while($row_e=mysqli_fetch_array($edit_q)){

                

                 ?>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div
        class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
      >
        
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1
                class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
              >
             <?php echo $row_e['plan'];?>  SERVICE
              </h1>
          
              
              <form  method="post" >
              <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Plane</span>
              
                <input
                name="plane"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  value="<?php echo $row_e['plan'];?>"
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Price</span>
               
                <input
                name="price"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                 value="<?php echo $row_e['planPrice'];?>"
                />
              </label>
           
              <label class="block mt-4 text-sm">days
                <span class="text-gray-700 dark:text-gray-400">
                
                </span>
                
                <input
                name="days"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                value=" <?php echo $row_e['planForDays'];?>"
                  
                />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                Screen
                </span>
                

                <input
                name="screen"
                
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  value="<?php echo $row_e['planScreenSharing'];?>"
                
                />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                quality
                </span>
                
                <input
                name="video"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                 value="<?php echo $row_e['planQuality'];?>"
                  
                />
              </label>
            
              
             
              <button  class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
               
              name="edit" type="submit" >Edit</button> 
             
              </form>
            
           
                
            </div>
        </div>
        
    </div>
 </div>          
 <?php
              }
              ?>
  </body>
</html>
