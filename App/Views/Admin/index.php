<?php
component("head");
component("admin-sidebar");
component("admin-header");
?>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>

<main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-4">
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="text-2xl font-semibold">324</div>
                        </div>
                        <div class="text-sm font-medium text-gray-400">Total of Users</div>
                    </div>

                </div>
                <div class="flex items-center">
                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded-full object-cover block">
                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded-full object-cover block -ml-3">
                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded-full object-cover block -ml-3">
                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded-full object-cover block -ml-3">
                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded-full object-cover block -ml-3">
                </div>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-6">
                    <div>
                        <div class="text-2xl font-semibold mb-1">10</div>
                        <div class="text-sm font-medium text-gray-400">Total of Categories</div>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-full bg-gray-100 rounded-full h-4">
                        <div class="h-full bg-blue-500 rounded-full p-1" style="width: 60%;">
                            <div class="w-2 h-2 rounded-full bg-white ml-auto"></div>
                        </div>
                    </div>
                    <span class="text-sm font-medium text-gray-600 ml-4">60%</span>
                </div>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-6">
                    <div>
                        <div class="text-2xl font-semibold mb-1"><span
                                    class="text-base font-normal text-gray-400 align-top">&dollar;</span>2,345
                        </div>
                        <div class="text-sm font-medium text-gray-400">Total wikis</div>
                    </div>

                </div>
                <a href="#" class="text-blue-500 font-medium text-sm hover:text-blue-600">View details</a>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">New users</div>
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
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">Recent Wikis</div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[540px]">
                        <thead>
                        <tr>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                                Wiki Title
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                Created By
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                Category
                            </th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md"></th>
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
                                <span class="text-[13px] font-medium text-gray-400">$235</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">1K</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="dropdown">
                                    <button type="button"
                                            class="dropdown-toggle text-gray-400 hover:text-gray-600 text-sm w-6 h-6 rounded flex items-center justify-center bg-gray-50">
                                        <i class="ri-more-2-fill"></i></button>
                                    <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                        <li>
                                            <a href="#"
                                               class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                               class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                               class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                        </li>
                                    </ul>
                                </div>
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