<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/utils/functions.php");
$role_name = $_SESSION['role_name'];
$absen = query("SELECT * FROM absen");

?>


<div class="relative overflow-x-auto sm:rounded-lg mt-10 p-10 rounded-2xl">
    <table class=" w-full mb-0 align-top text-sm text-left rounded-2xl border-gray-200 text-slate-500" id="pagination-table">
        <thead class="text-xxs uppercase text-slate-400 rounded-xl">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No.
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal
                </th>
                <th scope="col" class="px-6 py-3">
                    keterangan
                </th>
                <?php if ($role_name !== 'karyawan') : ?>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($absen)) : ?>
                <tr>
                    <td colspan="6" class="bg-white px-6 py-4 text-center text-[#0b1d45]">
                        Data kosong
                    </td>
                </tr>
            <?php else :
                $no = 1;
            ?>
                <?php foreach ($absen as $absent) : ?>
                    <tr class=" hover:bg-[#f5f5f5] border-b  text-[#0b1d45]">
                        <td class="px-6 py-4 font-bold">
                            <?= $no++ ?>
                        </td>
                        <td class="px-6 py-4 font-bold">
                            <?= $absent['nama'] ?>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-[#0b1d45] whitespace-nowrap">
                            <?= $absent['status'] ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $absent['tanggal'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $absent['keterangan'] == 0 ?  "Not solved" : "Solved" ?>
                        </td>
                        <?php if ($role_name !== 'karyawan') : ?>
                            <td class="px-6 py-4 flex justify-start items-center ">
                                <?php if ($absent['status'] == 0) : ?>
                                    <a href="#" onclick="confirmApprove('absen_approve', 'id', <?= $absent['id'] ?>)" class="font-medium text-[#0b1d45] hover:underline">
                                        <svg class="mr-4 w-4 h-4 md:w-5 md:h-5 text-gray-800 dark:text-[#0b1d45]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </a>
                                <?php endif ?>

                                <!-- <a class="font-medium text-[#0b1d45] hover:underline">
                                    <svg class="w-4 h-4 md:w-5 md:h-5 mr-4 text-gray-800 dark:text-[#0b1d45]" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
                                        <path d="M38.657 18.536l2.44-2.44c2.534-2.534 2.534-6.658 0-9.193-1.227-1.226-2.858-1.9-4.597-1.9s-3.371.675-4.597 1.901l-2.439 2.439L38.657 18.536zM27.343 11.464L9.274 29.533c-.385.385-.678.86-.848 1.375L5.076 41.029c-.179.538-.038 1.131.363 1.532C5.726 42.847 6.108 43 6.5 43c.158 0 .317-.025.472-.076l10.118-3.351c.517-.17.993-.463 1.378-.849l18.068-18.068L27.343 11.464z"></path>
                                    </svg>
                                </a> -->

                                <a href="#" onclick="confirmDelete('absen_delete', 'id',<?= $absent['id'] ?>)" class="font-medium text-[#0b1d45] hover:underline">
                                    <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-800 dark:text-[#0b1d45]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>
                                </a>
                            </td>
                        <?php endif ?>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>

<?php
if (isset($_POST['submit'])) {
    handleFormSubmit($_POST, 'users', 'add');
}

if (isset($_POST['update'])) {
    handleFormSubmit($_POST, 'users', 'update');
}
?>