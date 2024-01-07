<?php require_once APP_ROOT . "/Views/Components/head.php" ?>
<?php require_once APP_ROOT . "/Views/Components/admin-sidebar.php" ?>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main"
      style="background-color: rgb(243 244 246);">
    <div class="form-container flex justify-center items-center h-screen">
        <form method="post" action="save" enctype="multipart/form-data"
              class="bg-white w-full max-w-md p-8 rounded-xl shadow-xl">
            <div class="mb-4">
                <label for="categoryName" class="block text-gray-700 text-sm font-semibold mb-2">Category Name</label>
                <input id="categoryName" name="categoryName" type="text" placeholder="Enter the name of the category"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="categoryDescription" class="block text-gray-700 text-sm font-semibold mb-2">Category
                    Description</label>
                <input id="categoryDescription" name="categoryDescription" type="text"
                       placeholder="Enter the description of the category"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="categoryImage" class="block text-gray-700 text-sm font-semibold mb-2">Category Image</label>
                <input id="categoryImage" name="categoryImage" type="file"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                       required>
            </div>
            <p class="my-4 text-center text-red-700">
                <?= !(empty($data)) ? $data : "" ?>
            </p>
            <button name="postRequest"
                    class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                Add Category
            </button>
        </form>
    </div>
</main>