<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

defineProps({
    sport: Object,
});

const form = useForm({
    sport: sport,
});

const submit = () => {};
</script>

<template>
    <form @submit.prevent="submit">
        <td
            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
        >
            {{ form.sport.id }}
        </td>
        <td
            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
        >
            <input class="border-none" type="text" :value="form.sport.sport" />
        </td>
        <td
            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
        >
            <button type="submit">Edit</button>
        </td>
        <td
            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
        >
            <Link
                :href="`/admin-panel/sport/${sport.id}`"
                method="delete"
                as="button"
            >
                Delete
            </Link>
            <!-- <button
                                                    @click="destroy(sport.id)"
                                                >
                                                    Delete
                                                </button> -->
        </td>
    </form>
</template>
