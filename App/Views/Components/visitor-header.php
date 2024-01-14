<nav class="bg-gray-900 shadow-md shadow-black/5 sticky top-0 left-0 z-30">
    <div class="py-2.5 container mx-auto flex justify-between items-center dropdown-toggle">
        <a class="text-xl text-white font-bold" href="<?= APP_URL ?>">Wiki</a>
        <div class="search">
            <form>
                <div class="relative z-10 flex space-x-2 bg-white border rounded-lg shadow-sm shadow-gray-100">
                    <div class="flex-[1_0_0%]">
                        <label for="hs-search-article-1" class="block text-sm text-gray-700 font-medium"><span
                                    class="sr-only">Search article</span></label>
                        <input id="searchBox"  type="text" name="hs-search-article-1"
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
            <button id="dropdownButton" class="inline-flex justify-center items-center gap-x-3 text-center bg-white shadow-lg shadow-transparent hover:shadow-gray-700/50 border border-transparent text-black text-sm font-medium rounded-xl focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2 focus:ring-offset-white py-3 px-6 dark:focus:ring-offset-gray-800">Get Started</button>
            <ul id="dropdownMenu" class="dropdown-menu hidden absolute right-0 mt-2 bg-white border border-gray-100 w-full max-w-[140px]">
                <li>
                    <a href="Users/login" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-gray-500 hover:bg-gray-50">Sign in</a>
                </li>
                <li>
                    <a href="Users/register" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-gray-500 hover:bg-gray-50">Sign Up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>