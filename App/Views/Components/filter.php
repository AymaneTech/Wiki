<div class="flex items-center justify-center mt-5 sm:mt-4 flex-wrap">
<?php foreach ($tags as $tag):?>
    <a class="m-1 py-3 px-4 inline-flex items-center gap-x-2 text-sm rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none hover:bg-gradient-to-tl hover:from-blue-600 hover:to-violet-600 hover:text-white"
       href="./<?=$tag->tagId?>">
        <?=$tag->tagName?>
    </a>
<?php endforeach; ?>
</div>
<style>
    body{
        background-color: rgb(229 231 235);
    }
</style>