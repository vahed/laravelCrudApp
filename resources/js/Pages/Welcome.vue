<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})
</script>

<template>

    <!--Head -->
    <div class="py-20" style="background: linear-gradient(90deg, #667eea 0%, #764ba2 100%)">
        <div class="container mx-auto px-6">

            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</Link>

            <h2 class="text-4xl font-bold mb-2 text-white">
                Smart Laravel Todo application powered by Inertia!
            </h2>
            <h3 class="text-2xl mb-8 text-gray-200">
                The application displays todo list, update the entries, delete the entire entry and add new entry.
            </h3>

            <template v-if="!$page.props.auth.user">
                <Link :href="route('login')" class="bg-white font-bold rounded-full py-4 px-8 shadow-lg uppercase tracking-wider">
                    Login
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="bg-white font-bold rounded-full ml-1.5 py-4 px-8 shadow-lg uppercase tracking-wider">Register</Link>
            </template>
        </div>
    </div>

    <!-- main -->
    <section class="container mx-auto px-6 p-10">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">
            Features
        </h2>

        <div class="flex items-center flex-wrap mb-20">
            <div class="w-full md:w-1/2">
                <h4 class="text-3xl text-gray-800 font-bold mb-3">Todo application</h4>
                <p class="text-gray-600 mb-8">Lorem ipsum dolor sit amet. Ex atque modi id dolor distinctio et veniam maxime At consectetur consequatur ut quasi et architecto libero. Et voluptas minima ut sunt excepturi ut dolores voluptatem in quia voluptatem et voluptatem nihil. Aut omnis distinctio ex recusandae optio et consequuntur velit et aspernatur ipsam sit recusandae officiis quo dolor voluptatem aut ratione voluptate.</p>
            </div>
        </div>
        <div class="flex items-center flex-wrap mb-20">
            <div class="w-full md:w-1/2">
                <h4 class="text-3xl text-gray-800 font-bold mb-3">Functionality</h4>
                <p class="text-gray-600 mb-8">Lorem ipsum dolor sit amet. Ex atque modi id dolor distinctio et veniam maxime At consectetur consequatur ut quasi et architecto libero. Et voluptas minima ut sunt excepturi ut dolores voluptatem in quia voluptatem et voluptatem nihil. Aut omnis distinctio ex recusandae optio et consequuntur velit et aspernatur ipsam sit recusandae officiis quo dolor voluptatem aut ratione voluptate.</p>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="bg-gray-100">
        <div class="container mx-auto px-6 pt-10 pb-6">
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/4 text-center md:text-left">
                    <h5 class="uppercase mb-6 font-bold">Links</h5>
                    <ul class="mb-4">
                        <li class="mt-2">
                            <a href="#" class="hover:underline text-gray-600 hover:text-orange-500">FAQ</a>
                        </li>
                        <li class="mt-2">
                            <a href="#" class="hover:underline text-gray-600 hover:text-orange-500">Help</a>
                        </li>
                        <li class="mt-2">
                            <a href="#" class="hover:underline text-gray-600 hover:text-orange-500">Support</a>
                        </li>
                    </ul>
                </div>
                <div class="w-full md:w-1/4 text-center md:text-left">
                    <h5 class="uppercase mb-6 font-bold">Legal</h5>
                    <ul class="mb-4">
                        <li class="mt-2">
                            <a href="#" class="hover:underline text-gray-600 hover:text-orange-500">Terms</a>
                        </li>
                        <li class="mt-2">
                            <a href="#" class="hover:underline text-gray-600 hover:text-orange-500">Privacy</a>
                        </li>
                    </ul>
                </div>
                <div class="w-full md:w-1/4 text-center md:text-left">
                    <h5 class="uppercase mb-6 font-bold">Social</h5>
                    <ul class="mb-4">
                        <li class="mt-2">
                            <a href="#" class="hover:underline text-gray-600 hover:text-orange-500">Facebook</a>
                        </li>
                        <li class="mt-2">
                            <a href="#" class="hover:underline text-gray-600 hover:text-orange-500">Linkedin</a>
                        </li>
                        <li class="mt-2">
                            <a href="#" class="hover:underline text-gray-600 hover:text-orange-500">Twitter</a>
                        </li>
                    </ul>
                </div>
                <div class="w-full md:w-1/4 text-center md:text-left">
                    <h5 class="uppercase mb-6 font-bold">Company</h5>
                    <ul class="mb-4">
                        <li class="mt-2">
                            <a href="#" class="hover:underline text-gray-600 hover:text-orange-500">Official Blog</a>
                        </li>
                        <li class="mt-2">
                            <a href="#" class="hover:underline text-gray-600 hover:text-orange-500">About Us</a>
                        </li>
                        <li class="mt-2">
                            <a href="#" class="hover:underline text-gray-600 hover:text-orange-500">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</template>
