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
                    <th class="px-4 py-3">Subcription For</th>
                    <th class="px-4 py-3">Subcription By</th>
                    <th class="px-4 py-3">Availed Date</th>
                    <th class="px-4 py-3">Renewal Date</th>
                    <th class="px-4 py-3">Payed Amount</th>
                    <th class="px-4 py-3">Status</th>

                </tr>
            </thead>

          
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php
            $subcription = "select s.*, se.serviceProvidersID,u.userID from subscriptions s join users u on s.subscriptionBy=u.userID join serviceproviders se on se.serviceProvidersID=s.subscriptionFor";
            $sub_run = mysqli_query($conn, $subcription);
            while ($ser_row = mysqli_fetch_array($sub_run)) {


                ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                               
                            </div>
                            <div>
                                <p class="font-semibold">
                                    <?php echo $ser_row['subscriptionFor']; ?>
                                </p>

                            </div>

                        </td>
                        <td class="px-4 py-3 text-sm">
                            <?php echo $ser_row['subscriptionBy']; ?>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <?php echo $ser_row['availedDate']; ?>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <?php echo $ser_row['renewalDate']; ?>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <?php echo $ser_row['payedAmount']; ?>
                        </td>


                        <td class="px-4 py-3 text-xs">

                            <?php
                            $id = $ser_row['subcriptionID'];
                            $st = $ser_row['status'];
                            if ($st == 1) {
                                echo "<a href='subcription_active.php?id=$id&status=$st'><button type='button' class='px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100'>Active</button></a>";
                            } else {
                                echo "<a href='subcription_active.php?id=$id&status=$st'><button type='button' class='px-2 py-1 font-semibold  leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100'> Deactive</button></a>";
                            }
                            ?>
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