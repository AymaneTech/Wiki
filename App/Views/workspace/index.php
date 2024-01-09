<?php extract($data, EXTR_SKIP) ?>
<?php require_once APP_ROOT . "/Views/Components/head.php" ?>
<?php require_once APP_ROOT . "/Views/Components/author-header.php" ?>
<?php require_once APP_ROOT . "/Views/Components/filter.php" ?>
<main class="flex justify-between mx-12 items-start space-x-4">
    <div class="wikis-parent ">
        <?php foreach ($wikis as $wiki): ?>
            <article
                    class="cool-card p-4 flex flex-col md:flex-row bg-white shadow-lg rounded-lg mx-4 my-4 max-w-md md:max-w-2xl overflow-hidden">
                <div class="flex-shrink-0 md:mr-6">
                    <img class="w-20 h-20 md:w-32 md:h-32 rounded-full object-cover shadow"
                         src="data:image/jpg;charset=utf8;base64,<?= base64_encode($wiki->author->userImage) ?>"
                         alt="avatar">
                </div>
                <div class="flex-1 flex flex-col justify-between py-6 px-4">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <h2 class="text-xl font-semibold text-gray-900"><?= $wiki->author->username ?></h2>
                            <p class="text-gray-700 text-sm"><?= $wiki->category->categoryName ?></p>
                        </div>
                        <h2 class="font-bold text-2xl mb-2"><?= $wiki->wikiTitle ?></h2>
                        <p class="text-gray-700 text-sm mb-4"><?= $wiki->wikiDescription ?></p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="time font-medium text-gray-500">
                            <time datetime="<?= $wiki->createdAt ?>"><?= date('M j, Y', strtotime($wiki->createdAt)) ?></time>
                        </div>
                        <a href="<?= APP_URL ?>wikis/singleWiki"
                           class="cool-btn inline-flex items-center text-center bg-gradient-to-tl from-blue-600 to-violet-600 hover:from-blue-700 hover:to-violet-700 text-white text-sm font-medium rounded-full px-6 py-3">
                            <span>Read Wiki</span>
                        </a>
                    </div>
                </div>
                <div class="flex-shrink-0">
                    <img class="w-32 h-32 md:w-48 md:h-48 rounded-lg object-cover"
                         src="data:image/jpg;charset=utf8;base64,<?= base64_encode($wiki->wikiImage) ?>"
                         alt="wiki-image">
                </div>
            </article>
        <?php endforeach; ?>
    </div>
    <div class="categories-parent w-[400px] flex flex-col gap-4">
        <?php foreach ($randomCategories as $item): ?>
            <article
                    class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
                <a href="#!">
                    <img class="rounded-t-lg" src="data:image/jpg;charset=utf8;base64,<?= base64_encode($item->categoryImage) ?>" alt=""/>
                </a>
                <div class="p-6">
                    <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800">
                        <?= $item->categoryName ?>
                    </h5>
                    <p class="mb-4 text-base text-neutral-600">
                        <?= $item->categoryName ?>
                    </p>
                    <a href="<?= APP_URL ?>wikis/singleWiki"
                       class="cool-btn inline-flex items-center text-center bg-gradient-to-tl from-blue-600 to-violet-600 hover:from-blue-700 hover:to-violet-700 text-white text-sm font-medium rounded-full px-6 py-3">
                        <span>Read Wiki</span>
                    </a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
    </div>

</main>
<div class="flex justify-center mt-6 mb-16">
    <nav class="flex items-center">
        <a href="./1" class="px-3 py-2 bg-gray-300 rounded-md mx-1 hover:bg-gray-300">1</a>
        <a href="./2" class="px-3 py-2 bg-gray-300 rounded-md mx-1 hover:bg-gray-300">2</a>
        <a href="./3" class="px-3 py-2 bg-gray-300 rounded-md mx-1 hover:bg-gray-300">3</a>
    </nav>
</div>

