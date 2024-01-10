<nav class="bg-[#1F1C44] shadow-md shadow-black/5 sticky top-0 left-0 z-30">
    <div class="py-2.5 container mx-auto flex justify-between items-center dropdown-toggle">
        <div class="flex">
            <a class="text-xl text-white font-bold" href="<?= APP_URL ?>">Wiki</a>
        </div>
        <div class="search">
            <form>
                <div class="relative z-10 flex space-x-2 bg-white border rounded-lg shadow-sm shadow-gray-100">
                    <div class="flex-[1_0_0%]">
                        <label for="hs-search-article-1" class="block text-sm text-gray-700 font-medium"><span
                       z             class="sr-only">Search article</span></label>
                        <input type="email" name="hs-search-article-1" id="hs-search-article-1"
                               class="py-2.5 px-4 block w-full border-transparent rounded-lg focus:border-blue-500 focus:ring-blue-500"
                               placeholder="Search article">
                    </div>
                    <div class="flex-[0_0_auto]">
                        <a class="w-[46px] h-[46px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                           href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <div class="dropdown relative group">
            <a href="<?=APP_URL?>workspace/create"
               class="write inline-flex justify-center items-center gap-x-3 text-center bg-gradient-to-tl from-blue-600 to-violet-600 shadow-lg shadow-transparent hover:shadow-blue-700/50 border border-transparent text-white text-sm font-medium rounded-full focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white py-3 px-6 dark:focus:ring-offset-gray-800">
                <i class='bx bx-edit'></i>
                <span>Workspace</span>
            </a>
        </div>
    </div>
</nav>
