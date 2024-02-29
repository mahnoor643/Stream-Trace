<?php
require "shared/config.php";
include "shared/header.php";
$id=$_SESSION['adminId'];
$select_admin_pass = "select * from admins where adminID='$id'";
$select_admin_pass_run = mysqli_query($conn, $select_admin_pass);
$fetchforpass = mysqli_fetch_array($select_admin_pass_run);
$pass = $fetchforpass['adminPwd'];
$email = $fetchforpass['adminEmail'];



?>


<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create account - Windmill Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="../assets/js/init-alpine.js"></script>
</head>

<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                <div class="w-full">
                    <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                        Change Password
                    </h1>



                    <form method="post">
                    <?php
                    if (isset($_POST['change'])) {
                        $oldpass = $_POST['old_pass'];
                        $newpass = $_POST['new_pass'];


                        if ($oldpass == $pass) {
                            $pass_change = "UPDATE admins set adminPwd='$newpass' WHERE adminID='$id'";
                            $pass_change_run = mysqli_query($conn, $pass_change);
                            $message = "your password is not changed yet";
                            $msg = "Your password is changed";
                            
                            if (!$pass_change_run) {
                                echo "<script type='text/javascript'>alert('$message');</script>";
                            } else {
                                echo "<script type='text/javascript'>alert('$msg');</script>";
                            }
                        }
                    }

                    ?>
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Current Password</span>
                            <input name="old_pass"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                type="text" />
                        </label>

                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                New Password
                            </span>
                            <input name="new_pass"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="***********" type="password" />
                        </label>


                        <button
                            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-red"
                             name="change" type="submit"> Change Password</button>

                    </form>
                   
                </div>
            </div>
</body>

</html>