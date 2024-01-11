<?php
extract($data, EXTR_SKIP);
component("head");
component("author-header");
?>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<section>
    <div class="bg-slate-900">
        <div class="bg-gradient-to-b from-violet-600/[.15] via-transparent">
            <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-24 space-y-8">
                <div class="max-w-3xl text-center mx-auto">
                    <h1 class="block font-medium text-gray-200 text-3xl sm:text-5xl md:text-6xl lg:text-5xl">
                        Embark on a Journey of Knowledge: Explore, Learn, Grow!
                    </h1>
                </div>
                <div class="max-w-3xl text-center mx-auto">
                    <p class="text-lg text-gray-400">Discover stories, thinking, and expertise from writers on any
                        topic.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<h2 class="block font-bold text-center my-16   text-3xl sm:text-5xl md:text-3xl lg:text-5xl">
    Stay Curious
</h2>
<?php component("filter") ?>
<main class="flex justify-between mx-16  my-4 items-start space-x-4w">
    <div class="wikis-parent flex flex-col md:w-2/3 gap-4">
        <h3 class="text-3xl font-bold my-4 mx-auto">Most Popular Wikis</h3>
        <?php foreach ($wikis as $wiki) : ?>
            <article class="custom-card p-4 flex flex-col md:flex-row bg-white shadow-lg rounded-lg mx-4 max-w-md md:max-w-4xl overflow-hidden">
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
                        <a href="<?= APP_URL ?>singleWiki/<?= $wiki->__get("wikiId") ?>" class="cool-btn inline-flex items-center text-center bg-gradient-to-tl from-blue-600 to-violet-600 hover:from-blue-700 hover:to-violet-700 text-white text-sm font-medium rounded-full px-6 py-3">
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

    <div class="categories-parent w-[400px] h-[300px] flex flex-col gap-4">
        <h3 class="text-3xl font-bold my-4 mx-auto">Best Categories </h3>
        <?php foreach ($randomCategories as $item) : ?>
            <article class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
                <a href="#!">
                    <img class="rounded-t-lg" src="data:image/jpg;charset=utf8;base64,<?= base64_encode($item->__get("categoryImage")) ?>" alt="" />
                </a>
                <div class="p-6">
                    <div class="flex gap-16">
                        <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800">
                            <?= $item->__get("categoryName") ?>
                        </h5>
                    </div>
                    <p class="mb-4 text-base text-neutral-600">
                        <?= $item->__get("categoryDescription") ?>
                    </p>
                    <a href="<?= APP_URL ?>wikis/singleWiki" class="cool-btn inline-flex items-center text-center bg-gradient-to-tl from-blue-600 to-violet-600 hover:from-blue-700 hover:to-violet-700 text-white text-sm font-medium rounded-full px-6 py-3">
                        <span>Read Wiki</span>
                    </a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>

</main>
<div class="flex justify-center items-center gap-8 text-xl mb-32">
    <a class="border-xl rounded-full bg-gray-300 p-4" href="http://localhost/wiki/workspace/1">1</a>
    <a class="border-xl rounded-full bg-gray-300 p-4" href="http://localhost/wiki/workspace/2">2</a>
    <a class="border-xl rounded-full bg-gray-300 p-4" href="http://localhost/wiki/workspace/3">3</a>
</div>
<?php //require_once APP_ROOT . "/Views/Components/footer.php"
?>