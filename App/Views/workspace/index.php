<?php extract($data, EXTR_SKIP) ?>
<?php require_once APP_ROOT . "/Views/Components/head.php" ?>
<?php require_once APP_ROOT . "/Views/Components/author-header.php" ?>
<?php require_once APP_ROOT . "/Views/Components/filter.php" ?>

<div class="wikis-parent">
    <?php foreach ($wikis as $wiki): ?>
        <div class="flex justify-between bg-white shadow-lg rounded-lg mx-4 py-6 px-4 my-4 max-w-md md:max-w-2xl ">
            <div class="flex  items-start px-4 py-6">
                <img class="w-12 h-12 rounded-full object-cover mr-4 shadow"
                     src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                     alt="avatar">
                <div class="">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900 -mt-1">Brad Adams </h2>
                    </div>
                    <p class="text-gray-700">Joined 12 SEP 2012. </p>
                    <p class="mt-3 text-gray-700 text-sm">
                        <?= $wiki->wikiDescription ?>
                    </p>
                    <div class="time mt-2 font-medium ">
                        <p><?= $wiki->createdAt ?></p>
                    </div>
                </div>
            </div>
            <div>
                <img class="w-[150px] h-[150px] rounded-lg"
                     src="data:image/jpg;charset=utf8;base64,<?= base64_encode($wiki->wikiImage) ?>">
            </div>
        </div>
    <?php endforeach; ?>
</div>
