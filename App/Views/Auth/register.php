<?php component("head") ?>
<div class="h-screen md:flex">
    <div class="relative overflow-hidden md:flex w-1/2 bg-gradient-to-tr from-slate-400 to-slate-900 i justify-around items-center hidden">
        <div>
            <h1 class="text-white font-bold text-4xl font-sans">WIKI</h1>
            <p class="text-white mt-1">The most popular peer to peer lending at SEA</p>
            <a href="login"
               class="text-center block w-28 bg-white text-slate-800 mt-4 py-2 rounded-2xl font-bold mb-2">
                Login
            </a>
        </div>
        <div class="absolute -bottom-32 -left-40 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
        <div class="absolute -bottom-40 -left-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
        <div class="absolute -top-40 -right-0 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
        <div class="absolute -top-20 -right-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
    </div>
    <div class="flex md:w-1/2 justify-center py-10 items-center bg-white">
        <form id="loginForm" method="post" enctype="multipart/form-data">
            <div id="loginInput"
                 class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                <div id="formGroup" class="input-group relative">
                    <div class="flex items-center">
                        <input required
                               id="username" name="username" type="text"
                               class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                               placeholder="Email address" minlength="10"/>
                        <label for="username"
                               class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Username
                        </label>
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
                        <input required
                               pattern="^(.+)@(.+)$"
                               id="email" name="email" type="email"
                               class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                               placeholder="Email address" minlength="10"/>
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
                               placeholder="Password"/>
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
                <div id="formGroup" class="input-group relative">
                    <div class="flex items-center">
                        <input required id="passwordConfirm" name="passwordConfirm" type="password"
                               class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                               placeholder="Confirm Password"/>
                        <label for="Confirmpassword"
                               class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Confirm
                            Password</label>
                        <span class="success-icon hidden text-green-700 ">
                                        <i class='bx bx-error-circle'></i>
                                        </span>
                        <span class="error-icon hidden text-red-700 ">
                                        <i class='bx bx-error-circle'></i>
                                        </span>
                    </div>
                    <div class="error text-red-700 text-sm py-2"></div>
                </div>
                <div id="formGroup" class="input-group relative">
                        <label for="image">Image</label>
                    <div class="flex items-center">
                        <input required id="image" name="image" type="file"
                               class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"/>
                        <span class="success-icon hidden text-green-700">
            <i class='bx bx-check'></i>
        </span>
                        <span class="error-icon hidden text-red-700">
            <i class='bx bx-error-circle'></i>
        </span>
                    </div>
                    <div class="error text-red-700 text-sm py-2"></div>
                </div>


                <div class="relative">
                    <button type="submit" id="submit" name="postRequest"
                            class="bg-slate-900 text-white rounded-md px-2 py-1">
                        Log in
                    </button>
                </div>
            </div>
        </form>


    </div>
</div>
<?php require_once APP_ROOT . "/Views/Components/scripts.php" ?>
