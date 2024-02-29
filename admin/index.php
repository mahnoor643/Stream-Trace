<?php




require "shared/config.php";
include "shared/header.php";
?>

<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      
    </h2>
   
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
            </path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Total Users
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            <?php
            $query_u = "SELECT * from users";
            $query_runing = mysqli_query($conn, $query_u);
            if ($u_row = mysqli_num_rows($query_runing)) {
              echo "<p> $u_row </p>";
            } else {
              echo
                "no data";
            }




            ?>

          </p>
        </div>
      </div>
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
              d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
              clip-rule="evenodd"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Subscriptions
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            <?php

            $query_s = "SELECT * from subscriptions";
            $query_sub = mysqli_query($conn, $query_s);
            if ($sub_row = mysqli_num_rows($query_sub)) {
              echo "<p> $sub_row </p>";
            } else {
              echo "no data";
            }
            ?>
          </p>
        </div>
      </div>
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
            </path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Streamers
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            <?php
            $query_st = "SELECT * FROM `serviceproviders`";
            $query_runn = mysqli_query($conn, $query_st);
            if ($st_row = mysqli_num_rows($query_runn)) {
              echo "<p> $st_row </p>";
            } else {
              echo "No Data";
            }
            ?>
          </p>
        </div>
      </div>

    </div>
  </div>

  <!-- New Table -->

 
  <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr
            class="text-xs font-semibold tracking-wide text-left text-black-500 uppercase border-b dark:border-black-700 bg-gray-50 dark:text-black-400 dark:bg-black-800">
            <th class="px-4 py-3">Movie</th>
            <th class="px-4 py-3">Movie Name</th>
            <th class="px-4 py-3">Status</th>

          </tr>
        </thead>
        <?php
 $movie="SELECT * from  `movies` where `status`= '1'";
 $movie_r=mysqli_query($conn,$movie);
 while($movie_row=mysqli_fetch_array($movie_r)){

?>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3">
              <div class="flex items-center text-sm">
                <!-- Avatar with inset shadow -->
                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                  <img class="object-cover w-full h-full rounded-full"
                  src="<?php echo $ser_row['MovieTitleImg']; ?>"
                    alt="" loading="lazy" />
                  <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                </div>
                <div>
                  <p class="font-semibold"><?php echo $movie_row['Movie'];?></p>
        <!-- ../UserWeb/           -->
                </div>
              </div>
            </td>
            <td class="px-4 py-3 text-sm">
            <p class="font-semibold"><?php echo $movie_row['MovieName'];?></p>
            </td>
            <td class="px-4 py-3 text-xs">
              <span
                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                <?php 
                
                
                $id=$ser_row['serviceProvidersID'];
$st=$movie_row['status'];
if($st==1){
   echo "<a href='?id=$id&status=$st'><button type='button' class='px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100'>Active</button></a>";
}else  {
   echo "<a href='?id=$id&status=$st'><button type='button' class='px-2 py-1 font-semibold  leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100'>Deactive</button></a>";
}
?>
              </span>
            </td>

          </tr>
<?php
}
?>
    </div>
  </div>
  </div>
</main>
</div>
</div>
</body>

</html>