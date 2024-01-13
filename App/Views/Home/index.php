<?php
extract($data, EXTR_SKIP);
component("head");
isLoggedIn() ? component("author-header") : component("visitor-header");
?>
    <main id="mainContainer" class="container md:mx-auto my-8">
        <section class="container md:mx-auto py-32">
            <div class="parent flex justify-between">
                <div class="left w-[40vw] flex flex-col gap-8">
                    <h1 class="text-6xl font-bold">g
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
            <div class="section-title flex justify-between items-center">
                <h2 class="recent-blogs text-4xl font-bold my-12">The Latest Wikis</h2>
                <a href="#allWikis">See All Wikis
                    <i class='bx bx-right-arrow-alt'></i>
                </a>
            </div>
            <div class="latest-section flex justify-center gap-8 flex-wrap">
                <?php foreach  ($latestWikis as $wiki) : ?>
                    <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                        <div class=" h-56 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-blue-gray-500 shadow-blue-gray-500/40">
                            <img src="<?= STORAGE_PATH . $wiki->__get('wikiImage')?>" alt="card-image" />
                        </div>
                        <div class="p-6">
                            <h5 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                               <?=$wiki->__get('wikiTitle')?>
                            </h5>
                            <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                                <?= mb_strimwidth($wiki->__get('wikiDescription'), 0, 100, "...")?>
                            </p>
                        <div class="p-6 pt-0">
                        </div>
                            <a href="<?= APP_URL ?>singleWiki/<?= $wiki->__get("wikiId") ?>" class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none" type="button">
                                Read Article
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="categories-section">
            <div class="section-title flex justify-between items-center">
                <h2 class="recent-blogs text-4xl font-bold my-12">The Popular Categories</h2>
                <a href="">See All Categories
                    <i class='bx bx-right-arrow-alt'></i>
                </a>
            </div>
            <div class="category-section flex justify-center gap-8 flex-wrap">
                <?php foreach ($randomCategories as $item) : ?>
                    <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                        <div class=" h-56 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-blue-gray-500 shadow-blue-gray-500/40">
                            <img src="<?= STORAGE_PATH . $item->__get('categoryImage')?>" alt="card-image" />
                        </div>
                        <div class="p-6">
                            <h5 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                <?=$item->__get('categoryName')?>
                            </h5>
                            <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                                <?= mb_strimwidth($item->__get('categoryDescription'), 0, 100, "...") ?>
                            </p>
                            <div class="p-6 pt-0">
                            </div>
                            <a href="<?= APP_URL ?>wikis/category/<?= $item->__get("categoryId") ?>" class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none" type="button">
                                Read Article
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div id="allWikis" class="wikis-parent flex flex-col gap-4">
            <h3 class="text-4xl font-bold my-4 mt-12 mx-auto">All Articles</h3>
            <?php foreach ($wikis as $wiki) : ?>
                <article
                        class="custom-card p-4 flex flex-col md:flex-row bg-white shadow-lg rounded-lg mx-4 max-w-md md:max-w-full overflow-hidden">
                    <div class="md:mr-6 h-fit">
                        <img class="w-16 h-16 md:w-24 md:h-24 rounded-full object-cover shadow"
                             src="<?= STORAGE_PATH . $wiki->author->userImage ?>" alt="avatar">
                    </div>
                    <div class="flex-1 flex flex-col justify-between py-6 px-4">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <h2 class="text-xl font-semibold text-gray-900"><?= $wiki->__get("author")->__get("username") ?></h2>
                                <p class="text-gray-700 bg-gray-200 px-4 py-[1.5px] rounded-2xl text-sm"><?= $wiki->__get("category")->__get("categoryName") ?></p>
                            </div>
                            <h2 class="font-bold text-2xl mb-2"><?= $wiki->__get("wikiTitle") ?></h2>
                            <p class="text-gray-700 text-sm mb-4"><?= mb_strimwidth($wiki->__get('wikiDescription'), 0, 350, "...")  ?></p>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="time font-medium text-gray-500">
                                <time datetime="<?= $wiki->__get("createdAt") ?>"><?= date('M j, Y', strtotime($wiki->__get("createdAt"))) ?></time>
                            </div>
                            <a href="<?= APP_URL ?>singleWiki/<?= $wiki->__get("wikiId") ?>"
                               class="w-fit px-8 text-white bg-gray-900 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-2xl text-sm px-5 py-2.5 me-2 mb-2">
                                <span>Read Article</span>
                            </a>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <img class="w-48 h-48 md:w-64 md:h-64 rounded-lg object-cover"
                             src="<?= STORAGE_PATH . $wiki->wikiImage ?>" alt="wiki-image">
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </main>


<?php require_once APP_ROOT . "/Views/Components/scripts.php" ?>