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
                    <th class="px-4 py-3">Message</th>

                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <?php



            $query_c = "SELECT * from contactus c join users u on u.userID=c.userID";
            $query_c_run = mysqli_query($conn, $query_c);
            while ($row_c = mysqli_fetch_array($query_c_run)) {


                ?>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full"
                                        src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                        alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div>
                                    <p class="font-semibold">
                                        <?php echo $row_c['Msg'] ?>
                                    </p>

                                </div>
                            </div>
                        </td>





                        <td class="px-4 py-3">

                            <div class="flex items-center space-x-4 text-sm">
                                <!-- delelete -->
                                <?php

                                $sql = "select * from contactus";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {


                                    ?>
                                    <a href="delete.php?id=<?php echo $row['contactID'] ?>" <?php
                                }
                                ?>
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>



                            </div>

                        </td>

                    </tr>
                    <?php
            }
            ?>
            </tbody>
        </table>

    </div>
</div>
</div>
</main>
</div>
</div>
</body>

</html>