<?php
extract($data, EXTR_SKIP);
component("head");
isLoggedIn() ? component("author-header") : component("visitor-header");
?>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<main id="mainContainer" class="container mx-auto my-8">
    <section class="container mx-auto py-32">
        <div class="parent flex justify-between">
            <div class="left w-[40vw] flex flex-col gap-8">
                <h1 class="text-6xl font-bold">
                    Spark, Evolve,Conquer: Path to Personal Exellence
                </h1>
                <p class="text-gray-700 mt-4">
                    I’m actually starting a newsletter. In this newsletter, I’ll be focusing on web design and user
                    interface topics. You can expect to find tutorials, guides, best practices, design ideas
                </p>
                <a class="w-fit px-8 text-white bg-gray-900 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-2xl text-sm px-5 py-2.5 me-2 mb-2">Hello</a>
            </div>
            <div class="right w-[30vw] h-[80vh]">
                <img class="max-h-full" src="assets/img/hero.jpg" alt="">
            </div>
        </div>
    </section>

    <div class="categories-section">
        <div class="section-title">
            <h2 class="recent-blogs text-4xl font-bold text-center my-12">Categories</h2>
        </div>
        <div class="category-section flex justify-between gap-8 flex-wrap">
            <?php foreach ($randomCategories as $item) : ?>
                <div class="flex flex-col p-4 w-[380px] rounded-lg shadow-lg transition-transform hover:scale-105">
                    <div class="img w-[350px] h-[450px]">
                        <a href="<?= APP_URL ?>wikis/category/<?= $item->__get("categoryId") ?>">
                            <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($item->__get("categoryImage")) ?>" class="w-[100%] h-[100%] rounded-2xl shadow-lg">
                        </a>
                    </div>
                    <div class="category">
                        <p class="text-gray-700 bg-gray-200 py-[1px] px-4 rounded-md mt-4 w-fit"><?= $item->__get("categoryName") ?></p>
                    </div>
                    <div class="wikiTitle">
                        <h3 class="wikiTitle font-semibold text-2xl my-4">
                            <?= $item->__get("categoryName") ?>
                        </h3>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="wikis-parent flex flex-col gap-4">
        <h3 class="text-3xl font-bold my-4 mt-12 mx-auto">Most Popular Wikis</h3>
        <?php foreach ($wikis as $wiki) : ?>
            <article class="custom-card p-4 flex flex-col md:flex-row bg-white shadow-lg rounded-lg mx-4 max-w-md md:max-w-full overflow-hidden">
                <div class="md:mr-6 h-fit">
                    <img class="w-16 h-16 md:w-24 md:h-24 rounded-full object-cover shadow" src="data:image/jpg;charset=utf8;base64,<?= base64_encode($wiki->author->userImage) ?>" alt="avatar">
                </div>
                <div class="flex-1 flex flex-col justify-between py-6 px-4">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <h2 class="text-xl font-semibold text-gray-900"><?= $wiki->__get("author")->__get("username") ?></h2>
                            <p class="text-gray-700 bg-gray-200 px-4 py-[1.5px] rounded-2xl text-sm"><?= $wiki->__get("category")->__get("categoryName") ?></p>
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
</main>


<?php require_once APP_ROOT . "/Views/Components/scripts.php" ?>