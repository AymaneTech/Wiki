<?php
component("head");
component("admin-sidebar");
component("admin-header")
?>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main"
      style="background-color: rgb(243 244 246);">
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
                                    <img src="<?= STORAGE_PATH . $category->categoryImage?>"
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
                                        <form action="<?= APP_URL ?>categories/edit" method="post">
                                            <input type="hidden" name="editId" value="<?= $category->categoryId ?>">
                                            <button type="submit" style="background-color: var(--color-primary); fill: var(--color-on-primary);">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                </svg>
                                            </button>
                                        </form>
                                        <form action="<?= APP_URL ?>categories/delete" method="post">
                                            <input type="hidden" name="deleteId" value="<?= $category->categoryId ?>">
                                            <button type="submit" style="background-color: var(--color-error); fill: var(--color-on-error);">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
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