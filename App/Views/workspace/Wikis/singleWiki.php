<?php
extract($data, EXTR_SKIP);
require_once APP_ROOT . "/views/components/head.php";
require_once APP_ROOT . "/views/components/author-header.php";
?>

<main class="container mx-auto">
  <div class="title">
    <h1 class="text-6xl text-center font-bold mt-12"><?= $wiki->__get("wikiTitle") ?></h1>
  </div>
  <div class="cover w-[60vw] mt-12 mx-auto">
    <img class="max-w-full" src="data:image/jpeg;charset=utf8;base64, <?= base64_encode($wiki->__get("wikiImage")) ?>" alt="">
  </div>
  <div class="sub-details container mx-auto flex justify-between">
    <strong><?= $wiki->__get("author")->__get("username") ?></strong>
    <div class="time font-medium text-gray-500">
      <time datetime="<?= $wiki->__get("createdAt") ?>"><?= date('M j, Y', strtotime($wiki->__get("createdAt"))) ?></time>
    </div>
  </div>
  <div class="description">
    <article class="font-bold text-2xl">
      <p>
        <?= $wiki->__get("wikiDescription") ?>
      </p>
    </article>
  </div>
  <article class="font-bold text-2xl">
    <p>
      <?= $wiki->__get("wikiContent") ?>
    </p>
  </article>

</main>




<!-- <div class="category">
      <p><?php // $wiki->__get("category")->__get("categoryName")
          ?></p>
    </div> -->