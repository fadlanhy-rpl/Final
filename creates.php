<div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-4">
    <div class="border-2 col-span-1 md:col-span-4 border-dashed bg-[#F4F4FE] rounded-lg border-gray-300 dark:border-gray-600 h-auto mb-4">
        <form class="py-5 px-6" method="post" enctype="multipart/form-data">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base/7 font-semibold text-gray-900">Absent</h2>
                    <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="nama" class="block text-sm font-medium text-gray-900">Nama</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-[#A1A8B8] focus-within:ring-2 focus-within:ring-inset focus-within:ring-[#243757] w-full">
                                    <input type="text" name="nama" id="nama" class="ml-4 block w-full border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm" placeholder="janesmith">
                                </div>
                            </div>
                        </div>

                        <div class="col-span-1 ">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-600">Status</label>
                            <select name="status" class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option selected disabled>Status</option>
                                    <option value="Ijin">
                                        Ijin
                                    </option>
                                    <option value="Hadir">
                                        Hadir
                                    </option>
                            </select>
                        </div>

                        <div class="col-span-full">
                            <label for="keterangan" class="block text-sm/6 font-medium text-gray-900">keterangan</label>
                            <div class="mt-2">
                                <textarea id="keterangan" name="keterangan" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6 p-4"></textarea>
                            </div>
                            <p class="mt-3 text-sm/6 text-gray-600">Write down the information if you are absent or absent, and if present then fill in the -</p>
                        </div>

                        <div class="col-span-full">
                            <label for="thumbnail" class="block text-sm/6 font-medium text-gray-900">Thumbnail</label>
                            <input id="thumbnail" name="thumbnail" type="file" accept="image/png, image/jpeg, image/jpg">
                        </div>

                    </div>
                </div>

            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm/6 font-semibold text-gray-900" onclick="window.history.back()">Cancel</button>
                <button name="submit" type="submit" class="rounded-md bg-[#243757] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#0b1d45] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
            </div>
        </form>



    </div>



</div>


<?php
if (isset($_POST['submit'])) {
    handleFormSubmit($_POST, 'absen', 'add');
}

?>