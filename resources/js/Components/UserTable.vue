<script setup>
defineProps({
    selectedSport: Object,
});
</script>

<template>
    <table class="min-w-full">
        <tbody>
            <tr class="border-b" v-for="user in selectedSport.users" :key="user.id">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ user.name }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ user.email }}
                </td>
            </tr>
        </tbody>
    </table>
</template>
