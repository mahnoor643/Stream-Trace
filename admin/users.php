<?php
require "shared/config.php";
include "shared/header.php";


?>


  <!-- New Table -->
  <div class="w-full  rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-black-500 uppercase border-b dark:border-black-700 bg-gray-50 dark:text-black-400 dark:bg-black-800"
                    >
                      <th class="px-4 py-3">Name</th>
                      <th class="px-4 py-3">Email</th>
                      <th class="px-4 py-3">Contact No</th>
                 
                      
                    </tr>
                  </thead>

                  <?php
                  $user="SELECT * FROM `users`";
                  $user_run=mysqli_query($conn,$user);
                  while($user_row=mysqli_fetch_array($user_run)){

                 
                  ?>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                        
                          <!-- Avatar with inset shadow -->
                          <form  method="post" enctype="multipart/form-data">
                         
                        
                            </form>
                          </div>
                          <div>
                            <p class="font-semibold"><?php echo $user_row['userName']; ?></p>
                            
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <?php echo $user_row['userEmail']; ?>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <?php echo $user_row['userPhoneNo']; ?>
                      </td>
                      
                    </tr>
                 <?php
                  }
                 ?>
                  
                  </tbody>
                </table>
              </div>
              
          
     
      
    </div>
  </body>
</html>
