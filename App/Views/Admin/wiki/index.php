<?php
component("head");
component("admin-sidebar");
component("admin-header");
?>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<!-- end: Sidebar -->

<!-- start: Main -->
<main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main" style="background-color: rgb(243 244 246);">
    <div class="p-6">
        <div class="gap-6 mb-6">
            <div class="border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md" style="background-color: #fff;">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">Wikis</div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[540px]" data-tab-for="order" data-page="active">
                        <thead>
                        <tr>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                                username
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left"></th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                email
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">
                                wikis n°
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                         class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                       class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">3 days</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">$56</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">In progress</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="w-full min-w-[540px] hidden" data-tab-for="order" data-page="completed">
                        <thead>
                        <tr>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                                Service
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                Estimate
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                Budget
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">
                                Status
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                         class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                       class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">3 days</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">$56</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Completed</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                         class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                       class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">3 days</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">$56</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Completed</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                         class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                       class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">3 days</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">$56</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Completed</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                         class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                       class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">3 days</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">$56</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Completed</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                         class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                       class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">3 days</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">$56</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Completed</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="w-full min-w-[540px] hidden" data-tab-for="order" data-page="canceled">
                        <thead>
                        <tr>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                                Service
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                Estimate
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                Budget
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">
                                Status
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                         class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                       class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">3 days</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">$56</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Canceled</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                         class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                       class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">3 days</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">$56</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Canceled</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                         class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                       class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">3 days</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">$56</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Canceled</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                         class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                       class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">3 days</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">$56</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Canceled</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt=""
                                         class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                       class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                        landing page</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">3 days</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">$56</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Canceled</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- end: Main -->

<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?= APP_URL ?>/public/assets/js/dashboard.js"></script>
</body>
</html>