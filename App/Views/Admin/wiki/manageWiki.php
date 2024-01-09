<?php require_once APP_ROOT . "/Views/Components/head.php" ;
extract($data, EXTR_SKIP);
?>

<?php require_once APP_ROOT . "/Views/Components/admin-sidebar.php" ?>

<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>

<main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main" style="background-color: rgb(243 244 246);">
    <?php require_once APP_ROOT . "/Views/Components/admin-header.php" ?>

    <div class="p-6">
        <div class="gap-6 mb-6">
            <div class="border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md" style="background-color: #fff;">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">Wikis</div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[540px]" data-tab-for="order" data-page="active">
                        <thead>
                        <tr>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-100 text-left rounded-tl-md rounded-bl-md w-1/12">
                                #
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-100 text-left rounded-tl-md rounded-bl-md w-2/12">
                                Wiki Cover
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-100 text-left w-3/12">
                                Wiki Title
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-100 text-left rounded-tr-md rounded-br-md w-3/12">
                                Wiki Description
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-100 text-left rounded-tr-md rounded-br-md w-2/12">
                                Actions
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-100 text-left rounded-tr-md rounded-br-md w-1/12">
                                Author
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($wikis as $wiki): ?>
                            <tr>
                                <td class="1/12 py-2 px-4 border-b border-b-gray-300">
                                        <span class="text-[13px] font-medium text-gray-800">
                                            <?= $wiki->wikiId ?>
                                        </span>
                                </td>

                                <td class="2/12 py-2 px-4 border-b border-b-gray-300">
                                    <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($wiki->wikiImage) ?>"
                                         alt="<?= $wiki->wikiTitle?>"
                                         class="w-8 h-8 rounded object-cover block">
                                </td>
                                <td class="w-1/12 py-2 px-4 border-b border-b-gray-300">
                                    <p class="text-[13px] text-gray-900 text-sm hover:text-blue-500 ml-2 truncate">
                                        <?= $wiki->wikiTitle ?>
                                    </p>
                                </td>

                                <td class="w-3/12 py-2 px-4 border-b border-b-gray-300">
                                        <span class="text-[13px] font-medium text-gray-800">
                                            <?= $wiki->wikiDescription ?>
                                        </span>
                                </td>
                                <td class="1/12 py-2 px-4 border-b border-b-gray-300">
                                        <span class="text-[13px] font-medium text-gray-800">
                                            <?= $wiki->author->username ?>
                                        </span>
                                </td>

                                <td class="w-2/12 py-2 px-4 border-b border-b-gray-300">
                                    <div class="flex items-center gap-4">
                                        <form action="<?= APP_URL ?>categories/edit" method="post">
                                            <input type="hidden" name="editId" value="<?= $wiki->wikiId ?>">
                                            <button class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-xl shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                                                Check
                                            </button>
                                        </form>

                                        <form action="<?= APP_URL ?>wikis/archive" method="post">
                                            <input type="hidden" name="archivedId" value="<?= $wiki->wikiId ?>">
                                            <?php
                                            $wiki->isArchived = (int)$wiki->isArchived;
                                            if($wiki->isArchived !== 1):?>
                                            <button class="py-2 px-4 bg-red-500 text-white font-semibold rounded-xl shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">
                                                Archive
                                            </button>
                                            <?php endif;?>
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

<?php require_once APP_ROOT . "/Views/Components/scripts.php" ; ?>
