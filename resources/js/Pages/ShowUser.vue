<script setup>
defineProps({
    users: Object,
});
</script>

<template>
    <div class="flex flex-col pt-20">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <tbody>
                            <tr
                                v-for="user in users"
                                :key="user.id"
                                class="bg-white border-b"
                            >
                                <td
                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                >
                                    {{ user.name }}
                                </td>
                                <td
                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                >
                                    {{ user.email }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
