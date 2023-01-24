<?php
require_once 'CRUDS/add.php';
require_once 'CRUDS/delete.php';
require_once 'CRUDS/read.php';
require_once 'CRUDS/update.php';

if (!isset($_SESSION['Admin'])) {
    header('location: signin');
}
// if(isset($_SESSION['Success'])){
//     var_dump($_SESSION['Success']);
//     die;
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LYRICSONGS</title>

    <!-- ================================ -->
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet" />
    <!--Replace with your tailwind.css once created-->
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet" />
    <!-- ================================ -->
    <!-- Begin Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- End Tailwind -->
    <!-- ================================ -->
    <!-- Begin Flowbite css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.1/flowbite.min.css" rel="stylesheet" />
    <!-- End Flowbite css -->
    <!-- ================================ -->
    <!-- Begin fontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- End fontAwesome -->
    <!-- ================================ -->
    <!-- BEGIN parsley css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/doc/assets/docs.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/src/parsley.css">
    <!-- END parsley css-->
    <!-- ================================ -->
    <!-- Begin style css -->
    <link rel="stylesheet" href="public/assets/css/style.css" />
    <!-- End style css -->
    <!-- ================================ -->

</head>

<body class="dark:text-white dark:bg-gray-900">
    <!-- BAGIN SAIDBAR -->
    <aside class="fixed top-0 left-0 w-64 h-full hidden lg:block lg:w-2/12 z-50" aria-label="Sidenav" id="mobile-menu">
        <div class="overflow-y-auto py-20 px-3 h-full bg-white border-gray-200 dark:bg-gray-800">
            <ul class="space-y-2">
                <li>
                    <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
                        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Pages</span>
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-pages" class="hidden py-2 space-y-2">
                        <li>
                            <a href="home" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Home</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Settings</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
    <!-- END SAIDBAR -->

    <!-- ============================ -->
    <!--BAGIN CONTENT -->
    <section class="fixed right-0 lg:w-10/12 w-full z-10 h-screen overflow-y-auto">
        <!-- BEGIN NAVBAR -->
        <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-gray-800 dark:border-white">
            <div class="container flex flex-wrap items-center justify-between">
                <a href="#" class="flex items-center">
                    <img src="public/assets/imgs/logo/lyrics_song.png" class="h-16 sm:h-16 mr-3" alt="Lyrics Songs" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">DASHBOARD</span>
                </a>
                <div class="flex items-center md:order-2">
                    <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full" src="<?php echo $_SESSION['Admin']['picture'] ?>" alt="admin photo" />
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900 dark:text-white"><?php echo $_SESSION['Admin']['firstName'] . ' ' . $_SESSION['Admin']['lastName'] ?></span>
                            <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400"><?php echo $_SESSION['Admin']['email'] ?></span>
                        </div>
                        <ul class="py-1" aria-labelledby="user-menu-button">
                            <li>
                                <a href="dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="Views/LOGIN/sign_out.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                    out</a>
                            </li>
                        </ul>
                    </div>
                    <button data-collapse-toggle="mobile-menu" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->

        <!-- BEGIN Statistic cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-3 xl:grid-cols-5 dark:bg-gray-900 p-5 sm:p-10">
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
                <div class="p-4 flex items-center">
                    <div class="p-3 rounded-full text-orange-500 dark:text-orange-100 bg-orange-100 dark:bg-orange-500 mr-4">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Total clients
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            <?php

                            echo $count_admins;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
                <div class="p-4 flex items-center">
                    <div class="p-3 rounded-full text-green-500 dark:text-green-100 bg-green-100 dark:bg-green-500 mr-4">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Artists
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            <?php
                            echo $count_artists;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
                <div class="p-4 flex items-center">
                    <div class="p-3 rounded-full text-blue-500 dark:text-blue-100 bg-blue-100 dark:bg-blue-500 mr-4">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Songs
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            <?php
                            echo $count_songs;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
                <div class="p-4 flex items-center">
                    <div class="p-3 rounded-full text-teal-500 dark:text-teal-100 bg-teal-100 dark:bg-teal-500 mr-4">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Categores
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            <?php
                            echo $count_categories;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800">
                <div class="p-4 flex items-center">
                    <div class="p-3 rounded-full text-teal-500 dark:text-teal-100 bg-teal-100 dark:bg-teal-500 mr-4">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Albums
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            <?php
                            echo $count_albums;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Statistic cards -->

        <!-- BEGIN alert Failed -->
        <?php if(isset($_SESSION['Failed'])): ?>
        <div id="alert-border-2"
                    class="flex p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800"
                    role="alert">
                    <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div class="ml-3 text-sm font-medium">
                        <?php
                        echo $_SESSION['Failed'];
                        unset($_SESSION['Failed']);
                        ?>
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-300 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-border-2" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
        </div>
        <?php endif ?>
        <!-- END alert Failed -->
        <!-- BEGIN alert Failed -->
        <?php if(isset($_SESSION['Success'])): ?>
        <div id="alert-border-3" class="mx-5 md:mx-10 flex p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
            <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-sm font-medium">
              <?php 
              echo $_SESSION['Success'];
              unset($_SESSION['Success']);
              ?>
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-300 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
              <span class="sr-only">Dismiss</span>
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <?php endif ?>
        <!-- END alert Failed -->

        <!-- BEGIN DATATABLE -->
        <section class="p-5 sm:p-10">
            <!-- ADMINS -->
            <div>
                <div class="lg:text-end lg:block grid">
                    <div>
                        <h1 class="mb-4 text-4xl font-extrabold text-gray-900 md:text-4xl lg:text-5xl dark:text-white text-center md:text-start">
                            ADMINS
                        </h1>
                        <hr class="w-48 h-1 my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-orange-500 m-auto md:m-0" />
                    </div>
                </div>
                <!--B DATATABLE -->
                <div id="recipients" class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                    <table id="example1" class="stripe hover" style="width: 100%; padding-top: 1em; padding-bottom: 1em">
                        <thead>
                            <tr class="uppercase">
                                <th data-priority="1">id</th>
                                <th data-priority="2">name</th>
                                <th data-priority="3">email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $idA = 1;
                            foreach ($data_ad as $admin) {
                                echo '
                                <tr>
                                    <td>' . $idA . '</td>
                                    <td class="md:flex items-center">
                                        <img class="w-12 h-12 rounded-full" src="' . $admin['picture'] . '" alt="#"> <span class="ml-2" truncate>' . $admin['firstName'] . ' ' . $admin['lastName'] . '</span>
                                    </td>
                                <td>' . $admin['email'] . '</td>
                            </tr>';
                                $idA++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!--E DATATABLE -->
            </div>
            <!-- ARTISTS -->
            <div class="mt-10">
                <div class="lg:text-end lg:block grid">
                    <div>
                        <h1 class="mb-4 text-4xl font-extrabold text-gray-900 md:text-4xl lg:text-5xl dark:text-white text-center md:text-start">
                            ARTISTS
                        </h1>
                        <hr class="w-48 h-1 my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-orange-500 m-auto md:m-0" />
                    </div>
                    <button type="button" data-modal-toggle="defaultModal1" id="btn_artist_add" class="add_show_modal text-center text-white bg-gradient-to-r from-orange-500 via-orange-600 to-orange-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-orange-300 dark:focus:ring-orange-800 shadow-lg shadow-orange-500/50 dark:shadow-lg dark:shadow-orange-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        ADD ARTISTS
                    </button>
                </div>
                <!--B DATATABLE -->
                <div id="recipients" class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                    <table id="example2" class="stripe hover" style="width: 100%; padding-top: 1em; padding-bottom: 1em">
                        <thead>
                            <tr class="uppercase">
                                <th data-priority="1">id</th>
                                <th data-priority="2">name</th>
                                <th data-priority="3">date birthday</th>
                                <th data-priority="4">actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $idA = 1;
                            foreach ($data_artists as $item) {
                                echo '<input type="hidden" value="' . $item['id'] . '">
                                    <tr id="' . $item['id'] . '">
                                    <td>
                                        ' . $idA . '
                                    </td>
                                    <td class="md:flex items-center">
                                        <img class="w-12 h-12 rounded-full" src="' . $item['picture'] . '" alt="artist"> <span class="ml-2 text-ellipsis overflow-hidden">' . $item['name'] . '</span>
                                    </td>
                                    <td> ' . $item['date_birthday'] . ' </td>
                                    <td>
                                        <button type="button" data-modal-toggle="defaultModal1" id="btn_edit_artists" 
                                        onclick="icon_btn_edit_artists(\'' . $item['id'] . '\',\'' . $item['name'] . '\',\'' . $item['date_birthday'] . '\')"
                                            class="edit_show_modal text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i
                                                class="fa-solid fa-pen-to-square"></i></button>
                                        <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" onclick=deleteArtist(\'' . $item['id'] . '\');
                                            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>';
                                $idA++;
                            }
                            ?>


                        </tbody>
                    </table>
                </div>
                <!--E DATATABLE -->
            </div>
            <!-- SONGS -->
            <div class="mt-10">
                <div class="lg:text-end lg:block grid">
                    <div>
                        <h1 class="mb-4 text-4xl font-extrabold text-gray-900 md:text-4xl lg:text-5xl dark:text-white text-center md:text-start">
                            SONGS
                        </h1>
                        <hr class="w-48 h-1 my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-orange-500 m-auto md:m-0" />
                    </div>
                    <button type="button" data-modal-toggle="defaultModal2" id="btn_song_add" class="add_show_modal text-center text-white bg-gradient-to-r from-orange-500 via-orange-600 to-orange-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-orange-300 dark:focus:ring-orange-800 shadow-lg shadow-orange-500/50 dark:shadow-lg dark:shadow-orange-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        ADD SONGS
                    </button>
                </div>
                <!--B DATATABLE -->
                <div id="recipients" class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                    <table id="example3" class="stripe hover" style="width: 100%; padding-top: 1em; padding-bottom: 1em">
                        <thead>
                            <tr class="uppercase">
                                <th data-priority="1">id</th>
                                <th data-priority="2">name</th>
                                <th data-priority="3">release date</th>
                                <th data-priority="4">lyrics</th>
                                <th data-priority="5">Artist</th>
                                <th data-priority="6">Album</th>
                                <th data-priority="7">cat</th>
                                <th data-priority="8">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $idS = 1;
                            foreach ($data_songs as $item) {
                                echo '
                                <tr>
                                    <td>
                                        ' . $idS . '
                                    </td>
                                    <td class="md:flex items-center">
                                        <img class="w-12 h-12 rounded-full" src="' . $item['picture'] . '" alt="#"> <span class="ml-2">' . $item['name'] . '</span>
                                    </td>
                                    <td>' . $item['release_date'] . '</td>
                                    <td>. . .</td>
                                    <td>' . $item['name_artist'] . '</td>
                                    <td>' . $item['name_album'] . '</td>
                                    <td>' . $item['name_categorie'] . '</td>
                                    <td>
                                        <a href="profilesong?song=' . $item['id'] . '"
                                        class="text-white bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-orange-300 dark:focus:ring-orange-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                        <i class="fa-solid fa-eye"></i>
                                        </a>
                                        
                                        <button type="button" data-modal-toggle="defaultModal2" id="btn_edit_songs" 
                                        onclick="icon_btn_edit_songs(\'' . $item['id'] . '\',\'' . $item['name'] . '\',\'' . $item['release_date'] . '\',\'' . $item['lyrics'] . '\',\'' . $item['id_artist'] . '\',\'' . $item['id_cat'] . '\',\'' . $item['id_album'] . '\')"
                                        class="edit_show_modal text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i
                                        class="fa-solid fa-pen-to-square"></i></button>

                                        <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" onclick=deleteSong(\'' . $item['id'] . '\');
                                        class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i
                                        class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>';
                                $idS++;
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <!--E DATATABLE -->
            </div>
            <!-- categories -->
            <div class="my-10">
                <div class="lg:text-end lg:block grid">
                    <div>
                        <h1 class="mb-4 text-4xl font-extrabold text-gray-900 md:text-4xl lg:text-5xl dark:text-white text-center md:text-start">
                            CATEGORIES
                        </h1>
                        <hr class="w-48 h-1 my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-orange-500 m-auto md:m-0" />
                    </div>
                    <button type="button" data-modal-toggle="defaultModal3" id="btn_categorie_add" class="add_show_modal text-center text-white bg-gradient-to-r from-orange-500 via-orange-600 to-orange-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-orange-300 dark:focus:ring-orange-800 shadow-lg shadow-orange-500/50 dark:shadow-lg dark:shadow-orange-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        ADD CATEGORIES
                    </button>
                </div>
                <!--B DATATABLE -->
                <div id="recipients" class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                    <table id="example4" class="stripe hover" style="width: 100%; padding-top: 1em; padding-bottom: 1em">
                        <thead>
                            <tr class="uppercase">
                                <th data-priority="1">id</th>
                                <th data-priority="2">categorie</th>
                                <th data-priority="3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $idC = 1;
                            foreach ($data_categories as $item) {
                                echo '
                                <tr>
                                    <td>' . $idC . '</td>
                                    <td>' . $item['name'] . '</td>
                                    <td>
                                        <button type="button" data-modal-toggle="defaultModal3" id="btn_edit_categories" onclick="icon_btn_edit_categories(\'' . $item['id'] . '\',\'' . $item['name'] . '\')"
                                            class="edit_show_modal text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i
                                                class="fa-solid fa-pen-to-square"></i></button>
                                        <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" onclick=deleteCategorie(\'' . $item['id'] . '\');
                                            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i
                                            class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>';
                                $idC++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!--E DATATABLE -->
            </div>
            <!-- albums -->
            <div class="my-10">
                <div class="lg:text-end lg:block grid">
                    <div>
                        <h1 class="mb-4 text-4xl font-extrabold text-gray-900 md:text-4xl lg:text-5xl dark:text-white text-center md:text-start">
                            ALBUMS
                        </h1>
                        <hr class="w-48 h-1 my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-orange-500 m-auto md:m-0" />
                    </div>
                    <button type="button" data-modal-toggle="defaultModal4" id="btn_albums_add" class="add_show_modal text-center text-white bg-gradient-to-r from-orange-500 via-orange-600 to-orange-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-orange-300 dark:focus:ring-orange-800 shadow-lg shadow-orange-500/50 dark:shadow-lg dark:shadow-orange-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        ADD ALBUMS
                    </button>
                </div>
                <!--B DATATABLE -->
                <div id="recipients" class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                    <table id="example4" class="stripe hover" style="width: 100%; padding-top: 1em; padding-bottom: 1em">
                        <thead>
                            <tr class="uppercase">
                                <th data-priority="1">id</th>
                                <th data-priority="2">albums</th>
                                <th data-priority="3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $idAlbum = 1;
                            foreach ($data_albums as $item) {
                                echo '
                                <tr>
                                    <td>' . $idAlbum . '</td>
                                    <td>' . $item['name'] . '</td>
                                    <td>
                                        <button type="button" data-modal-toggle="defaultModal4" id="btn_edit_albums" onclick="icon_btn_edit_albums(\'' . $item['id'] . '\',\'' . $item['name'] . '\')"
                                            class="edit_show_modal text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i
                                            class="fa-solid fa-pen-to-square"></i></button>
                                        <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" onclick="deleteAlbum(\'' . $item['id'] . '\')"
                                            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i
                                            class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>';
                                $idAlbum++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!--E DATATABLE -->
            </div>
        </section>
        <!-- END DATATABLE -->
    </section>
    <!--END CONTENT -->



    <!-- BEGIN Main modal artists -->
    <div id="defaultModal1" tabindex="-1" data-modal-backdrop="static" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5 overflow-auto h-screen">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Add
                    </h3>
                    <button type="button" class="close text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal1">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="" method="post" name="form_artists" enctype="multipart/form-data" data-parsley-validate>
                    <div class="nodes_artist grid gap-4 mb-4 sm:grid-cols-2">
                        <input type="text" name="id" hidden>
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input name="name[]" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="name" required="">
                        </div>
                        <div>
                            <label for="picture" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Picture(Optional)</label>
                            <input name="picture[]" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" accept=".jpg,.jpeg,.png">
                        </div>
                        <div>
                            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Birthday</label>
                            <input name="birthday_date[]" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="date birthday" required>
                        </div>
                        <hr class="col-span-2 h-1 my-4 bg-gray-100 border-0 rounded dark:bg-orange-500 px-6">
                    </div>
                    <div class="div_artists">

                    </div>
                    <!-- btns -->
                    <div class="flex gap-3">
                        <button type="button" id="add_artist" name="add_artist" class="text-white inline-flex items-center bg-orange-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                            <i class="fa-solid fa-plus mr-2"></i>
                            Add
                        </button>
                        <button type="submit" id="save_artist" name="save_artist" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i class="fa-solid fa-paper-plane mr-2"></i>
                            Save
                        </button>
                        <button type="submit" id="update_artist" name="update_artist" class="text-white inline-flex items-center bg-orange-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                            <i class="fa-solid fa-pen-to-square mr-2"></i>
                            Update
                        </button>
                        <button data-modal-toggle="defaultModal1" type="button" class="close text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Main modal artists-->
    <!-- BEGIN Main modal songs -->
    <div id="defaultModal2" tabindex="-1" data-modal-backdrop="static" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5 overflow-auto h-screen">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Add
                    </h3>
                    <button type="button" class="close text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal2">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="" method="post" name="form_songs" enctype="multipart/form-data" data-parsley-validate>

                    <div class="nodes_song grid gap-4 mb-4 sm:grid-cols-2">
                        <input type="text" name="id" hidden>
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input name="name[]" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="name" required>
                        </div>
                        <div>
                            <label for="picture" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Picture(Optional)</label>
                            <input name="picture[]" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" accept=".jpg,.jpeg,.png">
                        </div>
                        <div>
                            <label for="categorie" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categorie</label>
                            <select name="categorie[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                <option selected disabled>Select categories</option>
                                <?php
                                foreach ($data_categories as $categorie) {
                                    echo '<option value="' . $categorie['id'] . '">' . $categorie['name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="artist" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Artist</label>
                            <select name="artist[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                <option selected disabled>Select artists</option>
                                <?php
                                foreach ($data_artists as $artist) {
                                    echo '<option value="' . $artist['id'] . '">' . $artist['name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="album" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Album</label>
                            <select name="album[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                <option selected disabled>Select albums</option>
                                <?php
                                foreach ($data_albums as $album) {
                                    echo '<option value="' . $album['id'] . '">' . $album['name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Release Date</label>
                            <input name="release_date[]" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="date release" required>
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lyrics</label>
                            <textarea id="description" name="lyrics[]" rows="10" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write Lyrics here!" required></textarea>
                        </div>
                        <hr class="col-span-2 h-1 my-4 bg-gray-100 border-0 rounded dark:bg-orange-500 px-6">
                    </div>
                    
                    <div class="div_songs">
                        
                    </div>
                    <!-- btns -->
                    <div class="flex gap-3">
                        <button type="button" id="add_song" name="add_song" class="text-white inline-flex items-center bg-orange-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                            <i class="fa-solid fa-plus mr-2"></i>
                            Add
                        </button>
                        <button type="submit" id="save_song" name="save_song" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i class="fa-solid fa-paper-plane mr-2"></i>
                            Save
                        </button>
                        <button type="submit" id="update_song" name="update_song" class="text-white inline-flex items-center bg-orange-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                            <i class="fa-solid fa-pen-to-square mr-2"></i>
                            Update
                        </button>
                        <button data-modal-toggle="defaultModal2" type="button" class="close text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- END Main modal Song-->
    <!-- BEGIN Main modal categories -->
    <div id="defaultModal3" tabindex="-1" data-modal-backdrop="static" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5 overflow-auto h-screen">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Add
                    </h3>
                    <button type="button" class="close text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal3">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="" method="post" name="form_categories" enctype="multipart/form-data" data-parsley-validate>
                    <div class="nodes_categorie grid gap-4 mb-4 sm:grid-cols-1" id="inputs_form_id">
                        <input type="text" name="id" hidden>
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input name="name[]" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="name" required="">
                        </div>
                        <hr class="col-span-2 h-1 my-4 bg-gray-100 border-0 rounded dark:bg-orange-500 px-6">
                    </div>

                    <div class="div_categories">

                        <!-- Duplcate here!!!! -->
                    </div>
                    <!-- btns -->
                    <div class="flex gap-3">
                        <button type="button" id="add_categorie" name="add_categorie" class="text-white inline-flex items-center bg-orange-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                            <i class="fa-solid fa-plus mr-2"></i>
                            Add
                        </button>
                        <button type="submit" id="save_categorie" name="save_categorie" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i class="fa-solid fa-paper-plane mr-2"></i>
                            Save
                        </button>
                        <button type="submit" id="update_categorie" name="update_categorie" class="text-white inline-flex items-center bg-orange-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                            <i class="fa-solid fa-pen-to-square mr-2"></i>
                            Update
                        </button>
                        <button data-modal-toggle="defaultModal3" type="button" class="close text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Main modal categories-->
    <!-- BEGIN Main modal albums -->
    <div id="defaultModal4" tabindex="-1" data-modal-backdrop="static" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5 overflow-auto h-screen">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Add
                    </h3>
                    <button type="button" class="close text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal4">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="" method="post" name="form_albums" enctype="multipart/form-data" data-parsley-validate>
                    <div class="nodes_album grid gap-4 mb-4 sm:grid-cols-1" id="inputs_form_id">
                        <input type="text" name="id" hidden>
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input name="name[]" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="name" required="">
                        </div>
                        <hr class="col-span-2 h-1 my-4 bg-gray-100 border-0 rounded dark:bg-orange-500 px-6">
                    </div>

                    <div class="div_albums">

                        <!-- Duplcate here!!!! -->
                    </div>
                    <!-- btns -->
                    <div class="flex gap-3">
                        <button type="button" id="add_album" name="add_album" class="text-white inline-flex items-center bg-orange-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                            <i class="fa-solid fa-plus mr-2"></i>
                            Add
                        </button>
                        <button type="submit" id="save_album" name="save_album" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i class="fa-solid fa-paper-plane mr-2"></i>
                            Save
                        </button>
                        <button type="submit" id="update_album" name="update_album" class="text-white inline-flex items-center bg-orange-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                            <i class="fa-solid fa-pen-to-square mr-2"></i>
                            Update
                        </button>
                        <button data-modal-toggle="defaultModal4" type="button" class="close text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- END Main modal albums-->


    <!-- BEGIN Modal delete -->
    <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <form method="post" name="form_delete">
                    <div class="p-6 text-center">
                        <input type="text" name="id" hidden>
                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this item?</h3>
                        <button data-modal-hide="popup-modal" id="alert_delete" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- END Modal delete -->


    <!-- ================================== -->
    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- ================================ -->
    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <!-- ================================ -->
    <!-- Begin flowbite js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.1/flowbite.min.js"></script>
    <!-- End flowbite js -->
    <!-- ================================ -->
    <!-- ================================ -->
    <!-- BEGIN parsley js -->
    <script src="public\assets\js\parsley.min.js"></script>
    <!-- END parsley js-->
    <!-- ================================ -->
    <!-- Begin file js -->
    <script src="public/assets/js/script.js"></script>
    <!-- End file js -->
</body>

</html>