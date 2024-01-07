<?php require_once APP_ROOT . "/Views/Components/head.php" ?>
<?php require_once APP_ROOT . "/Views/Components/admin-sidebar.php" ?>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main"
      style="background-color: rgb(243 244 246);">
    <?php require_once APP_ROOT . "/Views/Components/admin-header.php" ?>
    <div class="p-6">
        <div class="gap-6 mb-6">
            <div class="border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md" style="background-color: #fff;">
                <div class="flex flex-col gap-4 mb-4 items-start">
                    <div class="font-medium">Add New tags:</div>
                    <div class="add">
                        <form class="flex gap-16" action="<?= APP_URL ?>tags/create" method="post">
                            <div class="w-72">
                                <div class="relative w-full min-w-[200px] h-10">
                                    <input name="tagName"
                                           class="peer w-full h-full bg-white text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-2.5 rounded-[7px] border-blue-gray-200 focus:border-gray-900 shadow-md"
                                           placeholder=" "/>
                                    <label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[' '] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[' '] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[3.75] text-gray-500 peer-focus:text-gray-900 before:border-blue-gray-200 peer-focus:before:!border-gray-900 after:border-blue-gray-200 peer-focus:after:!border-gray-900">Tag
                                        Name</label>
                                </div>
                            </div>
                            <button name="postRequest"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 focus:outline-none">
                                Add new Tag
                            </button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        <div class="gap-6 mb-6">
            <div class="border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md" style="background-color: #fff;">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">Wikis</div>
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
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-100 text-left rounded-tl-md rounded-bl-md">
                                used
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-100 text-left rounded-tr-md rounded-br-md">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $tag): ?>
                            <tr>
                                <td class="py-2 px-4 border-b border-b-gray-300">
                                <span class="text-[13px] font-medium text-gray-800">
                                    <?= $tag->tagId ?>
                                </span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-300">
                                    <a href="#"
                                       class="text-gray-900 text-sm font-medium hover:text-blue-500 ml-2 truncate">
                                        <?= $tag->tagName ?>
                                    </a>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-300">
                                    <span class="text-[13px] font-medium text-gray-800">2</span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-300">
                                    <div class="flex items-center gap-4">
                                        <form action="<?= APP_URL ?>categories/edit" method="post">
                                            <input type="hidden" name="editId" value="<?= $tag->tagId ?>">
                                            <button type="submit">
                                                <i class='bx bxs-edit' style='color:#0c72cf'></i>
                                            </button>
                                        </form>
                                        <form action="<?= APP_URL ?>categories/delete" method="post">
                                            <input type="hidden" name="deleteId" value="<?= $tag->tagId ?>">
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