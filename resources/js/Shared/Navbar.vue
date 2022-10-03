<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    auth: Object,
});
</script>

<template>
    <nav
        class="fixed top-0 left-0 w-full flex flex-wrap items-center justify-between py-4 bg-white text-gray-500 hover:text-gray-700 focus:text-gray-700 shadow-lg navbar navbar-expand-lg navbar-light"
    >
        <div
            class="container-fluid w-full flex flex-wrap items-center justify-between px-6"
        >
            <a class="text-xl text-black" href="#">Sports MVP</a>

            <div class="dropdown relative">
                <a
                    class="dropdown-toggle px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg active:text-white transition duration-150 ease-in-out flex items-center whitespace-nowrap"
                    href="#"
                    type="button"
                    id="dropdownMenuButton2"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                    {{ auth.user.name }}
                    <svg
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fas"
                        data-icon="caret-down"
                        class="w-2 ml-2"
                        role="img"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 320 512"
                    >
                        <path
                            fill="currentColor"
                            d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"
                        ></path>
                    </svg>
                </a>
                <ul
                    class="dropdown-menu min-w-max absolute bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none"
                    aria-labelledby="dropdownMenuButton2"
                >
                    <li>
                        <a
                            class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100"
                            href="#"
                            >Admin Panel</a
                        >
                    </li>
                    <li>
                        <Link
                            class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100"
                            :href="route('logout')"
                            method="post"
                            as="button"
                            >Logout</Link
                        >
                    </li>
                </ul>
            </div>

            <button
                v-if="!auth"
                class="navbar-toggler text-gray-500 border-0 hover:shadow-none hover:no-underline py-2 px-2.5 bg-transparent focus:outline-none focus:ring-0 focus:shadow-none focus:no-underline"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <svg
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fas"
                    data-icon="bars"
                    class="w-6"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"
                >
                    <path
                        fill="currentColor"
                        d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"
                    ></path>
                </svg>
            </button>
            <div
                v-if="!auth"
                class="collapse navbar-collapse items-center"
                id="navbarSupportedContent"
            >
                <!-- Right links -->
                <ul
                    class="navbar-nav flex flex-col pl-0 list-style-none mr-auto"
                >
                    <li class="nav-item px-2">
                        <Link
                            class="nav-link active"
                            aria-current="page"
                            href="/login"
                            >Login</Link
                        >
                    </li>
                    <li class="nav-item px-2">
                        <Link
                            class="nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 p-0"
                            href="/register"
                            >Register</Link
                        >
                    </li>
                </ul>
                <!-- Right links -->
            </div>

            <!-- Collapsible wrapper -->
        </div>
    </nav>
</template>
