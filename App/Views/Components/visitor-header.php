<nav class="bg-gray-900 shadow-md shadow-black/5 sticky top-0 left-0 z-30">
    <div class="py-2.5 container mx-auto flex justify-between items-center dropdown-toggle">
        <a class="text-xl text-white font-bold" href="<?= APP_URL ?>">Wiki</a>
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