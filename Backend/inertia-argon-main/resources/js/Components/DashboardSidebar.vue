<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import NavLink from './NavLink.vue';

const url = usePage().props.url;

const isMobileSidebar = defineModel('isMobileSidebar', {
    type: Boolean,
    default: false,
});

const handleSidebarClose = () => {
    isMobileSidebar.value = !isMobileSidebar.value;
};

const classes = computed(() =>
    isMobileSidebar.value
        ? 'xl:ml-6 ps translate-x-0 ml-6'
        : 'shadow-xl xl:ml-6'
);
</script>

<template>
    <!-- sidenav  -->
    <aside
        class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 rounded-2xl xl:left-0 xl:translate-x-0"
        :class="classes"
        aria-expanded="false"
    >
        <div class="h-19">
            <i
                class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
                @click="handleSidebarClose"
            ></i>
            <NavLink :href="route('dashboard')" target="_blank">
                <img
                    src="assets/img/logo-ct-dark.png"
                    class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8"
                    alt="main_logo"
                />
                <img
                    src="assets/img/logo-ct.png"
                    class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8"
                    alt="main_logo"
                />
                <span
                    class="ml-1 font-semibold transition-all duration-200 ease-nav-brand"
                    >Argon Dashboard 2</span
                >
            </NavLink>
        </div>

        <hr
            class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent"
        />

        <div
            class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full"
        >
            <ul class="flex flex-col pl-0 mb-0">
                <li class="mt-0.5 w-full">
                    <NavLink
                        :active="$page.url.startsWith('/dashboard')"
                        :href="route('dashboard')"
                    >
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                        >
                            <i
                                class="relative top-0 text-sm leading-normal text-blue-500 fa fa-dashboard"
                            ></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                            >Dashboard</span
                        >
                    </NavLink>
                </li>

                <li class="mt-0.5 w-full">
                    <NavLink
                        :active="$page.url.startsWith('/user')"
                        :href="route('user.index')"
                        v-show="can(['delete user'])"
                    >
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                        >
                            <i
                                class="relative top-0 text-sm leading-normal text-gray-500 fa fa-users"
                            ></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                            >Users</span
                        >
                    </NavLink>
                </li>

                <li class="w-full mt-4">
                    <h6
                        class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60"
                    >
                        Account pages
                    </h6>
                </li>

                <li class="mt-0.5 w-full">
                    <NavLink
                        :active="$page.url.startsWith('/profile')"
                        :href="route('profile.edit')"
                    >
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                        >
                            <i
                                class="relative top-0 text-sm leading-normal text-slate-700 fa fa-user"
                            ></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                            >Profile</span
                        >
                    </NavLink>
                </li>

                <li class="mt-0.5 w-full">
                    <Link
                        method="POST"
                        as="button"
                        class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        :href="route('logout')"
                    >
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                        >
                            <i
                                class="relative top-0 text-sm leading-normal text-red-500 fa fa-power-off"
                            ></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                            >Sign Out</span
                        >
                    </Link>
                </li>
            </ul>
        </div>

        <div class="mx-4">
            <!-- load phantom colors for card after: -->
            <p
                class="invisible hidden text-gray-800 text-red-500 text-red-600 text-blue-500 dark:bg-white bg-slate-500 bg-gray-500/30 bg-cyan-500/30 bg-emerald-500/30 bg-orange-500/30 bg-red-500/30 after:bg-gradient-to-tl after:from-zinc-800 after:to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 after:from-blue-700 after:to-cyan-500 after:from-orange-500 after:to-yellow-500 after:from-green-600 after:to-lime-400 after:from-red-600 after:to-orange-600 after:from-slate-600 after:to-slate-300 text-emerald-500 text-cyan-500 text-slate-400"
            ></p>
            <div
                class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border"
                sidenav-card
            >
                <img
                    class="w-1/2 mx-auto"
                    src="assets/img/illustrations/icon-documentation.svg"
                    alt="sidebar illustrations"
                />
                <div class="flex-auto w-full p-4 pt-0 text-center">
                    <div class="transition-all duration-200 ease-nav-brand">
                        <h6 class="mb-0 dark:text-white text-slate-700">
                            Need help?
                        </h6>
                        <p
                            class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                        >
                            Please check our docs
                        </p>
                    </div>
                </div>
            </div>
            <a
                href="https://www.creative-tim.com/learning-lab/tailwind/html/quick-start/argon-dashboard/"
                target="_blank"
                class="inline-block w-full px-8 py-2 mb-4 text-xs font-bold leading-normal text-center text-white capitalize transition-all ease-in rounded-lg shadow-md bg-slate-700 bg-150 hover:shadow-xs hover:-translate-y-px"
                >Documentation</a
            >
            <!-- pro btn  -->
            <a
                class="inline-block w-full px-8 py-2 text-xs font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md select-none bg-150 bg-x-25 hover:shadow-xs hover:-translate-y-px"
                href="https://www.creative-tim.com/product/argon-dashboard-pro-tailwind?ref=sidebarfree"
                target="_blank"
                >Upgrade to pro</a
            >
        </div>
    </aside>

    <!-- end sidenav -->
</template>
