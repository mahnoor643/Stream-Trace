<?php
require "shared/config.php";
include "shared/header.php";



?>
<!-- With actions -->
<h4 class="mb-8 text-lg font-semibold text-gray-600 dark:text-gray-300">
    <!-- Table with actions -->
</h4>
<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-black-500 uppercase border-b dark:border-black-700 bg-black-50 dark:text-black-400 dark:bg-black-800">
                    <th class="px-4 py-3">Plan</th>
                    <th class="px-4 py-3">Days</th> 
                    <th class="px-4 py-3">Price</th>
                    <th class="px-4 py-3">Video Quality</th>
                    <th class="px-4 py-3">Screen Sharing</th>
                </tr>
            </thead>
            <?php


         
            $query_p="SELECT * from `plan`";
            $query_p_run=mysqli_query($conn,$query_p);
            while($row_p=mysqli_fetch_array($query_p_run)){
                
            
            ?>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            
                            <div>
                                <p class="font-semibold"><?php echo $row_p['plan'] ?></p>

                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                  
                            <div>
                                <p class="font-semibold"><?php echo $row_p['planForDays']; ?></p>

                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                  
                            <div>
                                <p class="font-semibold"><?php echo $row_p['planPrice']; ?></p>

                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                  
                            <div>
                                <p class="font-semibold"><?php echo $row_p['planQuality']; ?></p>

                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                  
                            <div>
                                <p class="font-semibold"><?php echo $row_p['planScreenSharing']; ?></p>

                            </div>
                        </div>
                    </td>
                    
                                 <?php
                                }   
                                ?>

                               
                 
                                                        
                </tr>
            </tbody>
        </table>
        </tr>
    </div>
</div>
</div>
</main>
</div>
</div>
</body>

</html>