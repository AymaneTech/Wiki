<?php require_once APP_ROOT . "/Views/Components/head.php" ?>
<?php require_once APP_ROOT . "/Views/Components/admin-sidebar.php" ?>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main"
      style="background-color: rgb(243 244 246);">
    <?php require_once APP_ROOT . "/Views/Components/admin-header.php" ?>
    <div class="p-6">
        <div class="gap-6 mb-6">
            <div class="border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md" style="background-color: #fff;">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">Wikis</div>
                    <div class="add">
                        <a href="<?= APP_URL ?>categories/create"
                           class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 focus:outline-none">Create
                            category</a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[540px]" data-tab-for="order" data-page="active">
                        <thead>
                        <tr>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-100 text-left rounded-tl-md rounded-bl-md">
                                #
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-100 text-left rounded-tl-md rounded-bl-md">
                                Category Cover
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-100 text-left">
                                Category Name
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-100 text-left rounded-tr-md rounded-br-md">
                                Category Description
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-100 text-left rounded-tr-md rounded-br-md">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $category): ?>
                            <tr>
                                <td class="py-2 px-4 border-b border-b-gray-300">
                                <span class="text-[13px] font-medium text-gray-800">
                                    <?= $category->categoryId ?>
                                </span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-300">
                                    <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($category->categoryImage) ?>"
                                         alt="<?= $category->categoryName ?>"
                                         class="w-8 h-8 rounded object-cover block">
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-300">
                                    <a href="#"
                                       class="text-gray-900 text-sm font-medium hover:text-blue-500 ml-2 truncate">
                                        <?= $category->categoryName ?>
                                    </a>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-300">
                                <span class="text-[13px] font-medium text-gray-800">
                                    <?= $category->categoryDescription ?>
                                </span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-300">
                                    <div class="flex items-center gap-4">
                                        <i class='bx bxs-edit' style='color:#0c72cf'></i>
                                        <form action="<?= APP_URL ?>categories/delete" method="post">
                                            <input type="hidden" name="deleteId" value="<?= $category->categoryId ?>">
                                            <button type="submit">
                                                <i class='bx bxs-edit'></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>


<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="<?= APP_URL ?>/public/assets/js/dashboard.js"></script>
<script src="<?= APP_URL ?>/public/assets/js/main.js"></script>
</body>
</html>