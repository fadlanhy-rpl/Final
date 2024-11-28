<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/utils/functions.php");
$reports = query("SELECT reports.*, users.fullname as user_name FROM reports 
                    JOIN users ON reports.user_id = users.id ORDER BY created_at ASC");
header('refresh:3;Content-Type: text/html; charset=UTF-8');

?>

<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4 px-10 ">
    <!-- Main Content Cards (Left Side) -->
    <div class="col-span-3 grid grid-cols-1 gap-4 shadow-xl bg-white p-10 rounded-2xl">
        <!-- Card 1 -->
        <?php
        if (empty($reports)) : ?>
            <h1 class="font-bold text-3xl text-black">Data kosong</h1>
        <?php else : ?>
            <?php
            foreach ($reports as $report) :
                $report['content'] = html_entity_decode(html_entity_decode(strval($report['content'])));

            ?>
                <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-fit mb-4">
                    <a href="index.php?page=detail&id=<?= $report['id'] ?>" class="block h-full">
                        <div class="max-w-full border border-gray-200 rounded-lg shadow h-full flex flex-col">
                            <?php if ($report['thumbnail']): ?>
                                <img class="rounded-t-lg w-full h-48 object-cover" alt="<?= $report['thumbnail'] ?>" src="<?= "../assets/upload/" . $report['thumbnail'] ?>" />
                            <?php endif ?>
                            <div class="p-5 flex-grow flex flex-col">
                                <div class="flex items-center mb-4">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-600 truncate"><?= $report['user_name'] ?></p>
                                        <p class="text-xs text-gray-500 truncate dark:text-gray-400"><?= $report['created_at'] ?></p>
                                    </div>
                                </div>
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-600"><?= $report['title'] ?></h5>
                                <?= $report['content'] ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif ?>

    </div>

    <div class=" rounded-xl shadow h-fit flex flex-col justify-between col-span-1 md:col-span-1 hidden md:block">
    <div class="border-black/12.5 shadow-soft-xl relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
                    <h6>project overview</h6>
                    <p class="text-sm leading-normal">
                        <i class="fa fa-arrow-up text-lime-500"></i>
                        <span class="font-semibold">24%</span> this month
                    </p>
                </div>
                <div class="flex-auto p-4">
                    <div class="before:border-r-solid relative before:absolute before:top-0 before:left-4 before:h-full before:border-r-2 before:border-r-slate-100 before:content-[''] before:lg:-ml-px">
                        <div class="relative mb-4 mt-0 after:clear-both after:table after:content-['']">
                            <span class="w-6.5 h-6.5 text-base absolute left-4 z-10 inline-flex -translate-x-1/2 items-center justify-center rounded-full bg-white text-center font-semibold">
                                <i class="relative z-10 leading-none text-transparent fa fa-bell leading-pro bg-gradient-to-tl from-green-600 to-lime-400 bg-clip-text fill-transparent"></i>
                                
                            </span>
                            <div class="ml-11.252 pt-1.4 lg:max-w-120 relative -top-1.5 w-auto">
                                <h6 class="mb-0 text-sm font-semibold leading-normal text-slate-700">$2400, Design changes</h6>
                                <p class="mt-1 mb-0 text-xs font-semibold leading-tight text-slate-400">22 DEC 7:20 PM</p>
                            </div>
                        </div>
                        <div class="relative mb-4 after:clear-both after:table after:content-['']">
                            <span class="w-6.5 h-6.5 text-base absolute left-4 z-10 inline-flex -translate-x-1/2 items-center justify-center rounded-full bg-white text-center font-semibold">
                                <i class="relative z-10 leading-none text-transparent fa-brands fa-html5 leading-pro bg-gradient-to-tl from-red-600 to-rose-400 bg-clip-text fill-transparent"></i>
                            </span>
                            <div class="ml-11.252 pt-1.4 lg:max-w-120 relative -top-1.5 w-auto">
                                <h6 class="mb-0 text-sm font-semibold leading-normal text-slate-700">New order #1832412</h6>
                                <p class="mt-1 mb-0 text-xs font-semibold leading-tight text-slate-400">21 DEC 11 PM</p>
                            </div>
                        </div>
                        <div class="relative mb-4 after:clear-both after:table after:content-['']">
                            <span class="w-6.5 h-6.5 text-base absolute left-4 z-10 inline-flex -translate-x-1/2 items-center justify-center rounded-full bg-white text-center font-semibold">
                                <i class="relative z-10 leading-none text-transparent fa-solid fa-cart-shopping leading-pro bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text fill-transparent"></i>
                            </span>
                            <div class="ml-11.252 pt-1.4 lg:max-w-120 relative -top-1.5 w-auto">
                                <h6 class="mb-0 text-sm font-semibold leading-normal text-slate-700">Server payments for April</h6>
                                <p class="mt-1 mb-0 text-xs font-semibold leading-tight text-slate-400">21 DEC 9:34 PM</p>
                            </div>
                        </div>
                        <div class="relative mb-4 after:clear-both after:table after:content-['']">
                            <span class="w-6.5 h-6.5 text-base absolute left-4 z-10 inline-flex -translate-x-1/2 items-center justify-center rounded-full bg-white text-center font-semibold">
                                <i class="relative z-10 leading-none text-transparent fa-solid fa-credit-card leading-pro bg-gradient-to-tl from-red-500 to-yellow-400 bg-clip-text fill-transparent"></i>
                            </span>
                            <div class="ml-11.252 pt-1.4 lg:max-w-120 relative -top-1.5 w-auto">
                                <h6 class="mb-0 text-sm font-semibold leading-normal text-slate-700">New card added for order #4395133</h6>
                                <p class="mt-1 mb-0 text-xs font-semibold leading-tight text-slate-400">20 DEC 2:20 AM</p>
                            </div>
                        </div>
                        <div class="relative mb-4 after:clear-both after:table after:content-['']">
                            <span class="w-6.5 h-6.5 text-base absolute left-4 z-10 inline-flex -translate-x-1/2 items-center justify-center rounded-full bg-white text-center font-semibold">
                                <i class="relative z-10 leading-none text-transparent fa-solid fa-key leading-pro bg-gradient-to-tl from-purple-700 to-pink-500 bg-clip-text fill-transparent"></i>
                            </span>
                            <div class="ml-11.252 pt-1.4 lg:max-w-120 relative -top-1.5 w-auto">
                                <h6 class="mb-0 text-sm font-semibold leading-normal text-slate-700">Unlock packages for development</h6>
                                <p class="mt-1 mb-0 text-xs font-semibold leading-tight text-slate-400">18 DEC 4:54 AM</p>
                            </div>
                        </div>
                        <div class="relative mb-0 after:clear-both after:table after:content-['']">
                            <span class="w-6.5 h-6.5 text-base absolute left-4 z-10 inline-flex -translate-x-1/2 items-center justify-center rounded-full bg-white text-center font-semibold">
                                <i class="relative z-10 leading-none text-transparent fa fa-money-bill leading-pro bg-gradient-to-tl from-gray-900 to-slate-800 bg-clip-text fill-transparent"></i>
                            </span>
                            <div class="ml-11.252 pt-1.4 lg:max-w-120 relative -top-1.5 w-auto">
                                <h6 class="mb-0 text-sm font-semibold leading-normal text-slate-700">New order #9583120</h6>
                                <p class="mt-1 mb-0 text-xs font-semibold leading-tight text-slate-400">17 DEC</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>