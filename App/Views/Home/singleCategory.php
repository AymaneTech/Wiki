<?php
extract($data, EXTR_SKIP);
component("head");
isLoggedIn() ? component("author-header") : component("visitor-header");
?>

<div class="wikis-parent flex flex-col mx-auto md:w-2/3 gap-4">
    <h3 class="text-3xl font-bold my-4 mt-12 mx-auto">Most Popular Wikis</h3>
    <?php foreach ($wikis as $wiki) : ?>
        <article class="custom-card p-4 flex flex-col md:flex-row bg-white shadow-lg rounded-lg w-full md:max-w-full overflow-hidden transition-transform hover:scale-105">
            <div class="md:mr-6 h-fit">
                <img class="w-16 h-16 md:w-24 md:h-24 rounded-full object-cover shadow" src="data:image/jpg;charset=utf8;base64,<?= base64_encode($wiki->author->userImage) ?>" alt="avatar">
            </div>
            <div class="flex-1 flex flex-col justify-between py-6 px-4">
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <h2 class="text-xl font-semibold text-gray-900"><?= $wiki->__get("author")->__get("username") ?></h2>
                        <p class="text-gray-700 text-sm"><?= $wiki->__get("category")->__get("categoryName") ?></p>
                    </div>
                    <h2 class="font-bold text-2xl mb-2"><?= $wiki->__get("wikiTitle") ?></h2>
                    <p class="text-gray-700 text-sm mb-4"><?= $wiki->__get("wikiDescription") ?></p>
                </div>
                <div class="flex items-center justify-between">
                    <div class="time font-medium text-gray-500">
                        <time datetime="<?= $wiki->__get("createdAt") ?>"><?= date('M j, Y', strtotime($wiki->__get("createdAt"))) ?></time>
                    </div>
                    <a href="<?= APP_URL ?>singleWiki/<?= $wiki->__get("wikiId") ?>" class="w-fit px-8 text-white bg-gray-900 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-2xl text-sm px-5 py-2.5 me-2 mb-2">
                        <span>Read Wiki</span>
                    </a>
                </div>
            </div>
            <div class="flex-shrink-0">
                <img class="w-48 h-48 md:w-64 md:h-64 rounded-lg object-cover" src="data:image/jpg;charset=utf8;base64,<?= base64_encode($wiki->wikiImage) ?>" alt="wiki-image">
            </div>
        </article>
    <?php endforeach; ?>
</div>