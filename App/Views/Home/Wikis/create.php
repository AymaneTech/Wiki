<?php
extract($data, EXTR_SKIP);
checkAuthorPermission();
component("head");
component("admin-header");
component("author-sidebar");
?>
<main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
    <form id="loginForm" method="post" action="<?= APP_URL ?>home/save" enctype="multipart/form-data">
        <div class="bg-indigo-50 min-h-screen md:px-20 pt-6">
            <div class=" bg-white rounded-xl px-6 py-10 mx-auto">
                <h1 class="text-center text-4xl font-bold text-slate-900 mb-10">Add A Wiki</h1>
                <div class="space-y-4">
                    <div class="flex flex-col ml-2 gap-4">
                        <label for="title" class="text-lx">Title:</label>
                        <div class="input-group relative">
                            <input required minlength="20" type="text" placeholder="Title" id="title" name="wikiTitle"
                                   class="outline-none py-1 px-2 text-md border-2 rounded-md box-border"/>
                            <span class="success-icon hidden text-green-700">
            <i class='bx bx-check'></i>
        </span>
                            <span class="error-icon hidden text-red-700">
            <i class='bx bx-error-circle'></i>
                      </span>
                            <p class="error text-red-700 text-sm py-2"></p>
                        </div>
                    </div>
                    <div class="flex flex-col ml-2 gap-4">
                        <label for="Description" class="text-lx ">Description:</label>
                        <div class="input-group relative ">
                        <input required minLength="50" type="text" placeholder="Description" id="title" name="wikiDescription"
                               class="outline-none py-4 px-2 text-md border-2 rounded-md"/>
                        <span class="success-icon hidden text-green-700">
                                <i class='bx bx-check'></i>
                            </span>
                        <span class="error-icon hidden text-red-700">
                                <i class='bx bx-error-circle'></i>
                            </span>
                        <p class="error text-red-700 text-sm py-2"></p>
                    </div>
                    </div>
                    <div>
                        <label for="Content" class="block mb-2 text-lg ">Content:</label>
                        <div class="input-group relative ">
                        <textarea required minlength="50" id="Content" cols="30" rows="10" placeholder="whrite here.." name="wikiContent"
                                  class="w-full   p-4 text-gray-600 bg-indigo-50 outline-none rounded-md"></textarea>
                            <span class="success-icon hidden text-green-700">
                                <i class='bx bx-check'></i>
                            </span>
                            <span class="error-icon hidden text-red-700">
                                <i class='bx bx-error-circle'></i>
                            </span>
                            <p class="error text-red-700 text-sm py-2"></p>
                        </div>
                    </div>
                    <div  class="flex gap-4 justify-between">
                        <div class="w-[40%] flex flex-col items-start ml-2 gap-4">
                            <label for="image" class="text-lx ">Add Cover Image:</label>
                            <div class="input-group relative ">
                            <input required type="file" placeholder="image" id="image" name="image"
                                   class="outline-none py-1 px-2 text-md border-2 rounded-md"/>
                                <span class="success-icon hidden text-green-700">
                                <i class='bx bx-check'></i>
                            </span>
                                <span class="error-icon hidden text-red-700">
                                <i class='bx bx-error-circle'></i>
                            </span>
                                <p class="error text-red-700 text-sm py-2"></p>
                            </div>
                        </div>
                        <div class="w-[40%] flex flex-col items-start ml-2 gap-4">
                            <label for="image" class="text-lx ">Category:</label>
                            <select name="category" id="category">
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category->__get("categoryId") ?>"><?= $category->__get("categoryName") ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="">
                        <label for="image" class="text-xl font-bold">Tags:</label>
                        <div class="flex flex-wrap items-start ml-2 gap-4">
                            <?php foreach ($tags as $tag): ?>
                                <div class="flex items-center justify-center gap-4">
                                    <input type="checkbox" value="<?= $tag->__get("tagId") ?>" name="tags[]" id="">
                                    <label for="checkbox"><?= $tag->__get("tagName") ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="flex justify-end items-center">
                        <button type="submit" id="submit" name="postRequest"
                                class=" inline-flex justify-center items-center gap-x-8 text-center bg-gradient-to-tl from-blue-600 to-violet-600 shadow-lg shadow-transparent hover:shadow-blue-700/50 border border-transparent text-white text-xl font-medium rounded-full focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white py-4 px-12 dark:focus:ring-offset-gray-800">
                            Create
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
<?php require_once APP_ROOT . "/Views/Components/scripts.php" ?>

