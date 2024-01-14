<?php
extract($data, EXTR_SKIP);
component('head');
component('admin-header');
component('admin-sidebar');
if (count($wikis)) {
    ?>

    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main"
          style="background-color: rgb(243 244 246);">
        <div class="p-6">
            <div class="gap-6 mb-6">
                <div class="border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md"
                     style="background-color: #fff;">
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
                                            <?= $wiki->__get("wikiId") ?>
                                        </span>
                                    </td>

                                    <td class="2/12 py-2 px-4 border-b border-b-gray-300">
                                        <img src="<?= STORAGE_PATH . $wiki->__get("wikiImage") ?>"
                                             alt="<?= $wiki->__get("wikiTitle") ?>"
                                             class="w-8 h-8 rounded object-cover block">
                                    </td>
                                    <td class="w-1/12 py-2 px-4 border-b border-b-gray-300">
                                        <p class="text-[13px] text-gray-900 text-sm hover:text-blue-500 ml-2 truncate">
                                            <?= $wiki->__get("wikiTitle") ?>
                                        </p>
                                    </td>
                                    <td class="w-3/12 py-2 px-4 border-b border-b-gray-300">
                                        <span class="text-[13px] font-medium text-gray-800">
                                            <?= mb_strimwidth($wiki->__get("wikiDescription"), 0, 70, "...") ?>
                                        </span>
                                    </td>
                                    <td class="1/12 py-2 px-4 border-b border-b-gray-300">
                                        <span class="text-[13px] font-medium text-gray-800">
                                            <?= $wiki->__get("author")->username ?>
                                        </span>
                                    </td>

                                    <td class="w-2/12 py-2 px-4 border-b border-b-gray-300">
                                        <div class="flex items-center gap-4">
                                            <a href="http://localhost/wiki/singleWiki/<?= $wiki->__get("wikiId") ?>"
                                               class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-xl shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">check </a>
                                            <form action="<?= APP_URL ?>wikis/archive" method="post">
                                                <input type="hidden" name="id" value="<?= $wiki->__get("wikiId") ?>">
                                                <?php
                                                $wiki->__set("isArchived", (int)$wiki->__get("isArchived"));
                                                if ($wiki->__get("isArchived") !== 1) {
                                                    ?>
                                                    <button name="archivedId"
                                                            class="py-2 px-4 bg-red-500 text-white font-semibold rounded-xl shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">
                                                        Archive
                                                    </button>
                                                <?php } else { ?>
                                                    <button name="desarchivedId"
                                                            class="py-2 px-4 bg-green-500 text-white font-semibold rounded-xl shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">
                                                        desArchive
                                                    </button>
                                                <?php } ?>
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
    <?php
} else {
    component("nodatafound");
}
component("scripts")

?>
