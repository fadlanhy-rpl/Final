<!-- <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200"> -->
<!-- Navbar -->
<nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="true">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page"><?= ucwords($_GET['page']) ?></li>
            </ol>
            <!-- <h6 class="mb-0 font-bold capitalize">Dashboard</h6> -->
            <h6 class="mb-0 font-bold capitalize "><?= ucwords($_GET['page']) ?></h6>

        </nav>


        <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">



            <div class="flex items-center md:ml-auto md:pr-4">

            <?php

                if ($_SESSION['role_name'] === 'karyawan') :
                ?>
                    <a href="index.php?page=creates" type="button" class=" mr-3 group inline-flex items-center px-4 py-2 text-sm font-medium text-[#243757] bg-transparent border border-[#243757] rounded hover:bg-[#0b1d45] hover:text-white focus:z-10 focus:ring-2 ">
                        <svg class="w-4 h-4 mr-2 text-[#243757] group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Create absent
                    </a>

                <?php endif ?>

                <?php

                if ($_SESSION['role_name'] === 'karyawan') :
                ?>
                    <a href="index.php?page=create" type="button" class=" mr-3 group inline-flex items-center px-4 py-2 text-sm font-medium text-[#243757] bg-transparent border border-[#243757] rounded hover:bg-[#0b1d45] hover:text-white focus:z-10 focus:ring-2 ">
                        <svg class="w-4 h-4 mr-2 text-[#243757] group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Create Report
                    </a>

                <?php endif ?>
                <li class="relative flex item-center justify-center mr-2 ">

                    <!-- Notification icon -->
                    <button type="button" data-dropdown-toggle="notification-dropdown" class=" relative inline-flex [--placement:bottom-left] sm:[--trigger:hover] ">
                        <i class=" ti ti-bell-ringing text-xl mt-1 relative z-[1]"></i>
                        <div
                            class="absolute inline-flex items-center justify-center  text-white text-[11px] font-medium  bg-blue-600 w-2 h-2 rounded-full -top-[1px] -right-[6px]">
                        </div>
                    </button>

                    <!-- Notification Dropdown menu -->
                    <div class="hidden overflow-hidden z-50 my-4 w-80 text-base list-none bg-white divide-y divide-gray-100 shadow-lg dark:divide-gray-500 dark:bg-gray-100 rounded-xl" id="notification-dropdown">
                        <div>
                            <h3 class="text-gray-200 font-semibold text-base bg-[#0b1d45] px-6 py-3">Notification</h3>
                            <ul class="list-none  flex flex-col">
                                <li>
                                    <a href="#" class="py-3 px-6 block hover:bg-blue-500">
                                        <p class="text-sm text-gray-600 font-semibold">Roman Joined the Team!</p>
                                        <p class="text-xs text-gray-500 font-medium">Congratulate him</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-3 px-6 block hover:bg-blue-500">
                                        <p class="text-sm text-gray-600 font-semibold">New message received</p>
                                        <p class="text-xs text-gray-500 font-medium">Salma sent you new message</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-3 px-6 block hover:bg-blue-500">
                                        <p class="text-sm text-gray-600 font-semibold">New Payment received</p>
                                        <p class="text-xs text-gray-500 font-medium">Check your earnings</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-3 px-6 block hover:bg-blue-500">
                                        <p class="text-sm text-gray-600 font-semibold">Jolly completed tasks</p>
                                        <p class="text-xs text-gray-500 font-medium">Assign her new tasks</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="py-3 px-6 block hover:bg-blue-500">
                                        <p class="text-sm text-gray-600 font-semibold">Roman Joined the Team!</p>
                                        <p class="text-xs text-gray-500 font-medium">Congratulate him</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End of the Notification -->

                </li>
                <!-- the user profile -->
                <button type="button" class="flex mx-3 text-sm w-8 h-8 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-blue-200" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full object-cover" src="../assets/images/profile/user-1.jpg" alt="user photo" />
                </button>
            </div>
            <!-- Dropdown menu -->
            <div class="hidden z-50 my-4 w- text-base list-none bg-white divide-y divide-gray-100 shadow dark:divide-gray-500 dark:bg-gray-100 rounded-xl" id="dropdown">
                <div class="py-3 px-4">
                    <span class="block text-sm font-semibold text-gray-800"><?= $_SESSION['username'] ?></span>
                    <span class="block text-sm text-gray-800 truncate"><?= $_SESSION['username'] ?></span>
                </div>
                <ul class="py-1 text-gray-700" aria-labelledby="dropdown">
                    <li>
                        <a href="#" class="block py-2 px-4 text-sm hover:bg-blue-200">My profile</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-4 text-sm hover:bg-blue-200">Account settings</a>
                    </li>
                </ul>
                <ul class="py-1 text-gray-700" aria-labelledby="dropdown">
                    <li>
                        <a href="index.php?page=logout" class="block py-2 px-4 text-sm hover:bg-blue-200 rounded">Log out</a>
                    </li>
                </ul>
            </div>
            <!-- End of the user profile -->
        </div>
    </div>
    </div>
</nav>


<!-- end Navbar -->