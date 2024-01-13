<?php
extract($data, EXTR_SKIP);
component("head");
component("author-header");

?>
<div class="flex flex-col">
    <div class=" py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold text-gray-800 mb-2"><?= $wiki->__get("wikiTitle") ?></h1>
            <p class="text-gray-600">Published on
                <time datetime="<?= $wiki->__get("createdAt") ?>"><?= date('M j, Y', strtotime($wiki->__get("createdAt"))) ?></time>
            </p>
        </div>
    </div>
    <div class="bg-white py-8">
        <div class="container mx-auto px-4 flex flex-col md:flex-row">
            <div class="w-full md:w-full px-4">
                <img src="<?= STORAGE_PATH . $wiki->__get("wikiImage") ?>"
                     alt="Blog Featured Image" class="mb-8">
                <div class="prose max-w-none">
                        <div class="tagsGroup flex my-8">
                            <?php foreach ($wikiTags as $tag): ?>
                                <span class="inline-block bg-gray-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                    <?= $tag->__get("tag")->__get("tagName") ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    <div class="info flex items-center justify-start gap-12 mb-8">
                        <img class="rounded-full w-20 h-20"
                             src="<?= STORAGE_PATH . $wiki->__get("author")->__get("userImage") ?>" alt="">
                        <strong class="text-lg"><?= $wiki->__get("author")->__get("username") ?></strong>

                    </div>

                    <strong class="text-3xl leading-10 my-12"><?= $wiki->__get("wikiDescription") ?></strong>
                    <p class="my-12"><?= $wiki->__get("wikiContent") ?></p>
                </div>
            </div>
        </div>

    </div>
</div>
