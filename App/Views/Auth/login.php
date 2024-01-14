<?php component("head") ?>
    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900 to-slate-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="max-w-md mx-auto">
                    <div>
                        <h1 class="text-2xl font-semibold">Welcome Back !!</h1>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <form id="loginForm" method="post" action="">
                            <div id="loginInput"
                                 class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                <div id="formGroup" class="input-group relative">
                                    <div class="flex items-center">
                                        <input required
                                               pattern="^(.+)@(.+)$"
                                               id="email" name="email" type="email"
                                               class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                                               placeholder="Email address"  minlength="10"/>
                                        <label for="email"
                                               class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email
                                            Address</label>
                                        <span class="success-icon hidden text-green-700">
                                        <i class='bx bx-error-circle'></i>
                                        </span>
                                        <span class="error-icon hidden text-red-700">
                                        <i class='bx bx-error-circle'></i>
                                        </span>
                                    </div>
                                    <div class="error text-red-700 text-sm py-2"></div>
                                </div>
                                <div id="formGroup" class="input-group relative">
                                    <div class="flex items-center">
                                        <input required id="password" name="password" type="password"
                                               class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                                               placeholder="Password" />
                                        <label for="password"
                                               class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
                                        <span class="success-icon hidden text-green-700 ">
                                        <i class='bx bx-error-circle'></i>
                                        </span>
                                        <span class="error-icon hidden text-red-700 ">
                                        <i class='bx bx-error-circle'></i>
                                        </span>
                                    </div>
                                    <div class="error text-red-700 text-sm py-2"></div>
                                </div>
                                <div class="relative">
                                    <button type="submit" id="submit" name="postRequest" class="bg-slate-900 text-white rounded-md px-2 py-1">
                                        Log in
                                    </button>
                                </div>
                                <div class="text-sm inline-block my-64">
                                    don't have an account <a class="text-blue-500 font-bold" href="<?=APP_URL?>users/register">create one</a>
                                </div>
                            </div>
                        </form>

                        <?= (isset($_SESSION["error"])) ? "<p class='text-red-500 font-bold flex justify-center transition-opacity duration-500 ease-in-out opacity-100'>" . $_SESSION["error"] . "</p>" : ""; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once APP_ROOT . "/Views/Components/scripts.php" ?>