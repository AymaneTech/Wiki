<?php
extract_data();
component("head");
component("visitor-header");
?>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<section>
    <div class="bg-slate-900">
        <div class="bg-gradient-to-b from-violet-600/[.15] via-transparent">
            <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-24 space-y-8">
                <div class="max-w-3xl text-center mx-auto">
                    <h1 class="block font-medium text-gray-200 text-3xl sm:text-5xl md:text-6xl lg:text-5xl">
                        Embark on a Journey of Knowledge: Explore, Learn, Grow!
                    </h1>
                </div>
                <div class="max-w-3xl text-center mx-auto">
                    <p class="text-lg text-gray-400">Discover stories, thinking, and expertise from writers on any topic.</p>
                </div>
                <div class="text-center">
                    <a class="inline-flex justify-center items-center gap-x-3 text-center bg-gradient-to-tl from-blue-600 to-violet-600 shadow-lg shadow-transparent hover:shadow-blue-700/50 border border-transparent text-white text-sm font-medium rounded-full focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white py-3 px-6 dark:focus:ring-offset-gray-800" href="#">
                        Get started
                        <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once APP_ROOT . "/Views/Components/scripts.php" ?>

