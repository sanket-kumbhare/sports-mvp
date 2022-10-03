<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    sport: Object,
});
</script>

<template>
    <div class="flex justify-center">
        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
            <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">
                {{ sport.sport }}
            </h5>
            <p class="text-gray-700 text-base mb-4">
                Get latest update on {{ sport.sport }} for only Rs. 39/- per
                month.
            </p>
            <Link
                :data="{ sport_id: sport.id }"
                method="post"
                href="/subscribe"
                as="button"
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
            >
                Subscribe
            </Link>
            <Link
                :data="{ sport_id: sport.id }"
                method="post"
                href="/unsubscribe"
                as="button"
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
            >
                UnSubscribe
            </Link>
        </div>
    </div>
</template>
