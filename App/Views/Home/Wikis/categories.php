<?php
extract($data, EXTR_SKIP);
component("head");
isLoggedIn() ? component("author-header") : component("visitor-header");
?>
    <main>
        <div class="title">
            <h1 class="text-4xl text-center m-12 font-bold">All categories</h1>
        </div>
        <div class="category-section flex justify-center gap-8 flex-wrap">
            <?php foreach ($categories as $item) : ?>
                <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                    <div class=" h-56 mx-4 -mt-6 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-blue-gray-500 shadow-blue-gray-500/40">
                        <img src="<?= STORAGE_PATH . $item->__get('categoryImage') ?>" alt="card-image"/>
                    </div>
                    <div class="p-6">
                        <h5 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            <?= $item->__get('categoryName') ?>
                        </h5>
                        <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                            <?= mb_strimwidth($item->__get('categoryDescription'), 0, 100, "...") ?>
                        </p>
                        <div class="p-6 pt-0">
                        </div>
                        <a href="<?= APP_URL ?>wikis/category/<?= $item->__get("categoryId") ?>"
                           class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
                           type="button">
                            Read Article
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
<?php component("footer") ?>