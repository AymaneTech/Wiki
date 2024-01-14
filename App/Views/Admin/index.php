<?php
extract($data, EXTR_SKIP);
component("head");
component("admin-sidebar");
component("admin-header");
?>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>

<main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-4">
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="text-2xl font-semibold"><?=$userCount?></div>
                        </div>
                        <div class="text-sm font-medium text-gray-400">Total of Users</div>
                    </div>

                </div>
                <div class="flex items-center">
                    <?php for ($i = 0; $i < min(10, count($users)); $i++){ ?>
                        <img src="<?= STORAGE_PATH . $users[$i]->__get("userImage")?>" alt="" class="w-8 h-8 rounded-full object-cover block">
                    <?php }?>
                </div>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-6">
                    <div>
                        <div class="text-2xl font-semibold mb-1"><?=$categoryCount?></div>
                        <div class="text-sm font-medium text-gray-400">Total of Categories</div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-6">
                    <div>
                        <div class="text-2xl font-semibold mb-1"><?=$wikiCount?></div>
                        <div class="text-sm font-medium text-gray-400">Total wikis</div>
                    </div>

                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">New users</div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[540px]" data-tab-for="order" data-page="active">
                        <thead>
                        <tr>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                                username
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left"></th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                email
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user): ?>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="<?=STORAGE_PATH . $user->__get("userImage")?>" alt=""
                                         class="w-8 h-8 rounded object-cover block">
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400"><?=$user->__get("username")?></span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400"><?=$user->__get("email")?></span>
                            </td>
                        </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">Recent Wikis</div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[540px]">
                        <thead>
                        <tr>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                                Wiki Title
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                Created By
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                Category
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($wikis as $wiki): ?>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="<?= STORAGE_PATH. $wiki->__get("wikiImage") ?>" alt=""
                                         class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                       class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate"><?= mb_strimwidth($wiki->__get("wikiTitle"), 0, 20, "...")?></a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400"><?= mb_strimwidth($wiki->__get("category")->__get("categoryName"), 0, 40, "...")  ?></span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="time font-medium text-gray-500">
                                    <time datetime="<?= $wiki->__get("createdAt") ?>"><?= date('M j, Y', strtotime($wiki->__get("createdAt"))) ?></time>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- end: Main -->

<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?= APP_URL ?>/public/assets/js/dashboard.js"></script>
</body>
</html>