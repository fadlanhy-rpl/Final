<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/utils/functions.php");

$users = query("SELECT users.id, users.username, users.email, users.fullname, users.role_id, roles.name as role_name
    FROM users 
    JOIN roles ON users.role_id = roles.id");

$roles = query("SELECT * FROM roles");

?>


<div class="relative overflow-x-auto sm:rounded-xl px-10">
    <div class="pb-4 flex justify-end">
        <!-- Modal toggle -->
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-[#243757] bg-[#e4e4e5] hover:bg-[#d5d5d8] focus:ring-4 focus:outline-none focus:ring-[#d5d5d8] font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
            Add user
        </button>

        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-lg font-semibold text-gray-600 ">
                            User Data
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" method="post">
                        <div class="grid gap-4 mb-4 grid-cols-4">
                            <div class="col-span-2">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-600">Email</label>
                                <input type="text" name="email" class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="1294012094712">
                            </div>
                            <div class="col-span-2">
                                <label for="username" class="block mb-2 text-sm font-medium text-gray-600">Username</label>
                                <input type="text" name="username" class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="johndoe">
                            </div>
                            <div class="col-span-2">
                                <label for="fullname" class="block mb-2 text-sm font-medium text-gray-600">Fullname</label>
                                <input type="text" name="fullname" class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="John Doe">
                            </div>

                            <div class="col-span-1 ">
                                <label for="role_id" class="block mb-2 text-sm font-medium text-gray-600">Role</label>
                                <select name="role_id" class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option selected disabled>Select Role</option>
                                    <?php foreach ($roles as $role) : ?>
                                        <option value=<?= $role['id'] ?>>
                                            <?= ucwords($role['name']) ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-600">Password</label>
                                <input minlength="1" type="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="**************">
                            </div>
                            <div class="col-span-2">
                                <label for="password_confirm" class="block mb-2 text-sm font-medium text-gray-600">Password Confirmation</label>
                                <input minlength="1" type="password" name="password_confirm" class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="**************">
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button name="submit" type="submit" class="text-white inline-flex items-center bg-[#243757] hover:bg-[#0b1d45] focus:ring-4 focus:outline-none focus:ring-[#243757] font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                                <svg class="me-1 -ms-1 w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
                                </svg>
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500" id="pagination-table">
        <thead class="text-xxs uppercase text-slate-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No.
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Fullname
                </th>
                <th scope="col" class="px-6 py-3">
                    Role
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($users)) : ?>
                <tr>
                    <td colspan="6" class="bg-[#243757] px-6 py-4 text-center text-white">
                        Data kosong
                    </td>
                </tr>
            <?php else :
                $no = 1;
            ?>
                <?php foreach ($users as $user) : ?>
                    <tr class=" hover:bg-[#f5f5f5] border-b  text-[#0b1d45]">
                        <td class="px-6 py-4 font-bold">
                            <?= $no++ ?>
                        </td>
                        <td class="px-6 py-4 font-bold">
                            <?= $user['email'] ?>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-[#0b1d45] whitespace-nowrap">
                            <?= $user['fullname'] ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $user['role_name'] ?>
                        </td>
                        <td class="px-6 py-4 flex justify-start items-center ">
                            <a data-modal-target="edit-modal-<?= $user['id'] ?>" data-modal-toggle="edit-modal-<?= $user['id'] ?>" href="#" class="font-medium text-[#243757] hover:underline mr-2">
                                <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-800 dark:text-[#243757]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                </svg>
                            </a>
                            <div id="edit-modal-<?= $user['id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                            <h3 class="text-lg font-semibold text-gray-600 ">
                                                Edit User
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-modal-<?= $user['id'] ?>">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form class="p-4 md:p-5" method="post">
                                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                            <div class="grid gap-4 mb-4 grid-cols-4">
                                                <div class="col-span-2">
                                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-600">Email</label>
                                                    <input type="text" value="<?= $user['email'] ?>" readonly name="email" class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="1294012094712">
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="username" class="block mb-2 text-sm font-medium text-gray-600">Username</label>
                                                    <input type="text" value="<?= $user['username'] ?>" name="username" class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="johndoe">
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="fullname" class="block mb-2 text-sm font-medium text-gray-600">Fullname</label>
                                                    <input type="text" value="<?= $user['fullname'] ?>" name="fullname" class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="John Doe">
                                                </div>
                                                <div class="col-span-1 ">
                                                    <label for="role_id" class="block mb-2 text-sm font-medium text-gray-600">Role</label>
                                                    <select name="role_id" class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                        <option selected disabled>Select Role</option>
                                                        <?php foreach ($roles as $role) : ?>
                                                            <option value="<?= $role['id'] ?>" <?= $role['id'] == $user['role_id'] ? 'selected' : '' ?>>
                                                                <?= ucwords($role['name']) ?>
                                                            </option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="col-span-1">
                                                    <label for="old_password" class="block mb-2 text-sm font-medium text-gray-600">Old Password</label>
                                                    <input minlength="8" type="password" name="old_password" class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="**************">
                                                </div>
                                                <div class="col-span-1">
                                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-600">Password</label>
                                                    <input minlength="8" type="password" name="password" class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="**************">
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="password_confirm" class="block mb-2 text-sm font-medium text-gray-600">Password Confirmation</label>
                                                    <input minlength="8" type="password" name="password_confirm" class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="**************">
                                                </div>
                                            </div>
                                            <div class="flex justify-end">
                                                <button name="update" type="submit" class="text-white inline-flex items-center bg-[#243757] hover:bg-[#0b1d45] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="me-1 -ms-1 w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
                                                    </svg>
                                                    Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <a href="#" onclick="confirmDelete('users_delete', 'user_id',<?= $user['id'] ?>)" class="font-medium text-white hover:underline">
                                <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-800 dark:text-[#243757]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                </svg>
                            </a>

                        </td>
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