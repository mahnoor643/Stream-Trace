<?php
require "shared/config.php";
include "shared/header.php";

?>




<!-- New Table -->
<div class="w-full overflow-hidden rounded-lg shadow-xs">
  <div class="w-full overflow-x-auto">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr
          class="text-xs font-semibold tracking-wide text-left text-black-500 uppercase border-b dark:border-black-700 bg-black-50 dark:text-black-400 dark:bg-black-800">
          <th class="px-4 py-3">Name</th>
          <th class="px-4 py-3">Email</th>
          <th class="px-4 py-3">Status</th>

        </tr>
      </thead>

      <?php
      $servies = "SELECT * FROM `serviceproviders`";
      $ser_run = mysqli_query($conn, $servies);
      while ($ser_row = mysqli_fetch_array($ser_run)) {


        ?>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3">
              <div class="flex items-center text-sm">

                <!-- Avatar with inset shadow -->
                <form method="post" enctype="multipart/form-data">
                  <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                    <img
                      src="data:<?php echo $ser_row['LogoType']; ?>;base64,<?php echo base64_encode($ser_row['ProvidersLogo']); ?>"
                      class="object-cover w-full h-full rounded-full" alt="" loading="lazy" />
                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                </form>
              </div>
              <div>
                <p class="font-semibold">
                  <?php echo $ser_row['ProvidersName']; ?>
                </p>

              </div>
    </div>
    </td>
    <td class="px-4 py-3 text-sm">
      <?php echo $ser_row['ProvidersEmail']; ?>
    </td>
    <td class="px-4 py-3 text-xs">

      <?php
      $id = $ser_row['serviceProvidersID'];
      $st = $ser_row['status'];
      if ($st == 1) {
        echo "<a href='active.php?id=$id&status=$st'><button type='button' class='px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100'>Active</button></a>";
      } else {
        echo "<a href='active.php?id=$id&status=$st'><button type='button' class='px-2 py-1 font-semibold  leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100'>Deactive</button></a>";
      }





      ?>
    </td>
    </span>
    </td>

    </tr>
    <?php
      }
      ?>

  </tbody>
  </table>
</div>

</div>
</main>
</div>
</div>
</body>

</html>