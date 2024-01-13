<div class="fixed left-0 top-0 w-64 h-full bg-gray-900 p-4 z-50 sidebar-menu transition-transform">
    <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
        <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover">
        <span class="text-lg font-bold text-white ml-3">Wiki</span>
    </a>
    <ul class="mt-4">
        <li class="mb-1 group active">
            <a href="<?=APP_URL?>dashboard" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-home-2-line mr-3 text-lg"></i>
                <span class="text-sm">Dashboard</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="<?=APP_URL?>wikis/manageWiki" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='mr-3 text-lg bx bxl-wikipedia'></i>
                <span class="text-sm">Manage Wikis</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="<?=APP_URL?>categories" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='mr-3 text-lg bx bx-category' ></i>
                <span class="text-sm">Manage Categories</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="<?=APP_URL?>tags" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='mr-3 text-lg bx bx-purchase-tag-alt' ></i>
                <span class="text-sm">Manage Tags</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="<?=APP_URL?>users/logout" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='mr-3 text-lg bx bx-log-out'></i>
                <span class="text-sm">Log out</span>
            </a>
        </li>
    </ul>
</div>